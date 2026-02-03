<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Antrian extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'antrian'; 

    protected $fillable = [
        'nomor_antrian',
        'user_id',
        'cabang_id',
        'status',
        'datang_nanti',
        'waktu_masuk',
        'waktu_keluar'
    ];

    public function cabang()
    {
        return $this->belongsTo(Cabang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'waktu_masuk' => 'datetime',
        'waktu_keluar' => 'datetime',
    ];
}