<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  </head>
  @include('sidebar')

  <body class="bg-light vh-100">
    <main class="content">
    <main class="container py-4"  pt-2 pb-5 position-relative>
    <div class="row justify-content-center mt-5">
    <div class="col-md-12">
                <!-- ALERT -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

        <!-- START DATA -->
        <div class="my-3 p-3 bg-with rounded shadow-sm">
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3 d-flex justify-content-between align-items-center">
                    <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
          
                <table class="table table-responsive">
                  <table class="table table-striped align-middle text-center text-nowrap">
                    <thead class="table-light">
                        <tr>
                        <th>No</th>
                        <th>NIDN</th>
                            <th class>Nama</th>
                            <th class>Email</th>
                            <th class>No.Telepon</th>
                            <th class>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if (!empty($dosen) && is_array($dosen))
                        @foreach ($dosen as $dosens)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dosens['nidn'] }}</td>
                            <td>{{ $dosens['nama'] }}</td>
                            <td>{{ $dosens['email'] }}</td>
                            <td>{{ $dosens['no_telp'] }}</td>
                            <td>
                              <form action="{{ route('dosen.destroy', $dosens['nidn']) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('dosen.edit', $dosens['nidn']) }}" class="btn btn-warning btn-sm me-1" title="edit">Edit
                                  <i class="bi bi-pencil-square"></i>
                                </a>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')" title="Hapus">
                                  <i class="bi bi-trash"></i>
                                </button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      @else
                        <tr>
                          <td colspan="6" class="text-center">Data dosen tidak tersedia.</td>
                        </tr>
                      @endif
                    </tbody>
                </table>       
          </div>
          <!-- AKHIR DATA -->
    </div>
    </div>
  </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>