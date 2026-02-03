<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Mockery\Matcher\Any;

class AntrianKendaraan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'antrian_kendaraan'; 

    protected $fillable = [
        'nomor_antrian',
        'kendaraan_id'
    ];

    public function nomorAntrian()
    {
        return $this->belongsTo(Antrian::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}