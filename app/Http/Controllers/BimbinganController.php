<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use App\Models\Bimbingan;
use App\Models\TugasAkhir;
use App\Models\Dosen;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Http\Request;
use Carbon\Carbon; 



class BimbinganController extends Controller
{
      private function checkRole(){
        $role = session('role');
        if($role!=='dosen'){
            abort(403, 'Unauthorized action');
        }
    }

   public function bimbingan()
    {
         $role = session('role');
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
        
        return view('bimbingan.bimbingan', compact('bimbingan', 'role'));
    }
   

    public function create()
    {
         $role = session('role');
        $dosens = Dosen::all();
        return view('bimbingan.create', compact('dosens'));
 
    }

    public function store(Request $request)
    {
         $role = session('role');
        $validated = $request->validate([
            'id_ta' => 'required',
            'nidn' => 'required',
            'tanggal_bimbingan' => 'required|date_format:Y-m-d\TH:i',
            'catatan_bimbingan' => 'required|string',
            'status' => 'required|in:0,1',
        ]);
        //dd($validated);
        $validated['tanggal_bimbingan'] = Carbon::parse($validated['tanggal_bimbingan'])->format('Y-m-d H:i:s');
        $validated['status'] = (int) $validated['status'];
        $response = Http::asJson()->post('http://localhost:8080/Bimbingan', $validated);
        
        if ($response->successful()) {
            return redirect()->route('bimbingan.bimbingan')->with('success', 'Data berhasil ditambahkan.');
        } else {
             dd($response->status(), $response->body());
        }
    }

        
    public function edit($id)
    {
         $role = session('role');
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
        $role = session('role');
        $validated = $request->validate([
            'id_ta' => 'required',
            'nidn' => 'required',
            'tanggal_bimbingan' => 'required|date_format:Y-m-d\TH:i',
            'catatan_bimbingan' => 'required|string',
            'status' => 'required|in:0,1',
        ]);
       // dd($validated);
        $validated['tanggal_bimbingan'] = Carbon::parse($validated['tanggal_bimbingan'])->format('Y-m-d H:i:s');
        $validated['status'] = (int) $validated['status'];
        $response = Http::asJson()->put("http://localhost:8080/Bimbingan/{$id}", $validated);

        if ($response->successful()) {
            return redirect()->route('bimbingan.bimbingan')->with('success', 'Data berhasil diperbarui.');
        } else {
             dd($response->status(), $response->body());
        }
    }

    public function destroy($id)
    {
        $role = session('role');
        $response = Http::delete("http://localhost:8080/Bimbingan/{$id}");

        if ($response->successful()) {
            return redirect()->route('bimbingan.bimbingan')->with('success', 'Data berhasil dihapus.');
        } else {
            return back()->withErrors(['error' => 'Gagal menghapus data.']);
        }
    }


    public function downloadPdf($id)
{
    // Ambil data bimbingan dari API eksternal (sama seperti di method bimbingan)
    $response = Http::get("http://localhost:8080/Bimbingan/{$id}");

    if ($response->failed()) {
        return back()->withErrors(['error' => 'Data tidak ditemukan.']);
    }

    $bimbingan = $response->json();

    // Ambil data dosen dan tugas akhir untuk nama mahasiswa dan dosen
    $dosenList = Dosen::all()->keyBy('nidn');
    $tugasAkhir = TugasAkhir::with('mahasiswa')->get()->keyBy('id_ta');

    // Tambahkan nama mahasiswa dan dosen ke data bimbingan
    $id_ta = $bimbingan['id_ta'] ?? null;
    $ta = $tugasAkhir[$id_ta] ?? null;
    $bimbingan['nama_mahasiswa'] = $ta?->mahasiswa->nama ?? '-';

    $nidn = $bimbingan['nidn'] ?? null;
    $bimbingan['nama_dosen'] = $dosenList[$nidn]->nama ?? '-';

    // Kirim data ke view PDF
    $pdf = PDF::loadView('bimbingan.pdf', compact('bimbingan'));

    $filename = 'jadwal-bimbingan-' . ($bimbingan['id_jadwal'] ?? $id) . '.pdf';

    return $pdf->download($filename);
}

}
