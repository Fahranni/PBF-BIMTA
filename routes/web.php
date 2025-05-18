<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;

Route::view('/', 'login')->name('login'); // Route untuk login
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
?>