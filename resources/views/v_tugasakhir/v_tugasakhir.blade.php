<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Tugas Akhir (View)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  </head>

  <body class="bg-light vh-100">
    @include('sidebar')

    <!-- Konten utama -->
    <main class="container py-4" style="margin-left: 250px;">
      <div class="row justify-content-center mt-5">
        <div class="col-md-12">

          <!-- ALERT -->
          @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          <!-- START DATA -->
          <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h3 class="text-center fw-bold mb-4">Data Tugas Akhir (View)</h3>

            <div class="table-responsive w-75 mx-auto">
              <table class="table table-striped align-middle text-center text-nowrap table-bordered">
                <thead class="table-light">
                  <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nama Dosen</th>
                    <th>Judul</th>
                    <th>Tanggal Bimbingan</th>
                    <th>Catatan Bimbingan</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($v_tugasakhir as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item['npm'] }}</td>
                    <td>{{ $item['nama_mahasiswa'] }}</td>
                    <td>{{ $item['nama_dosen'] }}</td>
                    <td>{{ $item['judul'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($item['tanggal_bimbingan'])->format('d-m-Y') }}</td>
                    <td>{{ $item['catatan_bimbingan'] }}</td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" class="text-center text-muted">Tidak ada data tugas akhir.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <!-- END DATA -->

        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
