<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    private function checkRole(){
        $role = session('role');
        if($role !== 'admin' && $role !=='dosen'){
            abort(403, 'Unauthorized action');
        }
    }
   
    public function dosen(){//Menampilkan Data Dosen
        $role = session('role');
        $response = Http::get('http://localhost:8080/Dosen');
        $dosen = $response-> ok() ? $response->json() : [];
        //dd($dosen);
        return view('Dosen.dosen', compact('dosen', 'role'));
    }

    

    public function create(){//Menambah Data Dosen
        $this->checkRole();
        $dosen = Dosen::all();
        return view('Dosen.create', ['dosen' => $dosen]);
    }
    
    public function store(Request $request){
        $this->checkRole();
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
$this->checkRole();
    $dosen = Dosen::where('nidn', $nidn)->first();
    if ($dosen) {
        $dosen->delete();
        return redirect()->route('dosen.dosen')->with('success', 'Data berhasil dihapus');
    }
    return redirect()->route('dosen.dosen')->with('error', 'Data tidak ditemukan');
}

public function edit($nidn)
    {
        $this->checkRole();
        $response = Http::get("http://localhost:8080/Dosen/{$nidn}");
        $dosen = $response->json();
        $dosen = is_array($dosen) && isset($dosen[0]) ? $dosen[0] : $dosen;
        return view('Dosen.edit', compact('dosen'));
    }

public function update(Request $request, $nidn) {
    $this->checkRole();
    $response = Http::put("http://localhost:8080/Dosen/{$nidn}", [
        'nidn' => $request->nidn,
        'nama' => $request->nama,
        'email' => $request->email,
        'no_telp' => $request->no_telp,
    ]);
   
    if ($response->successful()) {
        return redirect()->route('dosen.dosen')->with('success', 'Data berhasil diupdate');
    } else {
        return redirect()->route('dosen.dosen')->with('error', 'Gagal mengupdate data');
    }
}


    }



?>
