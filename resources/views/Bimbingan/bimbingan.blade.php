<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Bimbingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
     <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
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
                
                
                <div class="pb-3">
                  <a href="{{ route('bimbingan.create') }}" class="btn btn-primary">Tambah Data</a>
                </div> 
            
                <table class="table table-responsive">
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
                      <td>{{$loop->iteration}}</td>
                      <td>{{$bimbingans['nama_mahasiswa']}}</td>
                      <td>{{$bimbingans['nama_dosen']}}</td>
                      <td>{{$bimbingans['tanggal_bimbingan']}}</td>
                      <td>{{$bimbingans['catatan_bimbingan']}}</td>
                      <td>{{$bimbingans['status']}}</td>
                      
                      <td>
                        <form action="{{ route('bimbingan.destroy', $bimbingans['id_jadwal']) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')

                          <a href="{{ route('bimbingan.edit', $bimbingans['id_jadwal']) }}" class="btn btn-warning btn-sm me-1" title="Edit">
                            <i class="bi bi-pencil-square"></i>
                          </a>

                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')" title="Hapus">
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
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>