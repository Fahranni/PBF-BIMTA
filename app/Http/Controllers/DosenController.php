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

    

    public function create(){//Menampilkan form tambah data dosen
        $this->checkRole();
        //$dosen = Dosen::all();
        return view('Dosen.create');
    }
    
    public function store(Request $request){//Function Menyimpan
    $this->checkRole();
    $response = Http::post('http://localhost:8080/Dosen',[
        'nidn' => $request->nidn,
        'nama' => $request->nama,
        'email'=> $request->email,
        'no_telp'=> $request->no_telp,
    ]);
    if (!$response->successful()){
       
       // return redirect()->route('dosen.dosen')->with('Berhasil','Data Berhasil disimpan');
        dd($response->status(), $response->body());
    }else{
        return redirect()->route('dosen.dosen')->with('eror','Gagal Menyimpan');
    }
    }

//Function menghapus data 
    public function destroy($nidn){
    $this->checkRole();
    $response = Http::delete("http://localhost:8080/Dosen/{$nidn}");

    if ($response->successful()) {
    return redirect()->route('dosen.dosen')->with('success', 'Data berhasil dihapus');
        }
     return redirect()->route('dosen.dosen')->with('error', 'Gagal menghapus data');
        }


    public function edit($nidn)//Edit Data
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
