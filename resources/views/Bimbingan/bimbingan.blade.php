<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jadwal Bimbingan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  </head>

  @include('sidebar')

  <body class="bg-light vh-100">
    <main class="content">
      <div class="container py-4">
        <div class="row justify-content-center mt-5">
          <div class="col-md-12">

            {{-- ALERT --}}
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            
            <div class="my-3 p-3 bg-white rounded shadow-sm">
              <h3 class="text-center fw-bold mb-4">Daftar Jadwal Bimbingan</h3>

              {{-- FILTER DOSEN --}}
              <form method="GET" class="row g-3 mb-3">
                <div class="col-md-4">
                  <label for="filterDosen" class="form-label">Nama Dosen</label>
                  <select name="dosen" id="filterDosen" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Dosen</option>
                    @php
                      $uniqueDosen = collect($bimbingan)->pluck('nama_dosen')->unique();
                    @endphp
                    @foreach ($uniqueDosen as $dosen)
                      <option value="{{ $dosen }}" {{ request('dosen') == $dosen ? 'selected' : '' }}>
                        {{ $dosen }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </form>

              {{-- TOMBOL TAMBAH --}}
              <div class="mb-3 text-start">
                @if ($role !== 'dosen')
                  <a href="{{ route('bimbingan.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Data
                  </a>
                @endif
              </div>

              {{-- TABEL --}}
              <div class="table-responsive">
                <table class="table table-striped align-middle text-center text-nowrap">
                  <thead class="table-light">
                    <tr>
                      <th>No</th>
                      <th>Mahasiswa</th>
                      <th>Dosen</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $grouped = collect($bimbingan)->groupBy('nama_mahasiswa');
                      $i = 1;
                    @endphp

                    @forelse ($grouped as $mahasiswa => $list)
                      @if (request('dosen') && $list->first()['nama_dosen'] !== request('dosen'))
                        @continue
                      @endif

                      
                      <tr class="table-primary fw-semibold">
                        <td>{{ $i }}</td>
                        <td class="text-start">
                          <a
                            class="text-decoration-none"
                            data-bs-toggle="collapse"
                            href="#detailBimbingan{{ $i }}"
                            role="button"
                            aria-expanded="false"
                            aria-controls="detailBimbingan{{ $i }}"
                          >
                            {{ $mahasiswa }}
                          </a>
                        </td>
                        <td>{{ $list->first()['nama_dosen'] }}</td>
                        <td>
                          @if($list->first()['status'] == 0)
                            <span class="badge bg-warning text-dark">Diajukan</span>
                          @else
                            <span class="badge bg-success">Disetujui</span>
                          @endif
                        </td>
                      </tr>

                     
                      <tr class="collapse" id="detailBimbingan{{ $i }}">
                        <td colspan="4" class="text-start">
                          <div class="d-flex flex-column gap-3">
                            @foreach ($list as $entry)
                              <div class="card shadow-sm border rounded p-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                  <div>
                                    <strong>Tanggal:</strong>
                                    {{ \Carbon\Carbon::parse($entry['tanggal_bimbingan'])->format('d-m-Y H:i') }}
                                  </div>
                                  <div>
                                    @if ($entry['status'] == 0)
                                      <span class="badge bg-warning text-dark">Diajukan</span>
                                    @else
                                      <span class="badge bg-success">Disetujui</span>
                                    @endif
                                  </div>
                                </div>
                                <p class="mb-3"><strong>Catatan:</strong> {{ $entry['catatan_bimbingan'] }}</p>
                                <div>
                                  <a
                                    href="{{ route('bimbingan.download', $entry['id_jadwal']) }}"
                                    class="btn btn-sm btn-info me-2"
                                    target="_blank"
                                    title="Download PDF"
                                  >
                                    <i class="bi bi-file-earmark-pdf"></i>
                                  </a>

                                  @if ($role === 'dosen')
                                    <a
                                      href="{{ route('bimbingan.edit', $entry['id_jadwal']) }}"
                                      class="btn btn-sm btn-warning me-2"
                                      title="Edit"
                                    >
                                      <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form
                                      action="{{ route('bimbingan.destroy', $entry['id_jadwal']) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus?')"
                                    >
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                      </button>
                                    </form>
                                  @endif
                                </div>
                              </div>
                            @endforeach
                          </div>
                        </td>
                      </tr>

                      @php $i++; @endphp
                    @empty
                      <tr>
                        <td colspan="4" class="text-center text-muted">Tidak ada data bimbingan.</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
