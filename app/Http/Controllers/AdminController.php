<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        Log::info('Session isi:',session()->all()); // Mencatat isi sesi (session) ke file log Laravel


        return view('admin.admin'); // Menampilkan view resources/views/admin/admin.blade.php
    }
}
