<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPerjalanan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_perjalanan';

    protected $fillable = [
        'mobil_id',
        'namaMobil',
        'namaLokasi',
        'fotoPerjalanan',
        'deskripsi_perjalanan',
        'tanggal_perjalanan'
    ];

    protected $casts = [
        'tanggal_perjalanan' => 'date'
    ];

    // Relationship dengan mobil
    public function mobil()
    {
        return $this->belongsTo(DaftarRental::class, 'mobil_id');
    }
}