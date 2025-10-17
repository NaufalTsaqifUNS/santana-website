<?php

namespace App\Http\Controllers;

use App\Models\DaftarRental;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class DaftarRentalController extends Controller
{
    // Method untuk home page
    public function home()
    {
        // Ambil hanya mobil yang aktif (status = true) dan limit 6 untuk homepage
        $mobil = DaftarRental::where('status', true)
            ->latest()
            ->take(6)
            ->get();

        // Transform data
        $cars = $mobil->map(function ($car) {
            return [
                'id' => $car->id,
                'name' => $car->namaMobil,
                'pricePerDay' => $car->hargaMobil,
                'category' => $car->jenisMobil,
                'seats' => $car->seat,
                'fuel' => $car->jenisBahanBakar,
                'imageUrl' => $car->fotoMobil ? asset('storage/' . $car->fotoMobil) : null,
                'description' => $car->deskripsiMobil,
            ];
        });

        return Inertia::render('Home', [
            'cars' => $cars
        ]);
    }

    // Method untuk admin
    public function index()
    {
        $mobil = DaftarRental::paginate(10);
        return Inertia::render('Admin/DaftarRental/Index', [
            'mobil' => $mobil
        ]);
    }

    // Method untuk public rental list
    public function publicIndex(Request $request)
    {
        $query = DaftarRental::where('status', true); // Hanya tampilkan mobil yang aktif

        // Filter berdasarkan pencarian
        if ($request->filled('search')) {
            $query->where('namaMobil', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->filled('category') && $request->category !== 'All') {
            $query->where('jenisMobil', $request->category);
        }

        // Get all cars (tidak pakai pagination untuk tampilan public)
        $mobil = $query->get();

        // Transform data ke format yang sesuai dengan frontend
        $cars = $mobil->map(function ($car) {
            return [
                'id' => $car->id,
                'name' => $car->namaMobil,
                'pricePerDay' => $car->hargaMobil,
                'category' => $car->jenisMobil,
                'seats' => $car->seat,
                'fuel' => $car->jenisBahanBakar,
                'imageUrl' => $car->fotoMobil ? asset('storage/' . $car->fotoMobil) : null,
                'description' => $car->deskripsiMobil,
            ];
        });

        return Inertia::render('list-rental', [
            'cars' => $cars,
            'filters' => [
                'search' => $request->search,
                'category' => $request->category,
            ]
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/DaftarRental/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaMobil' => 'required|string|max:255',
            'fotoMobil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsiMobil' => 'required|string',
            'hargaMobil' => 'required|numeric|min:0',
            'jenisMobil' => 'required|in:MPV,Luxury MPV,SUV,Van,Sedan,Minibus,Bus',
            'seat' => 'required|integer|min:1',
            'jenisBahanBakar' => 'required|in:Bensin,Solar,Listrik,Hybrid',
        ]);

        $fotoPath = $request->file('fotoMobil')->store('mobil-images', 'public');

        DaftarRental::create([
            'namaMobil' => $request->namaMobil,
            'fotoMobil' => $fotoPath,
            'deskripsiMobil' => $request->deskripsiMobil,
            'hargaMobil' => $request->hargaMobil,
            'jenisMobil' => $request->jenisMobil,
            'seat' => $request->seat,
            'jenisBahanBakar' => $request->jenisBahanBakar,
        ]);

        return redirect()->route('daftar-rental.index')
            ->with('success', 'Mobil berhasil ditambahkan');
    }

    public function edit(DaftarRental $daftarRental)
    {
        return Inertia::render('Admin/DaftarRental/Edit', [
            'mobil' => $daftarRental
        ]);
    }

    public function update(Request $request, DaftarRental $daftarRental)
    {
        $request->validate([
            'namaMobil' => 'required|string|max:255',
            'fotoMobil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsiMobil' => 'required|string',
            'hargaMobil' => 'required|numeric|min:0',
            'jenisMobil' => 'required|in:MPV,Luxury MPV,SUV,Van,Sedan,Minibus,Bus',
            'seat' => 'required|integer|min:1',
            'jenisBahanBakar' => 'required|in:Bensin,Solar,Listrik,Hybrid',
            'status' => 'sometimes|boolean',
        ]);

        $data = [
            'namaMobil' => $request->namaMobil,
            'deskripsiMobil' => $request->deskripsiMobil,
            'hargaMobil' => $request->hargaMobil,
            'jenisMobil' => $request->jenisMobil,
            'seat' => $request->seat,
            'jenisBahanBakar' => $request->jenisBahanBakar,
            'status' => $request->boolean('status'),
        ];

        if ($request->hasFile('fotoMobil')) {
            $request->validate([
                'fotoMobil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($daftarRental->fotoMobil && Storage::disk('public')->exists($daftarRental->fotoMobil)) {
                Storage::disk('public')->delete($daftarRental->fotoMobil);
            }

            $data['fotoMobil'] = $request->file('fotoMobil')->store('mobil-images', 'public');
        }

        $daftarRental->update($data);

        return redirect()->route('daftar-rental.index')
            ->with('success', 'Mobil berhasil diperbarui');
    }

    public function destroy(DaftarRental $daftarRental)
    {
        if ($daftarRental->fotoMobil && Storage::disk('public')->exists($daftarRental->fotoMobil)) {
            Storage::disk('public')->delete($daftarRental->fotoMobil);
        }

        $daftarRental->delete();

        return redirect()->route('daftar-rental.index')
            ->with('success', 'Mobil berhasil dihapus');
    }
}