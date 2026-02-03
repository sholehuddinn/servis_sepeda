<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'nama',
        'kategori',
        'durasi_menit',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'durasi_menit' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | HELPER
    |--------------------------------------------------------------------------
    */

    // Ambil durasi dalam format jam + menit
    public function getDurasiLabelAttribute(): string
    {
        $menit = $this->durasi_menit;

        if ($menit < 60) {
            return $menit . ' menit';
        }

        $jam = intdiv($menit, 60);
        $sisa = $menit % 60;

        return $sisa === 0
            ? $jam . ' jam'
            : $jam . ' jam ' . $sisa . ' menit';
    }
}
