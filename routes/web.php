<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\TugasAkhirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Models\Mahasiswa;
use App\Models\TugasAkhir;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registrasi', [RegistrasiController::class, 'showRegistrasiForm'])->name('registrasi');
Route::post('/registrasi', [RegistrasiController::class, 'registrasi'])->name('registrasi.submit');


Route::view('/home', 'home')->name('home'); // Route untuk home
Route::get('/dosen', [DosenController::class, 'dosen'])->name('dosen.dosen');
Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
Route::delete('/dosen/{nidn}', [DosenController::class, 'destroy'])->name('dosen.destroy');
Route::get('/dosen/{nidn}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
Route::put('/dosen/{nidn}', [DosenController::class, 'update'])->name('dosen.update'); 

Route::get('/mahasiswa', [MahasiswaController::class,'mahasiswa'])->name('mahasiswa.mahasiswa'); // Route untuk mahasiswa
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::delete('/mahasiswa/{npm}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
Route::get('/mahasiswa/{npm}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/{npm}', [MahasiswaController::class, 'update'])->name('mahasiswa.update'); 

Route::get('/tugas_akhir', [TugasAkhirController::class,'tugas_akhir'])->name('tugas_akhir.tugas_akhir'); // Route untuk Tugas Akhir
Route::get('/tugas_akhir/create', [TugasAkhirController::class, 'create'])->name('tugas_akhir.create');
Route::post('/tugas_akhir', [TugasAkhirController::class, 'store'])->name('tugas_akhir.store');
Route::delete('/tugas_akhir/{id_ta}', [TugasAkhirController::class, 'destroy'])->name('tugas_akhir.destroy');
Route::get('/tugas_akhir/{id_ta}/edit', [TugasAkhirController::class, 'edit'])->name('tugas_akhir.edit');
Route::put('/tugas_akhir/{id_ta}', [TugasAkhirController::class, 'update'])->name('tugas_akhir.update'); 
?>