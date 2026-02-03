<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'user_id',
        'telepon',
        'alamat',
    ];

    // Customer milik satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'customer_id');
    }
}
