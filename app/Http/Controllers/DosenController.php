<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function dosen(){//Menampilkan Data Dosen
        
        $response = Http::get('http://localhost:8080/Dosen');
        $dosen = $response->json();
        return view('Dosen.dosen', compact('dosen'));
    }
    public function create(){//Menambah Data Dosen
        $dosen = Dosen::all();
        return view('Dosen.create', ['dosen' => $dosen]);
    }
    
    public function store(Request $request){
    $response = Http::post('http://localhost:8080/Dosen',[
        'nidn' => $request->nidn,
        'nama' => $request->nama,
        'email'=> $request->email,
        'no_telp'=> $request->no_telp,
    ]);
    if ($response->successful()){
        $data = $response->json();
        return redirect()->route('dosen.dosen')->with('Berhasil','Data Berhasil disimpan');
    }else{
        return redirect()->route('dosen.dosen')->with('eror','Gagal Menyimpan');
    }
    }
    public function destroy($nidn)
{
    $dosen = Dosen::where('nidn', $nidn)->first();
    if ($dosen) {
        $dosen->delete();
        return redirect()->route('dosen.dosen')->with('success', 'Data berhasil dihapus');
    }
    return redirect()->route('dosen.dosen')->with('error', 'Data tidak ditemukan');
}
    }



?>
