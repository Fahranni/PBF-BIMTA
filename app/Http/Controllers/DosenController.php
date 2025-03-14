<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function dosen(){
        
        $response = Http::get('http://localhost:8080/Dosen');
        $dosen = $response->json();
        return view('Dosen.dosen', compact('dosen'));
    }
    public function create(){
        return view('Dosen.create');
    }
    public function store(Request $request){
    Dosen::create([
        'nidn'=> $request->nidn,
        'nama'=> $request->nama,
        'email'=> $request->email,
        'no_telp'=> $request->no_telp,
    ]);
    function destroy($id){
    }
    return redirect()->route('dosen.dosen')->with('Berhasil');
}
}

?>
