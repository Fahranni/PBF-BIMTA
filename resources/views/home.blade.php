<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="vh-100">

    @include('sidebar') {{-- Panggil sidebar.blade.php --}}

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-auto">
                @if(Auth::check())
                    <b>Halo {{ Auth::user()->username }}, Anda Berhasil Login</b>
                @endif
            </div>
        </div>
    </div>

</body>
</html>
