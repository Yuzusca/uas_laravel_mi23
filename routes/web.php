<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| 1. Route PUBLIC (Bisa diakses siapa saja)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');         // Halaman Depan
Route::get('/home', [HomeController::class, 'index']);                   // Alias untuk home
Route::get('/produk', [HomeController::class, 'produk'])->name('produk'); // Halaman Semua Produk
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');


/*
|--------------------------------------------------------------------------
| 2. Route GUEST (Hanya untuk yang BELUM Login)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Soal No 4: Halaman Daftar (URL: http://localhost/daftar)
    Route::get('/daftar', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/daftar', [AuthController::class, 'register'])->name('register.submit');

    // Soal No 5: Halaman Login (URL: http://localhost/login)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});


/*
|--------------------------------------------------------------------------
| 3. Route ADMIN (Hanya untuk yang SUDAH Login)
|--------------------------------------------------------------------------
*/
    Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Soal No 6: Halaman Admin (URL: http://localhost/admin)
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

    // Soal No 7: Halaman Kategori (URL: http://localhost/admin/kategori)
    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/admin/kategori/tambah', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');});
