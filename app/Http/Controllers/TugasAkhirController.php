<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class TugasAkhirController extends Controller
{
      private function checkRole(){
        $role = session('role');
        if($role !== 'admin' && $role !=='mahasiswa'){
            abort(403, 'Unauthorized action');
        }
    }

    public function tugas_akhir()
    {
        $role = session('role');
        $response = Http::get('http://localhost:8080/TugasAkhir');
        $tugas_akhir = $response->json();

        $mahasiswa = Mahasiswa::all()->keyBy('npm');

        foreach ($tugas_akhir as &$item) {
            $item['nama'] = $mahasiswa[$item['npm']]->nama ?? '-';
        }

        return view('tugas_akhir.tugas_akhir', compact('tugas_akhir', 'role'));
    }

    public function create()
    {
        $role = session('role');
        return view('tugas_akhir.create');
    }

    public function store(Request $request)
    {
        $role = session('role');
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'npm' => 'required|string|max:15',
            'status' => 'required|in:0,1',
            'tgl' => 'nullable|date',
        ]);

        $data = [
            'judul' => $validated['judul'],
            'npm' => $validated['npm'],
            'status' => $validated['status'],
            'tanggal_revisi' => $validated['tgl'] ?? now()->toDateString(),
        ];

        $response = Http::withOptions(['verify' => false])
            ->post('http://localhost:8080/TugasAkhir', $data);

        if ($response->successful()) {
            return redirect()->route('tugas_akhir.tugas_akhir')->with('success', 'Data berhasil ditambahkan.');
        }

        return redirect()->route('tugas_akhir.tugas_akhir')->with('error', 'Gagal menambah data: ' . $response->body());
    }

    public function edit($id_ta)
    {
        $role = session('role');
        $response = Http::get("http://localhost:8080/TugasAkhir/{$id_ta}");
        $tugasAkhir = $response->json();

        if (!$tugasAkhir || isset($tugasAkhir['message'])) {
            return redirect()->route('tugas_akhir.tugas_akhir')->with('error', 'Data tidak ditemukan.');
        }

        return view('tugas_akhir.edit', compact('tugasAkhir'));
    }

    public function update(Request $request, $id_ta)
    {
        $role = session('role');
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'npm' => 'required|string|max:15',
            'status' => 'required|in:0,1',
            'tgl' => 'nullable|date',
        ]);

        $data = [
            'judul' => $validated['judul'],
            'npm' => $validated['npm'],
            'status' => $validated['status'],
            'tanggal_revisi' => $validated['tgl'] ?? now()->toDateString(),
        ];

        $response = Http::withOptions(['verify' => false])
            ->put("http://localhost:8080/TugasAkhir/{$id_ta}", $data);

        if ($response->successful()) {
            return redirect()->route('tugas_akhir.tugas_akhir')->with('success', 'Data berhasil diperbarui.');
        }

        return redirect()->route('tugas_akhir.tugas_akhir')->with('error', 'Gagal memperbarui data: ' . $response->body());
    }

    public function destroy($id_ta)
    {
        $role = session('role');
        $response = Http::delete("http://localhost:8080/TugasAkhir/{$id_ta}");

        if ($response->successful()) {
            return redirect()->route('tugas_akhir.tugas_akhir')->with('success', 'Data berhasil dihapus.');
        }

        return redirect()->route('tugas_akhir.tugas_akhir')->with('error', 'Gagal menghapus data.');
    }
}
