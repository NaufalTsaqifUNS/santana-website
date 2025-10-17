<?php

namespace App\Http\Controllers;

use App\Models\DaftarRental;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class DaftarRentalController extends Controller
{
    public function index()
    {
        $mobil = DaftarRental::paginate(10);
        return Inertia::render('Admin/DaftarRental/Index', [
            'mobil' => $mobil
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
            'jenisBahanBakar' => 'required|in:Bensin,Diesel,Listrik,Hybrid',
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
        // Debug: lihat data yang dikirim
        // dd($request->all(), $daftarRental);

        $request->validate([
            'namaMobil' => 'required|string|max:255',
            'fotoMobil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsiMobil' => 'required|string',
            'hargaMobil' => 'required|numeric|min:0',
            'jenisMobil' => 'required|in:MPV,Luxury MPV,SUV,Van,Sedan,Minibus,Bus',
            'seat' => 'required|integer|min:1',
            'jenisBahanBakar' => 'required|in:Bensin,Diesel,Listrik,Hybrid',
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

        // Handle file upload jika ada foto baru
        if ($request->hasFile('fotoMobil')) {
            // Validasi file
            $request->validate([
                'fotoMobil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus foto lama
            if ($daftarRental->fotoMobil && Storage::disk('public')->exists($daftarRental->fotoMobil)) {
                Storage::disk('public')->delete($daftarRental->fotoMobil);
            }

            // Simpan foto baru
            $data['fotoMobil'] = $request->file('fotoMobil')->store('mobil-images', 'public');
        }

        $daftarRental->update($data);

        return redirect()->route('daftar-rental.index')
            ->with('success', 'Mobil berhasil diperbarui');
    }

    public function destroy(DaftarRental $daftarRental)
    {
        // Hapus foto
        if ($daftarRental->fotoMobil && Storage::disk('public')->exists($daftarRental->fotoMobil)) {
            Storage::disk('public')->delete($daftarRental->fotoMobil);
        }

        $daftarRental->delete();

        return redirect()->route('daftar-rental.index')
            ->with('success', 'Mobil berhasil dihapus');
    }
}