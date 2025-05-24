<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use App\Models\Bimbingan;
use App\Models\TugasAkhir;
use Illuminate\Http\Request;


class BimbinganController extends Controller
{
   public function bimbingan()
    {
        // Ambil data dari API eksternal
        $response = Http::get('http://localhost:8080/Bimbingan');
        $bimbingan = $response->json();

        $tugasAkhir = TugasAkhir::with('mahasiswa')->get()->keyBy('id_ta');

        foreach ($bimbingan as &$item) {
            $id_ta = $item['id_ta'];
            $ta = $tugasAkhir[$id_ta] ?? null;
            
            $item['nama_mahasiswa'] = $ta?->mahasiswa->nama ?? '-';
            $item['nama_dosen'] = $ta?->dosen->nama ?? '-';
        }
        
        return view('bimbingan.bimbingan', compact('bimbingan'));
    }
}
