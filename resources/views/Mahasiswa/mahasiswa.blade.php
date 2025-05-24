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
    <main class="container py-4"  pt-2 pb-5 position-relative>
        <div class="row justify-content-center mt-5">
        <div class="col-md-10 col-lg-10 mt-50">

          <!-- ALERT -->
            @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
            @endif

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="pb-3">
                  <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped align-middle text-center text-nowrap">
                    <thead class="table-light">
                        <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Email</th>
                        <th>No.Telepon</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($mahasiswa as $mahasiswas) 
                      <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$mahasiswas['npm']}}</td>
                      <td>{{$mahasiswas['nama']}}</td>
                      <td>{{$mahasiswas['angkatan']}}</td>
                      <td>{{$mahasiswas['email']}}</td>
                      <td>{{$mahasiswas['no_telp']}}</td>
                      <td>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswas['npm']) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('mahasiswa.edit', $mahasiswas['npm']) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                            <i class="bi bi-pencil-squere"></i>
                          </a>
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')" title="hapus">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>       
                </div>
        </div>      
          </div>
    </div>
  
    </main>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>