@extends('layouts.customer')

@section('title', 'Profil Saya')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8">

    <h1 class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-100">
        Profil Saya
    </h1>

    {{-- Alert sukses --}}
    @if (session('success'))
        <div class="mb-6 rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3 flex items-center">
            <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- Error validation --}}
    @if ($errors->any())
        <div class="mb-6 rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3">
            <div class="flex items-start">
                <svg class="w-5 h-5 mr-2 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <p class="font-medium mb-1">Terjadi kesalahan:</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('customer.profile.update') }}" method="POST"
          class="bg-white dark:bg-gray-900 rounded-xl shadow-md p-6 space-y-6">
        @csrf
        @method('PUT')

        {{-- Section: Informasi Pribadi --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">
                Informasi Pribadi
            </h2>

            <div class="space-y-5">
                {{-- Nama Lengkap --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-700
                               dark:bg-gray-800 dark:text-gray-100
                               focus:ring-2 focus:ring-primary/30 focus:border-primary
                               @error('name') border-red-500 @enderror"
                        placeholder="Masukkan nama lengkap"
                        required
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-700
                               dark:bg-gray-800 dark:text-gray-100
                               focus:ring-2 focus:ring-primary/30 focus:border-primary
                               @error('email') border-red-500 @enderror"
                        placeholder="contoh@email.com"
                        required
                    >
                    @error('email')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Nomor Telepon --}}
                <div>
                    <label for="telepon" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Nomor Telepon
                    </label>
                    <input
                        type="text"
                        id="telepon"
                        name="telepon"
                        value="{{ old('telepon', $user->customer->telepon ?? '') }}"
                        class="w-full rounded-lg border-gray-300 dark:border-gray-700
                               dark:bg-gray-800 dark:text-gray-100
                               focus:ring-2 focus:ring-primary/30 focus:border-primary
                               @error('telepon') border-red-500 @enderror"
                        placeholder="08xxxxxxxxxx"
                    >
                    @error('telepon')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Section: Alamat --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">
                Alamat
            </h2>

            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Alamat Lengkap
                </label>
                <textarea
                    id="alamat"
                    name="alamat"
                    rows="4"
                    class="w-full rounded-lg border-gray-300 dark:border-gray-700
                           dark:bg-gray-800 dark:text-gray-100
                           focus:ring-2 focus:ring-primary/30 focus:border-primary
                           @error('alamat') border-red-500 @enderror"
                    placeholder="Masukkan alamat lengkap (Jalan, RT/RW, Kelurahan, Kecamatan, Kota, Provinsi, Kode Pos)"
                >{{ old('alamat', $user->customer->alamat ?? '') }}</textarea>
                @error('alamat')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Alamat akan digunakan untuk pengiriman pesanan
                </p>
            </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-end gap-3 pt-6 border-t border-gray-200 dark:border-gray-700">
            <button
                type="submit"
                class="px-6 py-2.5 rounded-lg bg-primary text-black font-medium border border-primary
                       hover:bg-primary/90 focus:ring-2 focus:ring-primary/30
                       transition-colors">
                Simpan Perubahan
            </button>
        </div>
    </form>

</div>
@endsection