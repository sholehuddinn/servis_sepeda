<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');

    Route::controller(CustomerController::class)->group(function () {
        Route::get('/kendaraan', 'getKendaraan')->name('customer.kendaraan');
        Route::post('/kendaraan', 'createKendaraan')->name('customer.kendaraan.store');
        Route::put('/kendaraan/{id}', 'editKendaraan')->name('customer.kendaraan.update');
        Route::delete('/kendaraan/{id}', 'deleteKendaraan')->name('customer.kendaraan.delete');

        Route::post('/antrian', 'storeAntrian')->name('customer.antrian.store');

        Route::get('/profile', 'getProfile')->name('customer.profile');
        Route::put('/profile', 'editProfile')->name('customer.profile.update');
    });

    Route::prefix('admin')->controller(AdminController::class)->group(function () {

        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/pelanggan', 'pelanggan')->name('admin.pelanggan');
        Route::post('/admin/antrian/{id}/status', 'updateStatus')
            ->name('admin.antrian.update-status');

        Route::prefix('/layanan')->group(function () {
            Route::get('/', 'getLayanan')->name('admin.layanan');
            Route::post('/', 'createLayanan')->name('admin.layanan.create');
            Route::put('/{id}', 'editLayanan')->name('admin.layanan.edit');
            Route::delete('/{id}', 'deleteLayanan')->name('admin.layanan.delete');
        });
    });
});

require __DIR__.'/auth.php';
