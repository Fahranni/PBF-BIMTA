<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\TugasAkhir;
use App\Models\Dosen;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class BimbinganController extends Controller
{
    // Cek apakah role-nya dosen, kalau bukan dilarang akses
    private function checkRole()
    {
        $role = session('role');
        if ($role !== 'dosen') {
            abort(403, 'Unauthorized action');
        }
    }

    public function bimbingan(Request $request)   // Tampilkan semua data bimbingan
    {
        $role = session('role');
        $response = Http::get('http://localhost:8080/Bimbingan'); // Ambil data bimbingan dari API lokal
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

        // FILTER berdasarkan nama dosen
        $filterDosen = $request->query('dosen');
        if ($filterDosen) {
            $bimbingan = array_filter($bimbingan, fn ($item) => $item['nama_dosen'] === $filterDosen);
        }

        return view('bimbingan.bimbingan', [
            'bimbingan' => $bimbingan,
            'role' => $role,
            'filterDosen' => $filterDosen,
        ]);
    }

        public function create()
    {
        $role = session('role');
        $dosen_pembimbing = Dosen::all();  
        return view('bimbingan.create', compact('dosen_pembimbing'));
    }


        public function store(Request $request)
        {
            $role = session('role');

            $validated = $request->validate([
                'id_ta' => 'required|exists:tugas_akhir,id_ta',
                'nidn' => 'required|exists:dosen_pembimbing,nidn',
                'tanggal_bimbingan' => 'required|date_format:Y-m-d\TH:i',
                'catatan_bimbingan' => 'required|string',
                // status tidak diinput user, diset manual di controller
            ]);

            // Set status default ke 0 (diajukan)
            $validated['status'] = 0;

            // Format tanggal
            $validated['tanggal_bimbingan'] = Carbon::parse($validated['tanggal_bimbingan'])->format('Y-m-d H:i:s');

            $bimbingan = Bimbingan::create($validated);

            if ($bimbingan) {
                return redirect()->route('bimbingan.bimbingan')->with('success', 'Data berhasil ditambahkan dengan status diajukan.');
            } else {
                return back()->withErrors(['error' => 'Gagal menyimpan data.']);
            }
        }

        public function show($mahasiswa)
        {
            $response = Http::get('http://localhost:8080/Bimbingan');
            if ($response->failed()) {
                abort(404, 'Data bimbingan tidak ditemukan.');
            }
            $bimbingan = collect($response->json());

            $dosenList = Dosen::all()->keyBy('nidn');
            $tugasAkhir = TugasAkhir::with('mahasiswa')->get()->keyBy('id_ta');

            $bimbinganList = $bimbingan->filter(function ($item) use ($mahasiswa, $tugasAkhir, $dosenList) {
                $ta = $tugasAkhir[$item['id_ta']] ?? null;
                $namaMahasiswa = $ta?->mahasiswa->nama ?? '-';
                if ($namaMahasiswa !== $mahasiswa) {
                    return false;
                }

                $item['nama_mahasiswa'] = $namaMahasiswa;
                $item['nama_dosen'] = $dosenList[$item['nidn']]->nama ?? '-';
                return true;
            })->values()->all();

            if (empty($bimbinganList)) {
                abort(404, 'Data bimbingan mahasiswa tidak ditemukan.');
            }

            return view('bimbingan.detail', [
                'mahasiswa' => $mahasiswa,
                'bimbinganList' => $bimbinganList,
            ]);
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

            $role = session('role');

            return view('bimbingan.edit', compact('bimbingan', 'tugasAkhir', 'dosen', 'role'));
        }

        public function update(Request $request, $id)
        {
            $validated = $request->validate([
                'status' => 'required|in:0,1',
                
            ]);

            
            $bimbingan = Bimbingan::find($id);
            if (!$bimbingan) {
                return back()->withErrors(['error' => 'Data tidak ditemukan.']);
            }

            // Update status dan simpan
            $bimbingan->status = $validated['status'];
            $bimbingan->save();

            return redirect()->route('bimbingan.bimbingan')->with('success', 'Data berhasil diperbarui');
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
            $response = Http::get("http://localhost:8080/Bimbingan/{$id}");

            if ($response->failed()) {
                return back()->withErrors(['error' => 'Data tidak ditemukan.']);
            }

            $bimbingan = $response->json();

            $dosenList = Dosen::all()->keyBy('nidn');
            $tugasAkhir = TugasAkhir::with('mahasiswa')->get()->keyBy('id_ta');

            $id_ta = $bimbingan['id_ta'] ?? null;
            $ta = $tugasAkhir[$id_ta] ?? null;
            $bimbingan['nama_mahasiswa'] = $ta?->mahasiswa->nama ?? '-';

            $nidn = $bimbingan['nidn'] ?? null;
            $bimbingan['nama_dosen'] = $dosenList[$nidn]->nama ?? '-';

            $pdf = PDF::loadView('bimbingan.pdf', compact('bimbingan'));

            $filename = 'jadwal-bimbingan-' . ($bimbingan['id_jadwal'] ?? $id) . '.pdf';

            return $pdf->download($filename);
        }
    }
