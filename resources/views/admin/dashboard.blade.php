@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="space-y-8">

    {{-- SUMMARY --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-sm text-gray-500">Total User</p>
            <p class="text-3xl font-bold">{{ $user_count }}</p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-sm text-gray-500">Antrian Aktif Hari Ini</p>
            <p class="text-3xl font-bold">{{ $antrian_hari_ini->count() }}</p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <p class="text-sm text-gray-500">Antrian Mendatang</p>
            <p class="text-3xl font-bold">{{ $antrian_hari_depan->count() }}</p>
        </div>
    </div>

    {{-- ================= ANTRIAN HARI INI ================= --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">📅 Antrian Hari Ini</h2>

        @forelse ($antrian_hari_ini as $item)
            <div class="flex justify-between items-start border-b py-4 text-sm">

                <div>
                    <p class="font-semibold">
                        #{{ $item->nomor_antrian }}
                        <span class="text-gray-500">
                            ({{ $item->cabang->nama }})
                        </span>
                    </p>

                    <p class="text-xs text-gray-600">
                        {{ $item->user->name ?? '-' }}
                    </p>

                    <p class="text-xs text-gray-700 mt-1">
                        <b>Layanan:</b>
                        {{ $item->layanan->pluck('nama')->join(', ') }}
                    </p>

                    <p class="text-xs text-blue-600 mt-1">
                        <b>Estimasi:</b>
                        {{ $item->estimasi_mulai->format('H:i') }}
                        –
                        {{ $item->estimasi_selesai->format('H:i') }}
                        ({{ $item->durasi_total }} menit)
                    </p>
                </div>

                <div class="text-right space-y-2">
                    <p class="text-xs text-gray-500">
                        Masuk:
                        {{ optional($item->waktu_masuk)->format('H:i') }}
                    </p>

                    {{-- STATUS --}}
                    <form action="{{ route('admin.antrian.update-status', $item->id) }}" method="POST">
                        @csrf
                        <select name="status"
                                onchange="this.form.submit()"
                                class="text-xs rounded border-gray-300 px-2 py-1
                                @if($item->status === 'menunggu') bg-yellow-100
                                @elseif($item->status === 'diproses') bg-blue-100
                                @endif">
                            <option value="menunggu" @selected($item->status === 'menunggu')>Menunggu</option>
                            <option value="diproses" @selected($item->status === 'diproses')>Diproses</option>
                            <option value="selesai">Selesai</option>
                            <option value="batal">Batal</option>
                        </select>
                    </form>
                </div>

            </div>
        @empty
            <p class="text-gray-500 text-sm text-center py-6">
                Tidak ada antrian aktif hari ini
            </p>
        @endforelse
    </div>

    {{-- ================= SELESAI ================= --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4 text-green-600">
            ✅ Antrian Selesai Hari Ini
        </h2>

        @forelse ($antrian_selesai_hari_ini as $item)
            <div class="flex justify-between items-center border-b py-3 text-sm opacity-80">
                <div>
                    <p class="font-semibold">
                        #{{ $item->nomor_antrian }}
                        ({{ $item->user->name ?? '-' }})
                    </p>
                </div>

                <div class="text-right">
                    <p class="font-medium text-green-600">
                        {{ optional($item->waktu_keluar)->format('H:i') }}
                    </p>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-sm text-center py-6">
                Belum ada antrian selesai hari ini
            </p>
        @endforelse
    </div>

    {{-- ================= HARI DEPAN ================= --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-lg font-semibold mb-4">⏭️ Antrian Hari Ke Depan</h2>

        @forelse ($antrian_hari_depan as $item)
            <div class="flex justify-between items-center border-b py-3 text-sm">
                <div>
                    <p class="font-semibold">
                        #{{ $item->nomor_antrian }}
                        ({{ $item->user->name ?? '-' }})
                    </p>
                    <p class="text-xs text-gray-600">
                        {{ $item->layanan->pluck('nama')->join(', ') }}
                    </p>
                </div>

                <div class="text-right">
                    <p class="font-medium">
                        {{ optional($item->waktu_masuk)->format('d M Y H:i') }}
                    </p>
                    <p class="text-xs text-gray-500">
                        {{ ucfirst($item->status) }}
                    </p>
                </div>
            </div>
        @empty
            <p class="text-gray-500 text-sm text-center py-6">
                Tidak ada antrian mendatang
            </p>
        @endforelse
    </div>

</div>
@endsection
