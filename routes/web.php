<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\auth_controller;  // Corrected controller name

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
*/

Route::middleware('auth')->group(function () {
Route::get('/', [PembeliController::class, 'index'])->name('daftar_transaksi.index');

//rute crud admin untuk menambah daftar properti setelah login
Route::resource('admin', PropertyController::class);
//rute untuk melihat daftar transaksi yang berhasil

Route::get('data_transaksi.index', [PembeliController::class, 'index'])->name('data_transaksi.index');
Route::resource('pembeli', PembeliController::class);
});

// Halaman login untuk guest (belum login)
Route::get('/login', function () {
    return view('Auth.Login');
})->middleware('guest')->name('login');

//rute untuk mengakses halaman user
Route::get('user.index', [PropertyController::class, 'item'])->name('user.index');
Route::get('transaksi/{property_id}', [PembeliController::class, 'create'])->name('transaksi.index');
Route::post('/pembeli/store', [PembeliController::class, 'store'])->name('pembeli.store');

// Proses login dan logout
Route::post('/login-proses', [auth_controller::class, 'login'])->name('loginproccess');
Route::post('/logout', [auth_controller::class, 'logout'])->name('logout');