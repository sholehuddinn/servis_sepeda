<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Cabang;
use App\Models\Customer;
use App\Models\Kendaraan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $userId = $user->id;

        if (!$user->customer) {
            abort(403, 'Akun ini belum terdaftar sebagai customer');
        }

        $customerId = $user->customer->id;

        $kendaraan = Kendaraan::where('customer_id', $customerId)->get();

        // 🔴 ambil antrian HARI INI saja (semua cabang, untuk display)
        $antrian = Antrian::whereDate('created_at', today())
            ->orderBy('nomor_antrian')
            ->get()
            ->map(function ($item) use ($userId) {
                $item->is_mine = $item->user_id === $userId;
                return $item;
            });

        $cabang = Cabang::all();

        return view('customer.dashboard', [
            'kendaraan' => $kendaraan,
            'antrian'   => $antrian,
            'cabang'    => $cabang,
        ]);
    }

    public function storeAntrian(Request $request)
    {
        $request->validate([
            'cabang_id'    => 'required|exists:cabangs,id',
            'kendaraan_id' => 'required|exists:kendaraan,id',
            'datang_nanti' => 'nullable|boolean',
            'waktu_masuk'  => 'nullable|date'
        ]);

        try {
            $user = Auth::user();

            if (!$user->customer) {
                return response()->json([
                    'message' => 'User bukan customer'
                ], 403);
            }

            // pastikan kendaraan milik customer
            $kendaraan = Kendaraan::where('id', $request->kendaraan_id)
                ->where('customer_id', $user->customer->id)
                ->firstOrFail();

            DB::beginTransaction();

            $datangNanti = (int) ($request->datang_nanti ?? 0);

            // tentukan tanggal antrian (hari ini / hari datang)
            $tanggalAntrian = $datangNanti === 1
                ? Carbon::parse($request->waktu_masuk)->toDateString()
                : now()->toDateString();

            // lock antrian per cabang + tanggal
            $lastAntrian = Antrian::where('cabang_id', $request->cabang_id)
                ->whereDate('waktu_masuk', $tanggalAntrian)
                ->lockForUpdate()
                ->orderByDesc('nomor_antrian')
                ->first();

            $nomorAntrian = $lastAntrian
                ? $lastAntrian->nomor_antrian + 1
                : 1;

            // normalisasi datetime
            $waktuMasuk = $datangNanti === 1
                ? Carbon::parse($request->waktu_masuk)->format('Y-m-d H:i:s')
                : now();

            $antrian = Antrian::create([
                'cabang_id'     => $request->cabang_id,
                'user_id'       => $user->id,
                'nomor_antrian' => $nomorAntrian,
                'status'        => 'menunggu',
                'datang_nanti'  => $datangNanti,
                'waktu_masuk'   => $waktuMasuk,
            ]);

            // relasi kendaraan
            DB::table('antrian_kendaraan')->insert([
                'antrian_id'   => $antrian->id,
                'kendaraan_id' => $kendaraan->id,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Antrian berhasil dibuat',
                'data' => [
                    'nomor_antrian' => $antrian->nomor_antrian,
                    'waktu_masuk'   => $antrian->waktu_masuk,
                    'datang_nanti'  => $antrian->datang_nanti,
                ]
            ], 201);

        } catch (\Throwable $th) {
            DB::rollBack();

            Log::error('STORE ANTRIAN ERROR', [
                'error' => $th->getMessage(),
            ]);

            return response()->json([
                'message' => 'Gagal membuat antrian'
            ], 500);
        }
    }

    public function getKendaraan(): View
    {
        $user = Auth::user();
        $customer = $user->customer->id;
        return view('customer.kendaraan', [
            'kendaraan' => Kendaraan::where('customer_id', $customer)->get()
        ]);
    }

    public function createKendaraan(Request $request)
    {
        $user = Auth::user();
        $customer = $user->customer->id;

        $request->validate([
            'tipe'       => 'required|string|max:100',
            'brand'      => 'required|string|max:100',
            'model'      => 'required|string|max:100',
            'plat_nomor' => 'required|string|max:20',
        ]);

        Kendaraan::create([
            'customer_id' => $customer,
            'tipe'        => $request->tipe,
            'brand'       => $request->brand,
            'model'       => $request->model,
            'plat_nomor'  => $request->plat_nomor,
        ]);

        return back()->with('success', 'Kendaraan berhasil ditambahkan');
    }

    public function editKendaraan(Request $request, $id)
    {
        $user = Auth::user();

        // pastikan user punya customer
        if (!$user->customer) {
            return back()->with('error', 'Customer tidak ditemukan');
        }

        Log::info('id kendaraaan - ' . $id);

        // ambil kendaraan MILIK customer ini
        $kendaraan = Kendaraan::where('id', $id)
            ->where('customer_id', $user->customer->id)
            ->firstOrFail();

        // validasi input
        $request->validate([
            'tipe'       => 'required|string|max:100',
            'brand'      => 'required|string|max:100',
            'model'      => 'required|string|max:100',
            'plat_nomor' => 'required|string|max:20',
        ]);

        // update data
        $kendaraan->update([
            'tipe'       => $request->tipe,
            'brand'      => $request->brand,
            'model'      => $request->model,
            'plat_nomor' => $request->plat_nomor,
        ]);

        return back()->with('success', 'Kendaraan berhasil diperbarui');
    }

    public function deleteKendaraan($id)
    {
        $user = Auth::user();
        $customer = $user->customer->id;

        $kendaraan = Kendaraan::where('id', $id)
            ->where('customer_id', $customer)
            ->firstOrFail();

        $kendaraan->delete();

        return back()->with('success', 'Kendaraan berhasil dihapus');
    }

    public function getProfile(): View
    {
        $user = User::with('customer')->find(Auth::id());

        return view('customer.profile', compact('user'));
    }

    public function editProfile(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255|unique:users,email,' . $user->id,
            'telepon' => 'nullable|string|max:20',
            'alamat'  => 'nullable|string|max:255',
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        $user->customer()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'telepon' => $request->telepon,
                'alamat'  => $request->alamat,
            ]
        );

        return back()->with('success', 'Profil berhasil diperbarui');
    }

}
