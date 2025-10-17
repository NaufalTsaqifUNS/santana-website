<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarRentalController;
use App\Http\Controllers\RiwayatPerjalananController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ============================================================================
// PUBLIC ROUTES - Guest Access
// ============================================================================

// Homepage
Route::get('/', [DaftarRentalController::class, 'home'])->name('home');

// Public Rental List
Route::get('/list-rental', [DaftarRentalController::class, 'publicIndex'])->name('rentals.index');

// Riwayat Rental (Public)
Route::get('/riwayat-rental', function () {
    return Inertia::render('riwayat-rental'); 
})->name('riwayat-rental');

// ============================================================================
// AUTHENTICATION ROUTES
// ============================================================================

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// ============================================================================
// PROTECTED ADMIN ROUTES - Require Authentication
// ============================================================================

Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Daftar Rental Routes - CRUD (Admin)
    Route::prefix('admin')->name('daftar-rental.')->group(function () {
        Route::get('/daftar-rental', [DaftarRentalController::class, 'index'])->name('index');
        Route::get('/daftar-rental/create', [DaftarRentalController::class, 'create'])->name('create');
        Route::post('/daftar-rental', [DaftarRentalController::class, 'store'])->name('store');
        Route::get('/daftar-rental/{daftarRental}/edit', [DaftarRentalController::class, 'edit'])->name('edit');
        Route::put('/daftar-rental/{daftarRental}', [DaftarRentalController::class, 'update'])->name('update');
        Route::delete('/daftar-rental/{daftarRental}', [DaftarRentalController::class, 'destroy'])->name('destroy');
    });

    // Riwayat Perjalanan Routes - CRUD (Admin)
    Route::prefix('admin')->name('riwayat-perjalanan.')->group(function () {
        Route::get('/riwayat-perjalanan', [RiwayatPerjalananController::class, 'index'])->name('index');
        Route::get('/riwayat-perjalanan/create', [RiwayatPerjalananController::class, 'create'])->name('create');
        Route::post('/riwayat-perjalanan', [RiwayatPerjalananController::class, 'store'])->name('store');
        Route::get('/riwayat-perjalanan/{riwayatPerjalanan}/edit', [RiwayatPerjalananController::class, 'edit'])->name('edit');
        Route::put('/riwayat-perjalanan/{riwayatPerjalanan}', [RiwayatPerjalananController::class, 'update'])->name('update');
        Route::delete('/riwayat-perjalanan/{riwayatPerjalanan}', [RiwayatPerjalananController::class, 'destroy'])->name('destroy');
    });
});

// ============================================================================
// FALLBACK ROUTE
// ============================================================================
Route::fallback(function () {
    return Inertia::render('NotFound');
})->name('notfound');

