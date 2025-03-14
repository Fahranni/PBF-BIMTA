<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'login')->name('login'); // Route untuk login
Route::view('/home', 'home')->name('home'); // Route untuk home
Route::get('/dosen', [DosenController::class, 'dosen'])->name('dosen.dosen');
Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
Route::get('/mahasiswa', [MahasiswaController::class,'mahasiswa'])->name('mahasiswa.mahasiswa'); // Route untuk mahasiswa
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');

?>