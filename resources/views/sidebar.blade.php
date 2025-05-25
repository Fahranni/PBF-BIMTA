<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<nav class="sidebar">
<h1 class="visually-hidden">HOME</h1>
<a href="/" class="d-flex align-items-center text-decoration-none">
<img src="image/PNC.png" alt="Logo" width="50" height="50">
<span class="fs-4 fw-bold fst-italic ms-2">Bimbingan TA</span>
</a>


<div class="d-flex flex-column flex-shrink-0 p-3 vh-100 bg-body-tertiary" style="width: 280px;">


<ul class="nav nav-pills flex-column mb-auto h-full">
  <li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link link-body-emphasis">
    <img src="image/homee.png" alt="Icon" width="19" height="19" class="pe-none me-2">
      Home
    </a>
  </li>

  <li>
    <a href="{{ route('dosen.dosen') }}" class="nav-link link-body-emphasis">
    <img src="image/dosen.png" alt="Icon" width="19" height="19" class="pe-none me-2">
      Dosen Pembimbing
    </a>
  </li>

  <li>
    <a href="{{route('mahasiswa.mahasiswa')}}" class="nav-link link-body-emphasis">
    <img src="image/student.png" alt="Icon" width="19" height="19" class="pe-none me-2">
      Mahasiswa
    </a>
  </li>
 

  <li>
    <a href="{{route('tugas_akhir.tugas_akhir')}}" class="nav-link link-body-emphasis">
    <img src="image/book.png" alt="Icon" width="19" height="19" class="pe-none me-2">
      Tugas Akhir
    </a>
  </li>
  <li>
    <a href="{{route('bimbingan.bimbingan')}}" class="nav-link link-body-emphasis">
    <img src="image/kalender.png" alt="Icon" width="19" height="19" class="pe-none me-2">
      Jadwal Bimbingan
    </a>
  </li>

  <li>
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn nav-link link-body-emphasis w-100 text-start">
      <img src="image/logout.png" alt="Logout" width="19" height="19" class="pe-none me-2">
      Logout
    </button>
  </form>
</li>

</ul>
</nav>
</div>
<div class="b-example-divider b-example-vr"></div>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="sidebars.js"></script> 
</body>
</html>
