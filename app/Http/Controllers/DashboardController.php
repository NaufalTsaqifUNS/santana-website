<?php

namespace App\Http\Controllers;

use App\Models\DaftarRental;
use App\Models\RiwayatPerjalanan;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'totalMobil' => DaftarRental::count(),
            'totalPerjalanan' => RiwayatPerjalanan::count(),
            'mobilTersedia' => DaftarRental::where('status', true)->count(),
        ];

        $mobilTerbaru = DaftarRental::latest()->take(5)->get();
        $perjalananTerbaru = RiwayatPerjalanan::with('mobil')->latest()->take(5)->get();

        return Inertia::render('Admin/Dashboard', [
            'stats' => $stats,
            'mobilTerbaru' => $mobilTerbaru,
            'perjalananTerbaru' => $perjalananTerbaru
        ]);
    }
}