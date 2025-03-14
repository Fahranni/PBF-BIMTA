<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
   public function mahasiswa(){
      $mahasiswa = Mahasiswa::all();
      return view('mahasiswa.mahasiswa', compact('mahasiswa'));
   }
   public function create(){
      return view('Dosen.create');
  }
  public function store(Request $request){
  Mahasiswa::create([
      'nidn'=> $request->npm,
      'nama'=> $request->nama,
      'angkatan'=> $request->angkatan,
      'email'=> $request->nidn,
      'no_telp'=> $request->nidn,
  ]);
  return redirect()->route('mahasiswa.mahasiswa')->with('Berhasil');
}
}
