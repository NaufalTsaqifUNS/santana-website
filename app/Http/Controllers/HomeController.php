<?php

namespace App\Http\Controllers;

use App\Models\DaftarRental;
use App\Models\RiwayatPerjalanan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $cars = DaftarRental::where('status', true)
            ->latest()
            ->get()
            ->map(function ($car) {
                return [
                    'id' => $car->id,
                    'name' => $car->namaMobil,
                    'category' => $car->kategoriMobil,
                    'price' => $car->hargaSewa,
                    'image' => $car->fotoMobil ? asset('storage/' . $car->fotoMobil) : null,
                    'transmission' => $car->transmisi,
                    'capacity' => $car->kapasitas,
                    'fuel' => $car->bahanBakar,
                ];
            });

        $riwayatPerjalanan = RiwayatPerjalanan::with('mobil')
            ->latest('tanggal_perjalanan')
            ->get()
            ->map(function ($riwayat) {
                return [
                    'id' => $riwayat->id,
                    'namaLokasi' => $riwayat->namaLokasi,
                    'fotoPerjalanan' => $riwayat->fotoPerjalanan,
                    'namaMobil' => $riwayat->namaMobil,
                    'tanggal_perjalanan' => $riwayat->tanggal_perjalanan,
                    'deskripsi_perjalanan' => $riwayat->deskripsi_perjalanan,
                ];
            });

        return Inertia::render('Home', [
            'cars' => $cars,
            'riwayatPerjalanan' => $riwayatPerjalanan
        ]);
    }
}