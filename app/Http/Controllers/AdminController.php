<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        Log::info('Session isi:',session()->all());
        return view('admin.admin');
    }
}
