<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraan';

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'customer_id',
        'tipe',
        'brand',
        'model',
        'plat_nomor',
    ];

    // Kendaraan milik satu customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
