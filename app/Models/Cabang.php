<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabangs';

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'nama',
        'kode',
        'wilayah',
        'alamat',
        'jam_buka',
        'jam_tutup',
        'buka_sabtu',
        'buka_minggu',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'jam_buka' => 'datetime:H:i',
        'jam_tutup' => 'datetime:H:i',
        'buka_sabtu' => 'boolean',
        'buka_minggu' => 'boolean',
    ];

    // 1 cabang punya banyak user
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // Cek apakah cabang buka hari ini
    public function isOpenToday(): bool
    {
        $day = now()->dayOfWeek; // 0 = Minggu, 6 = Sabtu

        if ($day === 0 && !$this->buka_minggu) {
            return false;
        }

        if ($day === 6 && !$this->buka_sabtu) {
            return false;
        }

        return true;
    }
}
