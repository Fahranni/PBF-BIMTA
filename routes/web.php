<?php
use Illuminate\Support\Facades\Route;

Route::view('/', 'login')->name('login'); // Route untuk login
Route::view('/home', 'home')->name('home'); // Route untuk home
Route::view('/dosen', 'dosen.dosen')->name('dosen'); // Route untuk dosen
Route::view('/dosen/create', 'dosen.create')->name('dosen.create'); // Route tambah dosen
Route::view('/mahasiswa', 'mahasiswa')->name('mahasiswa'); // Route untuk mahasiswa

?>