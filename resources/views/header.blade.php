<header class="py-3 bg-light border-bottom position-fixed w-100" style="top: 0; left: 0; z-index: 1030;">
  <div class="container d-flex justify-content-between align-items-center">
    <a href="/" class="d-flex align-items-center text-decoration-none">
      <img src="{{ asset('image/PNC.png') }}" alt="Logo" width="50" height="50" />
      <span class="fs-4 ms-2 fw-bold fst-italic">Bimbingan TA</span>
    </a>
    <ul class="nav nav-pills mb-0">
      <li class="nav-item">
        <a href="/home" class="nav-link active">Home</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</header>
