<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Layanan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        try {
            $user = Auth::user();

            // pastikan user punya cabang
            if (!$user->cabang_id) {
                abort(403, 'User tidak memiliki cabang');
            }

            $cabangId = $user->cabang_id;

            // RANGE HARI INI (AMAN JAM)
            $startToday = Carbon::today()->startOfDay(); // 00:00:00
            $endToday   = Carbon::today()->endOfDay();   // 23:59:59

            return view('admin.dashboard', [
                'user_count' => User::where('role', 'user')->count(),

                // ================= HARI INI (AKTIF) =================
                'antrian_hari_ini' => Antrian::with(['cabang', 'user'])
                    ->where('cabang_id', $cabangId)
                    ->whereBetween('waktu_masuk', [$startToday, $endToday])
                    ->whereIn('status', ['menunggu', 'diproses'])
                    ->orderBy('waktu_masuk')
                    ->get(),

                // ================= HARI INI (SELESAI) =================
                'antrian_selesai_hari_ini' => Antrian::with(['cabang', 'user'])
                    ->where('cabang_id', $cabangId)
                    ->whereBetween('waktu_masuk', [$startToday, $endToday])
                    ->where('status', 'selesai')
                    ->orderByDesc('waktu_keluar')
                    ->get(),

                // ================= HARI DEPAN =================
                'antrian_hari_depan' => Antrian::with(['cabang', 'user'])
                    ->where('cabang_id', $cabangId)
                    ->where('waktu_masuk', '>', $endToday)
                    ->where('status', '!=', 'batal')
                    ->orderBy('waktu_masuk')
                    ->get(),
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai,batal'
        ]);

        $user = Auth::user();

        $antrian = Antrian::where('id', $id)
            ->where('cabang_id', $user->cabang_id) // 🔒 hanya cabangnya sendiri
            ->firstOrFail();

        // kalau selesai → isi waktu_keluar
        if ($request->status === 'selesai') {
            $antrian->update([
                'status' => 'selesai',
                'waktu_keluar' => now(),
            ]);
        } else {
            $antrian->update([
                'status' => $request->status,
            ]);
        }

        return redirect()->back()->with('success', 'Status antrian berhasil diperbarui');
    }

    public function pelanggan() 
    {
        try {
            $pelanggan = User::where('role', 'user')
                ->with('customer')
                ->with('customer.kendaraan')
                ->get();

            return view('admin.pelanggan', [
                'pelanggan' => $pelanggan,
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function getLayanan()
    {
        try {
            $layanan = Layanan::all();
            return view('admin.layanan', compact('layanan'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function editLayanan(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);

        $layanan->update([
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'durasi_menit' => $request->durasi_menit,
        ]);

        return redirect()
            ->route('admin.layanan')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function deleteLayanan($id)
    {
        try {
            $layanan = Layanan::findOrFail($id);
            $layanan->delete();
            return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil dihapus.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function createLayanan(Request $request)
    {
        try {
            Layanan::create([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'durasi_menit' => $request->durasi_menit,
            ]);

            return redirect()->route('admin.layanan')->with('success', 'Layanan berhasil ditambahkan.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
