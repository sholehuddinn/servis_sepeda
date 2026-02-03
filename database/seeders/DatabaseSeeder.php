<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        $jayaUtamaId = DB::table('cabangs')->insertGetId([
            'nama' => 'AHAS Jaya Utama',
            'kode' => '01479',
            'wilayah' => 'Surabaya Timur',
            'alamat' => 'Jl. Wisma Kedung Asem Indah No. F2, Kedung Baruk, Rungkut, Surabaya',
            'jam_buka' => '08:00:00',
            'jam_tutup' => '16:00:00',
            'buka_sabtu' => true,
            'buka_minggu' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $untungJayaId = DB::table('cabangs')->insertGetId([
            'nama' => 'AHAS Untung Jaya',
            'kode' => '10948',
            'wilayah' => 'Surabaya Barat',
            'alamat' => 'Jl. Raya Darmo Indah Barat No. F-37, Tandes, Surabaya',
            'jam_buka' => '08:00:00',
            'jam_tutup' => '16:00:00',
            'buka_sabtu' => true,
            'buka_minggu' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $angwinMotorId = DB::table('cabangs')->insertGetId([
            'nama' => 'AHAS Angwin Motor',
            'kode' => '13995',
            'wilayah' => 'Surabaya Utara',
            'alamat' => 'Jl. Ngagel Jaya Selatan No. 66, Wonokromo, Surabaya',
            'jam_buka' => '08:00:00',
            'jam_tutup' => '16:00:00',
            'buka_sabtu' => false,
            'buka_minggu' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
        DB::table('users')->insert([
            // AHAS Jaya Utama
            [
                'name' => 'Admin Jaya Utama 1',
                'email' => 'admin1.jayautama@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'cabang_id' => $jayaUtamaId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin Jaya Utama 2',
                'email' => 'admin2.jayautama@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'cabang_id' => $jayaUtamaId,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // AHAS Untung Jaya
            [
                'name' => 'Admin Untung Jaya 1',
                'email' => 'admin1.untungjaya@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'cabang_id' => $untungJayaId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin Untung Jaya 2',
                'email' => 'admin2.untungjaya@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'cabang_id' => $untungJayaId,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // AHAS Angwin Motor
            [
                'name' => 'Admin Angwin Motor 1',
                'email' => 'admin1.angwin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'cabang_id' => $angwinMotorId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin Angwin Motor 2',
                'email' => 'admin2.angwin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'cabang_id' => $angwinMotorId,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // user seeder
            [
                'name' => 'User Seeder',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'cabang_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('layanan')->insert([
            [
                'nama' => 'Servis Ringan',
                'kategori' => 'Servis',
                'durasi_menit' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Servis Berat',
                'kategori' => 'Servis',
                'durasi_menit' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Tune Up / Pembersihan Injector',
                'kategori' => 'Tune Up',
                'durasi_menit' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Servis CVT',
                'kategori' => 'CVT',
                'durasi_menit' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Servis Rem / Ganti Kampas Rem',
                'kategori' => 'Rem',
                'durasi_menit' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ganti Busi / Aki / Lampu / Oli',
                'kategori' => 'Penggantian',
                'durasi_menit' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
        $userId = DB::table('users')
            ->where('role', 'user')
            ->value('id');

        DB::table('customers')->insert([
            'user_id' => $userId,
            'telepon' => '081234567890',
            'alamat' => 'Surabaya',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
