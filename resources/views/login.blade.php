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
                <img src="image/PNC.png" alt="Lock Icon" class="mb-3" width="90">
              </div>
                <h1 class="card-title text-center">L O G I N</h1>
            </div>
            <div class="card-text">
              
            <form action>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                    <input type="username" class="form-control" id="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                 <label for="password" class="form-label">Password</label>
                 <input type="password" class="form-control" id="password">
                 </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                
                <div class="d-grid gap-2">
                <a href='/home' class="btn btn-primary">Submit</a>
                </div>
                </form>
            
            </form>
        </div>
    </div>
    </div>
  </body>
</html>
