<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Data Jadwal Bimbingan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light vh-100">

  @include('header')

  <main class="container py-4 pt-2 pb-5 position-relative">
    <div class="row justify-content-center mt-0">
      <div class="col-md-10 col-lg-10 mt-50">
        <form action="{{ route('bimbingan.update', $bimbingan['id_jadwal']) }}" method="POST" style="margin-top:100px;">
          @csrf
          @method('PUT')

          <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
              <label for="id_ta" class="col-sm-2 col-form-label">ID Tugas Akhir</label>
              <div class="col-sm-10">
                <input type="text" name="id_ta" id="id_ta" class="form-control"
                       value="{{ old('id_ta', $bimbingan['id_ta']) }}" readonly />
              </div>
            </div>

            <div class="mb-3 row">
              <label for="nidn" class="col-sm-2 col-form-label">Nama Dosen</label>
              <div class="col-sm-10">
                <select name="nidn" id="nidn" class="form-select" disabled>
                  <option value="">Nama Dosen</option>
                  @foreach ($dosen as $d)
                    <option value="{{ $d->nidn }}" {{ $d->nidn == $bimbingan['nidn'] ? 'selected' : '' }}>
                      {{ $d->nama }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="tanggal_bimbingan" class="col-sm-2 col-form-label">Tanggal Bimbingan</label>
              <div class="col-sm-10">
                <input type="datetime-local" name="tanggal_bimbingan" id="tanggal_bimbingan" class="form-control"
                       value="{{ old('tanggal_bimbingan', $bimbingan['tanggal_bimbingan']) }}" readonly />
              </div>
            </div>

            <div class="mb-3 row">
              <label for="catatan_bimbingan" class="col-sm-2 col-form-label">Catatan Bimbingan</label>
              <div class="col-sm-10">
                <textarea name="catatan_bimbingan" id="catatan_bimbingan" class="form-control" readonly rows="4">{{ old('catatan_bimbingan', $bimbingan['catatan_bimbingan']) }}</textarea>
              </div>
            </div>

            <div class="mb-3 row">
              <label for="status" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                @php
                  $role = session('role'); 
                @endphp

                @if ($role === 'mahasiswa')
                  {{-- Jika mahasiswa, hanya lihat status readonly --}}
                  <input type="text" class="form-control" value="{{ $bimbingan['status'] == 1 ? 'Disetujui' : 'Diajukan' }}" readonly>
                  <input type="hidden" name="status" value="{{ $bimbingan['status'] }}">
                @elseif ($role === 'dosen')
                  {{-- Jika dosen, bisa pilih status --}}
                  <select name="status" id="status" class="form-select" required>
                    <option value="">Pilih Status</option>
                    <option value="0" {{ $bimbingan['status'] == 0 ? 'selected' : '' }}>Diajukan</option>
                    <option value="1" {{ $bimbingan['status'] == 1 ? 'selected' : '' }}>Disetujui</option>
                  </select>
                @else
                  {{-- Role lain, tampilkan status readonly --}}
                  <input type="text" class="form-control" value="{{ $bimbingan['status'] == 1 ? 'Disetujui' : 'Diajukan' }}" readonly>
                  <input type="hidden" name="status" value="{{ $bimbingan['status'] }}">
                @endif
              </div>
            </div>
          </div>

          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary px-4" name="submit">UPDATE</button>
          </div>
        </form>
      </div>
    </div>
  </main>

</body>
</html>
