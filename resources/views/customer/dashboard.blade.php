@extends('layouts.customer')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10 space-y-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-semibold">Selamat Datang 👋</h1>
            <p class="text-gray-600 text-sm">
                Ambil nomor antrian untuk servis kendaraan Anda
            </p>
        </div>

        <label for="modal-antrian"
            class="cursor-pointer rounded-lg bg-blue-600 text-white px-5 py-2.5
                   text-sm font-semibold shadow hover:bg-blue-700 transition">
            Ambil Antrian
        </label>
    </div>

    {{-- LIST ANTRIAN --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="font-semibold mb-4">Antrian Hari Ini</h2>

        @forelse ($antrian as $item)
            <div class="flex justify-between items-center border-b py-3 text-sm">
                <div>
                    <p class="font-medium">
                        Nomor Antrian: {{ $item->nomor_antrian }}
                    </p>
                    <p class="text-gray-500">
                        Status: {{ ucfirst($item->status) }}
                    </p>
                    <p class="text-gray-600 text-xs">
                        Cabang: {{ $item->cabang->nama }}
                    </p>
                </div>

                @if ($item->is_mine)
                    <span class="text-green-600 font-bold">ANTRIAN SAYA</span>
                @endif

                @if ($item->waktu_masuk)
                    {{ $item->waktu_masuk->format('d M Y H:i') }}
                @else
                    -
                @endif

            </div>
        @empty
            <p class="text-gray-500 text-sm text-center py-6">
                Belum ada antrian hari ini
            </p>
        @endforelse
    </div>
</div>

{{-- MODAL --}}
<input type="checkbox" id="modal-antrian" class="peer hidden">

<div class="fixed inset-0 z-50 hidden peer-checked:flex
            items-center justify-center bg-black/50 p-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl">

        {{-- HEADER --}}
        <div class="px-6 py-4 border-b flex justify-between items-center">
            <h3 class="font-semibold text-lg">Ambil Antrian Servis</h3>
            <label for="modal-antrian" class="cursor-pointer">✕</label>
        </div>

        {{-- BODY --}}
        <div class="px-6 py-5 space-y-4 text-sm">

            {{-- CABANG --}}
            <div>
                <label class="block font-medium mb-1">Pilih Cabang</label>
                <select id="cabang_id" class="w-full rounded-lg border-gray-300">
                    <option value="">-- Pilih Cabang --</option>
                    @foreach ($cabang as $c)
                        <option value="{{ $c->id }}">
                            {{ $c->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- KENDARAAN --}}
            <div>
                <label class="block font-medium mb-1">Pilih Kendaraan</label>
                <select id="kendaraan_id" class="w-full rounded-lg border-gray-300">
                    <option value="">-- Pilih Kendaraan --</option>
                    @foreach ($kendaraan as $k)
                        <option value="{{ $k->id }}">
                            {{ $k->brand }} {{ $k->model }} ({{ $k->plat_nomor }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- DATANG NANTI --}}
            <div class="flex items-center gap-2">
                <input type="checkbox" id="datang_nanti">
                <label for="datang_nanti">Servis di hari lain</label>
            </div>

            {{-- WAKTU MASUK --}}
            <div id="waktu-wrapper" class="hidden">
                <label class="block font-medium mb-1">Waktu Kedatangan</label>
                <input type="datetime-local" id="waktu_masuk"
                    class="w-full rounded-lg border-gray-300">
            </div>

        </div>

        {{-- FOOTER --}}
        <div class="px-6 py-4 border-t flex justify-end gap-3">
            <label for="modal-antrian" class="cursor-pointer px-4 py-2 border rounded">
                Batal
            </label>

            <button id="btn-submit-antrian"
                class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Konfirmasi
            </button>
        </div>
    </div>
</div>

{{-- SCRIPT --}}
<script>
const datangNanti = document.getElementById('datang_nanti');
const waktuWrapper = document.getElementById('waktu-wrapper');
const waktuInput = document.getElementById('waktu_masuk');

datangNanti.addEventListener('change', () => {
    waktuWrapper.classList.toggle('hidden', !datangNanti.checked);

    if (datangNanti.checked) {
        waktuInput.value = new Date().toISOString().slice(0,16);
    }
});

document.getElementById('btn-submit-antrian').addEventListener('click', async () => {
    const res = await fetch(`{{ route('customer.antrian.store') }}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            cabang_id: document.getElementById('cabang_id').value,
            kendaraan_id: document.getElementById('kendaraan_id').value,
            datang_nanti: datangNanti.checked ? 1 : 0,
            waktu_masuk: waktuInput.value
        })
    });

    const data = await res.json();

    if (!res.ok) {
        alert(data.message);
        return;
    }

    alert(`Antrian berhasil!\nNomor: ${data.data.nomor_antrian}`);
    location.reload();
});
</script>
@endsection
