<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Data Jadwal Bimbingan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body class="bg-light vh-100">

  @include('header')

  <main class="container py-4 pt-2 pb-5 position-relative">
    <div class="row justify-content-center mt-0">
      <div class="col-md-10 col-lg-10 mt-50">
        <form action="{{ route('bimbingan.store') }}" method="POST" style="margin-top:100px;">
          @csrf

          <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
              <label for="id_ta" class="col-sm-2 col-form-label">ID Tugas Akhir</label>
              <div class="col-sm-10">
                <input type="text" name="id_ta" id="id_ta" class="form-control" placeholder="Masukkan ID Tugas Akhir" />
              </div>
            </div>

            <div class="mb-3 row">
              <label for="nidn" class="col-sm-2 col-form-label">Nama Dosen</label>
              <div class="col-sm-10">
                <select name="nidn" id="nidn" class="form-select" required>
                  <option value="">Pilih Dosen</option>
                  @foreach ($dosens as $dosen)
                    <option value="{{ $dosen->nidn }}">{{ $dosen->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="tanggal_bimbingan" class="col-sm-2 col-form-label">Tanggal Bimbingan</label>
              <div class="col-sm-10">
                <input type="date" name="tanggal_bimbingan" id="tanggal_bimbingan" class="form-control" />
              </div>
            </div>

            <div class="mb-3 row">
              <label for="catatan_bimbingan" class="col-sm-2 col-form-label">Catatan Bimbingan</label>
              <div class="col-sm-10">
                <textarea name="catatan_bimbingan" id="catatan_bimbingan" class="form-control" rows="4" placeholder="Masukkan catatan bimbingan"></textarea>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="status" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <select name="status" id="status" class="form-select" required>
                  <option value="">Pilih Status</option>
                  <option value="0">Diajukan</option>
                  <option value="1">Revisi</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-sm-10">
            <button type="submit" class="btn btn-success px-4" name="submit">SIMPAN</button>
          </div>
        </form>
      </div>
    </div>
  </main>

</body>
</html>
