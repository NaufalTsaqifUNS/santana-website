<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPerjalanan;
use App\Models\DaftarRental;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class RiwayatPerjalananController extends Controller
{
      public function publicIndex()
    {
        $riwayat = RiwayatPerjalanan::with('mobil')
            ->latest('tanggal_perjalanan')
            ->paginate(9);
        
        return Inertia::render('riwayat-perjalanan', [
            'riwayat' => $riwayat
        ]);
    }

    public function index()
    {
        $riwayat = RiwayatPerjalanan::with('mobil')->latest()->paginate(10);
        return Inertia::render('Admin/RiwayatPerjalanan/Index', [
            'riwayat' => $riwayat
        ]);
    }

    public function create()
    {
        $mobil = DaftarRental::where('status', true)->get();
        return Inertia::render('Admin/RiwayatPerjalanan/Create', [
            'mobil' => $mobil
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobil_id' => 'required|exists:daftar_rental,id',
            'namaLokasi' => 'required|string|max:255',
            'fotoPerjalanan' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'deskripsi_perjalanan' => 'nullable|string',
            'tanggal_perjalanan' => 'required|date',
        ]);

        $mobil = DaftarRental::findOrFail($request->mobil_id);
        $fotoPath = $request->file('fotoPerjalanan')->store('perjalanan-images', 'public');

        RiwayatPerjalanan::create([
            'mobil_id' => $request->mobil_id,
            'namaMobil' => $mobil->namaMobil,
            'namaLokasi' => $request->namaLokasi,
            'fotoPerjalanan' => $fotoPath,
            'deskripsi_perjalanan' => $request->deskripsi_perjalanan,
            'tanggal_perjalanan' => $request->tanggal_perjalanan,
        ]);

        return redirect()->route('riwayat-perjalanan.index')
            ->with('success', 'Riwayat perjalanan berhasil ditambahkan');
    }

    public function edit(RiwayatPerjalanan $riwayatPerjalanan)
    {
        $mobil = DaftarRental::where('status', true)->get();
        return Inertia::render('Admin/RiwayatPerjalanan/Edit', [
            'riwayat' => $riwayatPerjalanan,
            'mobil' => $mobil
        ]);
    }

    public function update(Request $request, RiwayatPerjalanan $riwayatPerjalanan)
    {
        $request->validate([
            'mobil_id' => 'required|exists:daftar_rental,id',
            'namaLokasi' => 'required|string|max:255',
            'fotoPerjalanan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'deskripsi_perjalanan' => 'nullable|string',
            'tanggal_perjalanan' => 'required|date',
        ]);

        $data = $request->except('fotoPerjalanan');

        if ($request->hasFile('fotoPerjalanan')) {
            // Hapus foto lama
            if ($riwayatPerjalanan->fotoPerjalanan) {
                Storage::disk('public')->delete($riwayatPerjalanan->fotoPerjalanan);
            }
            $data['fotoPerjalanan'] = $request->file('fotoPerjalanan')->store('perjalanan-images', 'public');
        }

        // Update nama mobil jika mobil_id berubah
        if ($request->mobil_id != $riwayatPerjalanan->mobil_id) {
            $mobil = DaftarRental::findOrFail($request->mobil_id);
            $data['namaMobil'] = $mobil->namaMobil;
        }

        $riwayatPerjalanan->update($data);

        return redirect()->route('riwayat-perjalanan.index')
            ->with('success', 'Riwayat perjalanan berhasil diperbarui');
    }

    public function destroy(RiwayatPerjalanan $riwayatPerjalanan)
    {
        // Hapus foto
        if ($riwayatPerjalanan->fotoPerjalanan) {
            Storage::disk('public')->delete($riwayatPerjalanan->fotoPerjalanan);
        }

        $riwayatPerjalanan->delete();

        return redirect()->route('riwayat-perjalanan.index')
            ->with('success', 'Riwayat perjalanan berhasil dihapus');
    }
}