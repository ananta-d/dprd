<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Masyarakat\AuthController;
use App\Http\Controllers\Masyarakat\PengaduanController;
use App\Http\Controllers\Masyarakat\DashboardController as MasyarakatDashboardController;
use App\Http\Controllers\Masyarakat\ProfileController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;

use App\Http\Controllers\SesiController;
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
Route::get('/masyarakat/dashboard', [MasyarakatDashboardController::class, 'dashboard'])->name('masyarakat.dashboard');
Route::post('/masyarakat/lapor', [PengaduanController::class, 'storeLaporan'])->name('laporan.store');

// riwayat 
Route::get('riwayat-pengaduan/tanggapan', [RiwayatController::class, 'index'])->name('masyarakat.tanggapan');

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
Route::middleware(['sudahLogin'])->group(function () {
    Route::get('/login', [SesiController::class, 'index'])->name('login-admin-staff');
    Route::post('/proses-login', [SesiController::class, 'prosesLogin'])->name('proses.login');
});

Route::prefix('admin')->middleware(['isLogin', 'userAkses:admin'])->group(function () {
    Route::get('/dashbord', [AdminDashboardController::class, 'index'])->name('dashboard.admin');

    // route bagian2 yang admin disini ya


});

Route::prefix('staff')->middleware(['isLogin', 'userAkses:staff'])->group(function () {
    Route::get('/dashbord', [StaffDashboardController::class, 'index'])->name('dashboard.staff');

    // route bagian2 yang staff disini yaa
});

Route::post('/logout', [SesiController::class, 'logout'])->name('logout');