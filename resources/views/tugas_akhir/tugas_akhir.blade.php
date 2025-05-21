<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Tugas Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  @include('header')
    
  <body class="bg-light vh-100">
    <main class="container py-4"  pt-2 pb-5 position-relative>
        <div class="row justify-content-center mt-5">
        <div class="col-md-10 col-lg-10 mt-50">
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                

                <div class="pb-3">
                  <a href="{{ route('tugas_akhir.create') }}" class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th class="col-md-1">No</th>
                            <th class="col-md-3">Judul</th>
                            <th class="col-md-3">Tugas Akhir</th>
                            <th class="col-md-2">Status</th>
                            <th class="col-md-2">Nama Mahasiswa</th>
                            <th class="col-md-2">Revisi</th>
                            <th class="col-md-2">Tanggal Revisi</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($tugas_akhir as $tugas_akhirs) 
                      <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$tugas_akhirs['judul']}}</td>
                      <td>
                        @if($tugas_akhirs['file_ta'])
                        <a href="{{asset('storage/tugas_akhir/' .$tugas_akhirs['file_ta'])}}" target="_blank">Lihat File</a>
                        @else
                        Tidak ada file
                        @endif
                      </td>

                      <td>{{$tugas_akhirs['status']}}</td>
                      <td>{{$tugas_akhirs['nama']}}</td>
<td>
                        @if($tugas_akhirs['file_revisi'])
                        <a href="{{asset('storage/revisi_ta/' .$tugas_akhirs['file_revisi'])}}" target="_blank">Lihat File</a>
                        @else
                        Tidak ada file
                        @endif
                      </td>
                      <td>{{$tugas_akhirs['tanggal_revisi']}}</td>
                      
                      <td>
                        <form action="{{ route('tugas_akhir.destroy', $tugas_akhirs['id_ta']) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('tugas_akhir.edit', $tugas_akhirs['id_ta']) }}" class="btn btn-warning btn-sm">Edit</a>
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                          </tbody>
                      </table>       
                </div>
                    </tbody>
                </table>       
          </div>
    </div>
    </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>