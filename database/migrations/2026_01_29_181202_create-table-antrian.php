<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('nomor_antrian');

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->foreignId('cabang_id')
                  ->constrained('cabangs')
                  ->cascadeOnDelete();

            $table->enum('status', [
                'menunggu',
                'diproses',
                'selesai',
                'batal'
            ])->default('menunggu');

            $table->boolean('datang_nanti')->default(false);

            $table->timestamp('waktu_masuk')->useCurrent()->nullable();
            $table->timestamp('waktu_keluar')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['nomor_antrian', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('antrian');
    }
};
