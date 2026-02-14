<?php

// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\Masyarakat\AuthController;
use App\Http\Controllers\Masyarakat\PengaduanController;
use App\Http\Controllers\Masyarakat\DashboardController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Masyarakat\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| 1. JALUR MASYARAKAT (Sistem Cek NIK & Pengaduan)
|--------------------------------------------------------------------------
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Autentikasi Masyarakat (NIK)
Route::get('/masyarakat', [AuthController::class, 'index'])->name('masyarakat.index');
Route::post('/masyarakat/cek-nik', [AuthController::class, 'cekNik'])->name('masyarakat.cekNik');
Route::get('/masyarakat/register', [AuthController::class, 'register'])->name('masyarakat.register');
Route::post('/masyarakat/register', [AuthController::class, 'storeRegister'])->name('masyarakat.store_register');

// Fitur Dashboard & Laporan
Route::get('/masyarakat/dashboard', [DashboardController::class, 'dashboard'])->name('masyarakat.dashboard');
Route::post('/masyarakat/lapor', [PengaduanController::class, 'storeLaporan'])->name('laporan.store');

// --- FITUR TAMBAHAN DARI VERSI YAZID ---
// Profile Masyarakat
Route::get('/masyarakat/profile', [ProfileController::class, 'profile'])->name('masyarakat.profile');
Route::post('/masyarakat/profile/update', [ProfileController::class, 'updateProfile'])->name('masyarakat.updateProfile');

// Logout Masyarakat
Route::get('/masyarakat/logout', [AuthController::class, 'logout'])->name('masyarakat.logout');


/*
|--------------------------------------------------------------------------
| 2. JALUR ADMIN & STAFF (Bawaan Breeze)
|--------------------------------------------------------------------------
*/
Route::redirect('/role', '/login')->name('role');

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Fitur Profile Admin (Bawaan Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
