<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <title>Registrasi</title>
  </head>
  <body>
    <div class="global-container">
      <div class="card login-form">
        <div class="card-body">
          <div class="text-center">
            <img
              src="image/PNC.png"
              alt="Lock Icon"
              class="mb-0"
              width="100"
            />
          </div>
          <h2 class="card-title text-center">REGISTRASI</h2>
        </div>
        <div class="card-text">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="{{ route('registrasi.submit') }}" method="POST">
            @csrf
            <div>
              <label for="username" class="form-label">Username</label>
              <input
                type="text"
                name="username"
                class="form-control"
                id="username"
                aria-describedby="emailHelp"
              />
            </div>

            <div>
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                name="password"
                class="form-control"
                id="password"
              />
            </div>

            <div>
              <label for="role" class="form-label">Role</label>
              <select
                name="role"
                id="role"
                class="form-select"
                required
              >
                <option value="" disabled selected>Pilih role</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="dosen" {{ old('role') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
              </select>
            </div>

            <div class="d-grid gap-1">
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
