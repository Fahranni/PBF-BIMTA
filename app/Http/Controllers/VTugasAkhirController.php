<?php

namespace App\Http\Controllers;
use App\Models\VTugasAkhir;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VTugasAkhirController extends Controller
{
    public function v_tugasakhir(){
        $role = session('role');
        $response = Http::get('http://localhost:8080/View');
        $v_tugasakhir = $response-> ok() ? $response->json() : ['data'];
        //dd($dosen);
        return view('v_tugasakhir.v_tugasakhir', compact('v_tugasakhir'));
    }
}
