<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
  </head>

  @include('sidebar')

  <body class="bg-light vh-100">
    <main class="content">
      <div class="container py-4">
        <div class="row justify-content-center mt-5">
          <div class="col-lg-10">

            {{-- ALERT SUCCESS --}}
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            {{-- DATA MAHASISWA --}}
            <div class="my-3 p-3 bg-white rounded shadow-sm">
              <h3 class="text-center fw-bold mb-4">Daftar Mahasiswa</h3>

              @if($role === 'admin' || $role === 'mahasiswa')
                <div class="mb-3 text-start">
                  <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Data
                  </a>
                </div>
              @endif

              <div class="table-responsive">
                <table class="table table-striped table-bordered text-center align-middle">
                  <thead class="table-light">
                    <tr>
                      <th>No</th>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Angkatan</th>
                      <th>Email</th>
                      <th>No. Telepon</th>
                      @if($role === 'admin' || $role === 'mahasiswa')
                        <th>Aksi</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($mahasiswa as $mahasiswas)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswas['npm'] }}</td>
                        <td>{{ $mahasiswas['nama'] }}</td>
                        <td>{{ $mahasiswas['angkatan'] }}</td>
                        <td>{{ $mahasiswas['email'] }}</td>
                        <td>{{ $mahasiswas['no_telp'] }}</td>

                        @if($role === 'admin' || $role === 'mahasiswa')
                          <td>
                            <form action="{{ route('mahasiswa.destroy', $mahasiswas['npm']) }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')

                              <a href="{{ route('mahasiswa.edit', $mahasiswas['npm']) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                              </a>

                              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')" title="Hapus">
                                <i class="bi bi-trash"></i>
                              </button>
                            </form>
                          </td>
                        @endif
                      </tr>
                    @empty
                      <tr>
                        <td colspan="7" class="text-muted">Belum ada data mahasiswa.</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>

            </div> {{-- END CARD --}}
          </div>
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
