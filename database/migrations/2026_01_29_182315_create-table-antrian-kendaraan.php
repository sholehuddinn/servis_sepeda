<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('antrian_kendaraan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('antrian_id')
                  ->constrained('antrian')
                  ->cascadeOnDelete();

            $table->foreignId('kendaraan_id')
                  ->constrained('kendaraan')
                  ->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();

            $table->index(['antrian_id', 'kendaraan_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('antrian_kendaraan');
    }
};
