<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\TugasAkhir;

class TugasAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tugas_akhir()
    {
        // Ambil data dari API eksternal
        $response = Http::get('http://localhost:8080/TugasAkhir');
        $tugas_akhir = $response->json();

        // Ambil data mahasiswa lokal berdasarkan npm
        $mahasiswa = \App\Models\Mahasiswa::all()->keyBy('npm');

        foreach ($tugas_akhir as &$item) {
            $npm = $item['npm'];
            $item['nama'] = $mahasiswa[$npm]->nama ?? '-';
        }

        return view('tugas_akhir.tugas_akhir', compact('tugas_akhir'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tugas_akhir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = $request->input('status');

        $rules=[
            'judul' => 'required|string',
            'ta' => 'required|file|mimes:pdf,doc,docx',
            'status' => 'required|in:0,1',
            'npm' => 'required|string',
    
        ];

        if($status == '0'){
                $rules['revisi'] ='required|file|mimes:pdf,doc,docx';
                $rules['tgl'] = 'required|date';

        }
        $validated = $request->validate($rules);
        // Simpan file ke storage/public
        $taPath = $request->file('ta')->store('tugas_akhir', 'public');

        $revisiPath = $request->hasFile('revisi') ? $request->file('revisi')->store('revisi_ta', 'public') : null;
        $tglRevisi = $request->input('tgl') ? date('Y-m-d', strtotime($request->input('tgl'))) : null;

        $data = [
            'judul' => $request->input('judul'),
            'file_ta' => $taPath,
            'status' => $status,
            'npm' => $request->input('npm'),
            'file_revisi' => $revisiPath,
            'tanggal_revisi' => $tglRevisi,
        ];

        // Kirim data ke API eksternal
        $response = Http::post('http://localhost:8080/TugasAkhir', $data);
    

        if ($response->successful()) {
            return redirect()->route('tugas_akhir.tugas_akhir')->with('success', 'Data berhasil disimpan');
        } else {
            $errorBody = $response->body();
            return redirect()->route('tugas_akhir.tugas_akhir')->with('error', 'Gagal menyimpan data: ' . $errorBody);
        }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TugasAkhir $tugasAkhir)
    {
        return view('tugas_akhir.edit', compact('tugasAkhir'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_ta)
    {
        $request->validate([
            'judul' => 'required|string',
            'ta' => 'nullable|file|mimes:pdf,doc,docx',
            'status' => 'required|string',
            'npm' => 'required|string',
            'revisi' => 'nullable|file|mimes:pdf,doc,docx',
            'tgl' => 'nullable|date',
        ]);

        $taPath = $request->hasFile('ta') ? $request->file('ta')->store('tugas_akhir', 'public') : null;
        $revisiPath = $request->hasFile('revisi') ? $request->file('revisi')->store('revisi_ta', 'public') : null;

        $payload = [
            'judul' => $request->judul,
            'status' => $request->status,
            'npm' => $request->npm,
            'tanggal_revisi' => $request->tgl,
        ];

        if ($taPath) {
            $payload['file_ta'] = $taPath;
        }

        if ($revisiPath) {
            $payload['file_revisi'] = $revisiPath;
        }

        $response = Http::put("http://localhost:8080/TugasAkhir/{$id_ta}", $payload);

        if ($response->successful()) {
            return redirect()->route('tugas_akhir.tugas_akhir')->with('success', 'Data berhasil diupdate');
        } else {
            return redirect()->route('tugas_akhir.tugas_akhir')->with('error', 'Gagal mengupdate data');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_ta)
    {
        $tugas_akhir = TugasAkhir::where('id_ta', $id_ta)->first();
        if ($tugas_akhir) {
            $tugas_akhir->delete();
            return redirect()->route('tugas_akhir.tugas_akhir')->with('success', 'Data berhasil dihapus');
        }
        return redirect()->route('tugas_akhir.tugas_akhir')->with('error', 'Data tidak ditemukan');
    }
}
