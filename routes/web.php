<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CertificateController;

// =====================
// USER - halaman utama
// =====================
Route::get('/', [CertificateController::class, 'index'])->name('home');
Route::post('/verify', [CertificateController::class, 'verify'])->name('verify');

// =====================
// REGISTER (sekali pakai)
// =====================
Route::get('/register', [AdminController::class, 'showRegister'])->name('register');
Route::post('/register', [AdminController::class, 'register'])->name('register.post');

// =====================
// AUTH ADMIN
// =====================
Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminController::class, 'login'])->name('login.post');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// =====================
// DASHBOARD ADMIN (wajib login)
// =====================
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/certificates', [AdminController::class, 'store'])->name('certificates.store');
    Route::delete('/certificates/{id}', [AdminController::class, 'delete'])->name('certificates.delete');

    // Manajemen Admin
    Route::get('/admins', [AdminController::class, 'adminList'])->name('admin.list');
    Route::post('/admins', [AdminController::class, 'adminStore'])->name('admin.store');
    Route::put('/admins/{id}/password', [AdminController::class, 'adminChangePassword'])->name('admin.change-password');
    Route::delete('/admins/{id}', [AdminController::class, 'adminDelete'])->name('admin.delete');
});
