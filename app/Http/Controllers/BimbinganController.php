<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use App\Models\Bimbingan;
use App\Models\TugasAkhir;
use App\Models\Dosen;
use Illuminate\Http\Request;


class BimbinganController extends Controller
{
   public function bimbingan()
    {
        // Ambil data dari API eksternal
        $response = Http::get('http://localhost:8080/Bimbingan');
        $bimbingan = $response->json();

        $dosenList = Dosen::all()->keyBy('nidn');
        $tugasAkhir = TugasAkhir::with('mahasiswa')->get()->keyBy('id_ta');

        foreach ($bimbingan as &$item) {
            $id_ta = $item['id_ta'];
            $ta = $tugasAkhir[$id_ta] ?? null;
            
            $item['nama_mahasiswa'] = $ta?->mahasiswa->nama ?? '-';
            $nidn = $item['nidn'] ?? null;
            $item['nama_dosen'] = $dosenList[$nidn]->nama ?? '-';
        }
        
        return view('bimbingan.bimbingan', compact('bimbingan'));
    }

    public function create()
    {
        $dosens = Dosen::all();
        return view('bimbingan.create', compact('dosens'));
 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_ta' => 'required',
            'nidn' => 'required',
            'tanggal_bimbingan' => 'required|date',
            'catatan_bimbingan' => 'required|string',
            'status' => 'required|string',
        ]);

        $response = Http::post('http://localhost:8080/Bimbingan', $validated);

        if ($response->successful()) {
            return redirect()->route('bimbingan.bimbingan')->with('success', 'Data berhasil ditambahkan.');
        } else {
            return back()->withErrors(['error' => 'Gagal menyimpan data.']);
        }
    }

    public function edit($id)
    {
        $response = Http::get("http://localhost:8080/Bimbingan/{$id}");
        if ($response->failed()) {
            return back()->withErrors(['error' => 'Data tidak ditemukan.']);
        }

        $bimbingan = $response->json();
        $tugasAkhir = TugasAkhir::all();
        $dosen = Dosen::all();

        return view('bimbingan.edit', compact('bimbingan', 'tugasAkhir', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_ta' => 'required',
            'nidn' => 'required',
            'tanggal_bimbingan' => 'required|date',
            'catatan_bimbingan' => 'required|string',
            'status' => 'required|string',
        ]);

        $response = Http::put("http://localhost:8080/Bimbingan/{$id}", $validated);

        if ($response->successful()) {
            return redirect()->route('bimbingan.bimbingan')->with('success', 'Data berhasil diperbarui.');
        } else {
            return back()->withErrors(['error' => 'Gagal mengupdate data.']);
        }
    }

    public function destroy($id)
    {
        $response = Http::delete("http://localhost:8080/Bimbingan/{$id}");

        if ($response->successful()) {
            return redirect()->route('bimbingan.bimbingan')->with('success', 'Data berhasil dihapus.');
        } else {
            return back()->withErrors(['error' => 'Gagal menghapus data.']);
        }
    }
}
