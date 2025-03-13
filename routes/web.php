<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view ('login');
});

Route::get('/home', function () {
    return view ('home');
});
Route::get('/dosen', function () {
    return view ('dosen');
});
Route::get('/mahasiswa', function () {
    return view ('mahasiswa');
});