<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Tugas Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
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
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                
@if($role === 'admin' || $role === 'mahasiswa')
                <div class="pb-3">
                  <a href="{{ route('tugas_akhir.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
@endif
          <h3 class="text-center fw-bold mb-4">Tugas Akhir</h3>
                <table class="table table-responsive">
                    <thead class="table-light">
                        <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal Revisi</th>
                        @if($role === 'admin' || $role === 'mahasiswa')
                        <th>Aksi</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($tugas_akhir as $tugas_akhirs) 
                      <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$tugas_akhirs['judul']}}</td>
                      <td>{{$tugas_akhirs['status']}}</td>
                      <td>{{$tugas_akhirs['nama']}}</td>
                      
                      <td>{{$tugas_akhirs['tanggal_revisi']}}</td>
                      @if($role === 'admin' || $role === 'mahasiswa')
                      <td>
                        <form action="{{ route('tugas_akhir.destroy', $tugas_akhirs['id_ta']) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')

                          <a href="{{ route('tugas_akhir.edit', $tugas_akhirs['id_ta']) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                          </a>

                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')" title="Hapus">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                    </tbody>
                    </table>       
                </div>
        </div>
               
          </div>
    </div>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>