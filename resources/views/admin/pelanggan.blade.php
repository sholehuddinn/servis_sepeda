@extends('layouts.admin')

@section('title', 'Customer')

@section('content')
<div class="container mx-auto p-6">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Daftar Customer</h1>
        <p class="text-gray-500 mt-1">Kelola data Customer BikeServe</p>
    </div>

    <div class="rounded-lg border border-gray-200 bg-white shadow-sm">
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200 bg-gray-50/50">
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telepon</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kendaraan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($pelanggan as $user)
                        @foreach ($user->customer as $customer)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                                            <span class="text-sm font-medium text-red-600">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $user->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $customer->telepon ?? '0' }}</td>
                                <td class="px-6 py-4">
                                    @isset($customer->kendaraan)
                                        @if ($customer->kendaraan->count() > 0)
                                            <div class="space-y-2">
                                                @foreach ($customer->kendaraan as $kendaraan)
                                                    <div class="text-sm">
                                                        <div class="font-medium text-gray-900">{{ $kendaraan->tipe }}</div>
                                                        <div class="text-gray-600">{{ $kendaraan->brand }} - {{ $kendaraan->model }}</div>
                                                        <div class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800 mt-1">
                                                            {{ $kendaraan->plat_nomor }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-sm text-gray-400">-</span>
                                        @endif
                                    @endisset
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection