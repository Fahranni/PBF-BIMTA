<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="bg-light vh-100">
    @include('header')

    <main class="container py-4"  pt-2 pb-5 position-relative>
        <div class="row justify-content-center mt-0">
        <div class="col-md-10 col-lg-10 mt-50">
            @if(!empty($mahasiswa))
            <form action="{{route('mahasiswa.update', $mahasiswa['npm'])}} " method= "POST" style="margin-top:100px;">
            @csrf
            @method('PUT')
            
            <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                    <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='npm' id="npm" value="{{old('npm', $mahasiswa['npm'])}}">
                    </div>
            </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama' id="nama" value="{{old('nama', $mahasiswa['nama'])}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='angkatan' id="angkatan" value="{{old('angkatan', $mahasiswa['angkatan'])}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='email' id="email" value="{{old('email', $mahasiswa['email'])}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_telp" class="col-sm-2 col-form-label">No.Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='no_telp' id="no_telp" value="{{old('no_telp', $mahasiswa['no_telp'])}}">
                    </div>
                </div>
                 </div>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">UPDATE</button></div>
              </form>
              @else
              <div class="alert alert-danger">Data Mahasiswa tidak ditemukan.</div>
            @endif
            </div>
        </div>
            <!-- AKHIR FORM -->
        </main>
</body>
</html>