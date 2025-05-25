<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tugas Akhir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light vh-100">

    @include('header')

    <main class="container py-4 pt-2 pb-5 position-relative">
        <div class="row justify-content-center mt-0">
            <div class="col-md-10 col-lg-10 mt-5">
                <form action="{{ route('tugas_akhir.update', $tugasAkhir['id_ta']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="my-3 p-3 bg-body rounded shadow-sm">

                        <!-- Judul -->
                        <div class="mb-3 row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul Tugas Akhir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    name="judul" id="judul" value="{{ old('judul', $tugasAkhir['judul']) }}">
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- NPM -->
                        <div class="mb-3 row">
                            <label for="npm" class="col-sm-2 col-form-label">NPM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('npm') is-invalid @enderror"
                                    name="npm" id="npm" value="{{ old('npm', $tugasAkhir['npm']) }}">
                                @error('npm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Tanggal Revisi -->
                        <div class="mb-3 row">
                            <label for="tgl" class="col-sm-2 col-form-label">Tanggal Revisi</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control @error('tgl') is-invalid @enderror"
                                    name="tgl" id="tgl" value="{{ old('tgl', $tugasAkhir['tanggal_revisi']) }}">
                                @error('tgl')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="status" id="statusDiajukan"
                                        value="1" {{ old('status', $tugasAkhir['status']) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="statusDiajukan">Diajukan</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="statusRevisi"
                                        value="0" {{ old('status', $tugasAkhir['status']) == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="statusRevisi">Revisi</label>
                                </div>
                            </div>
                            @error('status')
                                <div class="col-sm-10 offset-sm-2 text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                            <a href="{{ route('tugas_akhir.tugas_akhir') }}" class="btn btn-secondary">KEMBALI</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
