<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AntrianLayanan extends Model
{
    use HasFactory;

    protected $table = 'antrian_layanan'; 

    protected $fillable = [
        'antrian_id',
        'layanan_id'
    ];

    public function antrian()
    {
        return $this->belongsTo(Antrian::class);
    }

    public function layanan()
    {
        return $this->belongsToMany(Layanan::class, 'antrian_layanan');
    }
}
