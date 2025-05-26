<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Jadwal Bimbingan</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
  </head>

  @include('sidebar')

  <body class="bg-light vh-100">
    <main class="content">
      <div class="container py-4">
        <div class="row justify-content-center mt-5">
          <div class="col-lg-10">
            {{-- ALERT --}}
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            {{-- CARD --}}
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h3 class="text-center fw-bold mb-4">Daftar Jadwal Bimbingan</h3>
              <div class="mb-3 text-start">
                <a href="{{ route('bimbingan.create') }}" class="btn btn-primary">
                  <i class="bi bi-plus-circle"></i> Tambah Data
                </a>
              </div>

            

              <div class="table-responsive">
                <table class="table table-striped table-bordered text-center align-middle">
                  <thead class="table-light">
                    <tr>
                      <th>No</th>
                      <th>Mahasiswa</th>
                      <th>Dosen</th>
                      <th>Tanggal Bimbingan</th>
                      <th>Catatan Bimbingan</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bimbingan as $bimbingans)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bimbingans['nama_mahasiswa'] }}</td>
                        <td>{{ $bimbingans['nama_dosen'] }}</td>
                        <td>{{ $bimbingans['tanggal_bimbingan'] }}</td>
                        <td>{{ $bimbingans['catatan_bimbingan'] }}</td>
                        <td>{{ $bimbingans['status'] == 1 ? 'Diajukan' : 'Revisi' }}</td>
                        <td>
                        @if($role === 'dosen')
                        <form action="{{ route('bimbingan.destroy', $bimbingans['id_jadwal']) }}" method="POST" class="d-inline-flex gap-1">
                          @csrf
                          @method('DELETE')

                          <a href="{{ route('bimbingan.edit', $bimbingans['id_jadwal']) }}" class="btn btn-warning btn-sm" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                          </a>
                        @endif
                          <a href="{{ route('bimbingan.download', $bimbingans['id_jadwal']) }}" class="btn btn-info btn-sm" title="Download PDF" target="_blank">
                            <i class="bi bi-file-earmark-pdf"></i>
                          </a>

                          <button
                            type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus?')"
                            title="Hapus"
                          >
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                        </td>

                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div> {{-- END CARD --}}
          </div>
        </div>
      </div>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
