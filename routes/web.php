<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;

// Halaman Welcome (halaman utama)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route Guest (hanya bisa diakses jika belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// Route Auth (hanya bisa diakses setelah login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('skema', SkemaController::class);

    Route::resource('peserta', PesertaController::class)->parameters([
        'peserta' => 'peserta',
    ]);
});