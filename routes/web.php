<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GuruController;

Route::resource('guru', GuruController::class);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('siswa/peminjaman', 'SiswaPeminjamanController@index')->middleware('auth')->name('peminjaman.index');
Route::get('siswa/peminjaman/create', 'SiswaPeminjamanController@create')->middleware('auth')->name('siswa.peminjaman.create');
Route::post('siswa/peminjaman', 'SiswaPeminjamanController@store')->middleware('auth')->name('siswa.peminjaman.store');
Route::resource('pengembalian', PengembalianController::class);
Route::resource('barangs', BarangController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('peminjaman', PeminjamanController::class);

Route::get('/', function () {
    return view('dashboard.index');
});
