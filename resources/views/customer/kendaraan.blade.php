@extends('layouts.customer')

@section('title', 'Kendaraan Saya')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10 space-y-8">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-cyan-600 bg-clip-text text-transparent">
                🚲 Kendaraan Saya
            </h1>
            <p class="text-muted-foreground mt-1">Kelola data sepeda Anda untuk layanan servis</p>
        </div>

        {{-- Button Open Modal Create --}}
        <label for="modal-create"
            class="cursor-pointer inline-flex items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Sepeda
        </label>
    </div>

    {{-- Alert --}}
    @if (session('success'))
        <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3.5 text-emerald-700 flex items-center gap-3 animate-fade-in">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- LIST KENDARAAN --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($kendaraan as $item)
            <div class="group rounded-xl border bg-white shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden">
                {{-- Card Header with Icon --}}
                <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-6 border-b">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-600 to-cyan-600 flex items-center justify-center text-white text-xl shadow-md">
                                🚲
                            </div>
                            <div>
                                <h3 class="font-bold text-lg text-gray-900">{{ $item->brand }}</h3>
                                <p class="text-sm text-gray-600">{{ $item->model }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card Body --}}
                <div class="p-6 space-y-3">
                    <div class="flex items-center gap-2 text-sm">
                        <span class="font-medium text-gray-500 w-20">Tipe:</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                            {{ $item->tipe }}
                        </span>
                    </div>
                    
                    <div class="flex items-center gap-2 text-sm">
                        <span class="font-medium text-gray-500 w-20">Plat:</span>
                        <span class="font-mono font-semibold text-gray-900 bg-gray-100 px-3 py-1 rounded border-2 border-gray-300">
                            {{ $item->plat_nomor }}
                        </span>
                    </div>
                </div>

                {{-- Card Footer --}}
                <div class="border-t bg-gray-50 px-6 py-4 flex justify-between items-center">
                    {{-- Edit --}}
                    <label for="modal-edit-{{ $item->id }}"
                        class="cursor-pointer inline-flex items-center gap-1.5 text-sm font-medium text-blue-600 hover:text-blue-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit
                    </label>

                    {{-- Delete --}}
                    <form method="POST" action="{{ route('customer.kendaraan.delete', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="inline-flex items-center gap-1.5 text-sm font-medium text-red-600 hover:text-red-700 transition-colors"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus kendaraan ini?')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>

            {{-- MODAL EDIT --}}
            <input type="checkbox" id="modal-edit-{{ $item->id }}" class="peer hidden">
            <div class="fixed inset-0 z-50 hidden peer-checked:flex items-center justify-center bg-black/50 backdrop-blur-sm p-4 animate-fade-in">
                <div class="w-full max-w-lg rounded-2xl bg-white shadow-2xl animate-scale-in">
                    {{-- Modal Header --}}
                    <div class="bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-5 rounded-t-2xl flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white">
                                ✏️
                            </div>
                            <h2 class="font-bold text-lg text-white">Edit Sepeda</h2>
                        </div>
                        <label for="modal-edit-{{ $item->id }}" class="cursor-pointer text-white hover:bg-white/20 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </label>
                    </div>

                    {{-- Modal Body --}}
                    <form method="POST" action="{{ route('customer.kendaraan.update', $item->id) }}"
                        class="p-6 space-y-5">
                        @csrf
                        @method('PUT')

                        <x-input label="Tipe Sepeda" name="tipe" :value="$item->tipe" />
                        <x-input label="Brand" name="brand" :value="$item->brand" />
                        <x-input label="Model" name="model" :value="$item->model" />
                        <x-input label="Plat Nomor" name="plat_nomor" :value="$item->plat_nomor" />

                        {{-- Modal Footer --}}
                        <div class="flex justify-end gap-3 pt-4 border-t">
                            <label for="modal-edit-{{ $item->id }}"
                                class="cursor-pointer rounded-lg border-2 border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                                Batal
                            </label>
                            <button
                                class="rounded-lg bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="text-center py-16 px-4">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gradient-to-br from-blue-100 to-cyan-100 flex items-center justify-center text-5xl">
                        🚲
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Sepeda</h3>
                    <p class="text-gray-500 mb-6 max-w-md mx-auto">
                        Tambahkan sepeda pertama Anda untuk mulai menggunakan layanan servis kami
                    </p>
                    <label for="modal-create"
                        class="cursor-pointer inline-flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Tambah Sepeda Pertama
                    </label>
                </div>
            </div>
        @endforelse
    </div>
</div>

{{-- MODAL CREATE --}}
<input type="checkbox" id="modal-create" class="peer hidden">
<div class="fixed inset-0 z-50 hidden peer-checked:flex items-center justify-center bg-black/50 backdrop-blur-sm p-4 animate-fade-in">
    <div class="w-full max-w-lg rounded-2xl bg-white shadow-2xl animate-scale-in">
        {{-- Modal Header --}}
        <div class="bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-5 rounded-t-2xl flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white">
                    ➕
                </div>
                <h2 class="font-bold text-lg text-white">Tambah Sepeda Baru</h2>
            </div>
            <label for="modal-create" class="cursor-pointer text-white hover:bg-white/20 w-8 h-8 rounded-full flex items-center justify-center transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </label>
        </div>

        {{-- Modal Body --}}
        <form method="POST" action="{{ route('customer.kendaraan.store') }}" class="p-6 space-y-5">
            @csrf

            <x-input label="Tipe Sepeda" name="tipe" placeholder="Contoh: Mountain Bike, Road Bike" />
            <x-input label="Brand" name="brand" placeholder="Contoh: Polygon, United" />
            <x-input label="Model" name="model" placeholder="Contoh: Xtrada 7, Clovis 3" />
            <x-input label="Plat Nomor" name="plat_nomor" placeholder="Contoh: AB 1234 CD" />

            {{-- Modal Footer --}}
            <div class="flex justify-end gap-3 pt-4 border-t">
                <label for="modal-create"
                    class="cursor-pointer rounded-lg border-2 border-gray-300 px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                    Batal
                </label>
                <button
                    class="rounded-lg bg-gradient-to-r from-blue-600 to-cyan-600 px-6 py-2.5 text-sm font-semibold text-white shadow-md hover:shadow-lg hover:scale-105 transition-all duration-200">
                    Simpan Sepeda
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Custom Animations --}}
<style>
    @keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    @keyframes scale-in {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    .animate-fade-in {
        animation: fade-in 0.2s ease-out;
    }
    
    .animate-scale-in {
        animation: scale-in 0.2s ease-out;
    }
</style>
@endsection