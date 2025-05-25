<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Tugas Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light vh-100">

    @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

    @include('header')
    <main class="container py-4">
        <div class="row justify-content-center mt-0">
            <div class="col-md-10 col-lg-10 mt-5">
                <form action="{{ route('tugas_akhir.update', $tugasAkhir['id_ta']) }}" method="POST" enctype="multipart/form-data" style="margin-top:100px;">
                    @csrf
                    @method('PUT')

                    <div class="my-3 p-3 bg-body rounded shadow-sm">
                        <div class="mb-3 row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul Tugas Akhir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="judul" id="judul" value="{{ $tugasAkhir['judul'] }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="ta" class="col-sm-2 col-form-label">File Tugas Akhir</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="ta" id="ta">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah</small>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="status" id="status" value="{{ $tugasAkhir['status'] }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="npm" id="npm" value="{{ $tugasAkhir['npm'] }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="revisi" class="col-sm-2 col-form-label">File Revisi</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="revisi" id="revisi">
                                <small class="text-muted">Kosongkan jika tidak ingin mengubah</small>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tgl" class="col-sm-2 col-form-label">Tanggal Revisi</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tgl" id="tgl" value="{{ $tugasAkhir['tgl'] }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
