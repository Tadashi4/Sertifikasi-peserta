<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\UserController;

// Halaman Welcome
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Hanya untuk yang BELUM login
Route::middleware('guest')->group(function () {
    // User
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');

    // Admin
    Route::get('/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login.process');
});

// Hanya untuk yang SUDAH login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Halaman user biasa
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    // Halaman khusus admin
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('skema', SkemaController::class);
        Route::resource('peserta', PesertaController::class)->parameters([
            'peserta' => 'peserta',
        ]);
    });
});