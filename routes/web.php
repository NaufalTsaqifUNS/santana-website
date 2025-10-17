<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarRentalController;
use App\Http\Controllers\RiwayatPerjalananController;
use Illuminate\Foundation\Application;
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

// Public routes - Guest access
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Protected admin routes - Require authentication
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Daftar Rental Routes - CRUD
    Route::prefix('admin')->group(function () {
        // Index - List all rental cars
        Route::get('/daftar-rental', [DaftarRentalController::class, 'index'])->name('daftar-rental.index');
        
        // Create - Show create form
        Route::get('/daftar-rental/create', [DaftarRentalController::class, 'create'])->name('daftar-rental.create');
        
        // Store - Save new rental car
        Route::post('/daftar-rental', [DaftarRentalController::class, 'store'])->name('daftar-rental.store');
        
        // Edit - Show edit form
        Route::get('/daftar-rental/{daftarRental}/edit', [DaftarRentalController::class, 'edit'])->name('daftar-rental.edit');
        
        // Update - Update existing rental car
        Route::put('/daftar-rental/{daftarRental}', [DaftarRentalController::class, 'update'])->name('daftar-rental.update');
        
        // Delete - Remove rental car
        Route::delete('/daftar-rental/{daftarRental}', [DaftarRentalController::class, 'destroy'])->name('daftar-rental.destroy');
    });

    // Riwayat Perjalanan Routes - CRUD
    Route::prefix('admin')->group(function () {
        // Index - List all travel history
        Route::get('/riwayat-perjalanan', [RiwayatPerjalananController::class, 'index'])->name('riwayat-perjalanan.index');
        
        // Create - Show create form
        Route::get('/riwayat-perjalanan/create', [RiwayatPerjalananController::class, 'create'])->name('riwayat-perjalanan.create');
        
        // Store - Save new travel history
        Route::post('/riwayat-perjalanan', [RiwayatPerjalananController::class, 'store'])->name('riwayat-perjalanan.store');
        
        // Edit - Show edit form
        Route::get('/riwayat-perjalanan/{riwayatPerjalanan}/edit', [RiwayatPerjalananController::class, 'edit'])->name('riwayat-perjalanan.edit');
        
        // Update - Update existing travel history
        Route::put('/riwayat-perjalanan/{riwayatPerjalanan}', [RiwayatPerjalananController::class, 'update'])->name('riwayat-perjalanan.update');
        
        // Delete - Remove travel history
        Route::delete('/riwayat-perjalanan/{riwayatPerjalanan}', [RiwayatPerjalananController::class, 'destroy'])->name('riwayat-perjalanan.destroy');
    });

    // Redirect to dashboard after login
    Route::get('/home', function () {
        return redirect()->route('admin.dashboard');
    });
});

Route::get('/', function () {
    return Inertia::render('Home'); 
})->name('home');

Route::get('/list-rental', function () {
    return Inertia::render('list-rental'); 
})->name('list-rental');

Route::get('/riwayat-rental', function () {
    return Inertia::render('riwayat-rental'); 
})->name('riwayat-rental');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Fallback route - Redirect to login if authenticated, otherwise to welcome page
Route::fallback(function () {
    if (auth()->check()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect('/');
});