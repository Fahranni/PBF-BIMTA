<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <title>Login</title>
  </head>
  <body>
 
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
              <div class="text-center">
                <img src="image/PNC.png" alt="Lock Icon" class="mb-0" width="100">
              </div>
                <h2 class="card-title text-center">L O G I N</h2>
            </div>
            <div class="card-text">
              
            <form action = "{{route('login.submit')}}" method="POST">
              @csrf
                <div class="mb-0">
                  <label for="username"  class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" value="{{old('username')}}">
                </div>

                <div class="mb-0">
                 <label for="password"  class="form-label">Password</label>
                 <input type="password" name="password" class="form-control" id="password">
                </div>

                <div class="d-grid gap-2">
                <button class="btn btn-primary">Login</button>
                </div>
                </form>
                @if(session('gagal'))
                    <div class="alert alert-danger mt-3 text-center">
                        {{session('gagal')}}
                    </div>
                @endif
                @if ($errors->any())
               <div class="alert alert-danger mt-3 text-center">
               @foreach ($errors->all() as $error)
               <div>{{ $error }}</div>
              @endforeach
              </div>
              @endif
        </div>
    </div>
    </div>
  </body>
</html>
