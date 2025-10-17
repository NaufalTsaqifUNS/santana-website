<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarRental extends Model
{
    use HasFactory;

    protected $table = 'daftar_rental';

    protected $fillable = [
        'namaMobil',
        'fotoMobil',
        'deskripsiMobil',
        'hargaMobil',
        'jenisMobil',
        'seat',
        'jenisBahanBakar',
        'status'
    ];

    protected $casts = [
        'hargaMobil' => 'decimal:2',
        'status' => 'boolean'
    ];

    // Relationship dengan riwayat perjalanan
    public function riwayatPerjalanan()
    {
        return $this->hasMany(RiwayatPerjalanan::class, 'mobil_id');
    }
}