<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Edit Data Dosen</title>
</head>
@include('header')

<body class="bg-light vh-100">
    <main class="container py-4"  pt-2 pb-5 position-relative>
        <div class="row justify-content-center mt-0">
        <div class="col-md-10 col-lg-10 mt-50">
            @if(!empty($dosen))
           <form action="{{route('dosen.update', $dosen['nidn'])}}" method='POST' style="margin-top:100px;" >
            @csrf
            @method('PUT')
            <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                    <label for="nidn" class="col-sm-2 col-form-label">NIDN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nidn' id="nidn" value="{{old ('nidn', $dosen['nidn'])}}">
                    </div>
            </div>
                <div class="mb-3 row">
                    <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama' id="nama" value="{{old('nama', $dosen['nama'])}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='email' id="email" value="{{old('email', $dosen['email'])}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_telp" class="col-sm-2 col-form-label">No.Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='no_telp' id="no_telp" value="{{old('no_telp', $dosen['no_telp'])}}">
                    </div>
                </div>
                 </div>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">UPDATE</button></div>
              </form>
              @else
              <div class="alert alert-danger">Data dosen tidak ditemukan.</div>
            @endif
            </div>
        </main>
</body>
</html>