<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
   public function mahasiswa(){//Menampilkan Data Mahasiswa
        
      $response = Http :: get('http://localhost:8080/Mahasiswa');
      $mahasiswa = $response->json();
      return view('Mahasiswa.mahasiswa', compact('mahasiswa'));
  }

   public function create(){//Tambah data mahasiswa
      $mahasiswa = Mahasiswa::all();
      return view('Mahasiswa.create', ['mahasiswa' => $mahasiswa]);
  }

  public function store(Request $request){
   $response = Http :: post('http://localhost:8080/Mahasiswa', [
      'npm'=> $request->npm,
      'nama'=> $request->nama,
      'angkatan'=> $request->angkatan,
      'email'=> $request->email,
      'no_telp'=> $request->no_telp,
  ]);
  if ($response->successful()){
   $data = $response->json();
   return redirect()->route('mahasiswa.mahasiswa')->with('Berhasil', 'Data Berhasil Disimpan');
  }else{
  return redirect()->route('mahasiswa.mahasiswa')->with('eror', 'Gagal Menyimpan');
}
  }


  public function destroy($npm)
  {
  
      $mahasiswa = Mahasiswa::where('npm', $npm)->first();
      if ($mahasiswa) {
          $mahasiswa->delete();
          return redirect()->route('mahasiswa.mahasiswa')->with('success', 'Data berhasil dihapus');
      }
      return redirect()->route('mahasiswa.mahasiswa')->with('error', 'Data tidak ditemukan');
  }

public function edit($npm)
    {
        $response = Http::get("http://localhost:8080/Mahasiswa/{$npm}");
        $mahasiswa = $response->json();
        $mahasiswa = is_array($mahasiswa) && isset($mahasiswa[0]) ? $mahasiswa[0] : $mahasiswa;
        return view('Mahasiswa.edit', compact('mahasiswa'));
    }

public function update(Request $request, $npm) {
    $response = Http::put("http://localhost:8080/Mahasiswa/{$npm}", [
        'npm' => $request->npm,
        'nama' => $request->nama,
        'angkatan' => $request->angkatan,
        'email' => $request->email,
        'no_telp' => $request->no_telp,
    ]);
   
    if ($response->successful()) {
        return redirect()->route('mahasiswa.mahasiswa')->with('success', 'Data berhasil diupdate');
    } else {
        return redirect()->route('mahasiswa.mahasiswa')->with('error', 'Gagal mengupdate data');
    }
}

}
