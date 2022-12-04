<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HRD Log</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ URL::asset('style.css') }}">
</head>
<body>
  <header class="position-fixed w-100 d-flex gap-3 align-items-center text-light h-3 p-3">
    <button id="menu-toggle" class="d-grid place-items-center fs-3 bg-transparent text-light border-0">
      <iconify-icon icon="material-symbols:menu"></iconify-icon>
    </button>
    <a href="/">HRD Log</a>
    <div class="user ms-auto d-flex align-items-center gap-2 px-2 py-1 rounded" style="background-color: rgb(51 65 85)">
      <iconify-icon icon="mdi:user"></iconify-icon>
      {{ Auth::user()->username }}
    </div>
    <a href="{{ route('actionLogout') }}">
      <button class="px-2 py-1 rounded text-light border-0" style="background-color: rgb(51 65 85)">Logout</button>
    </a>
  </header>
  <aside id="left-nav-menu" class="left-nav-menu show position-fixed top-0 pt-5 h-100">
    <ul class="list-group">
      <li class="list-group-item rounded-0 text-light p-3 border-0">
        <a href="/" class="d-flex align-items-center gap-3">
          <iconify-icon icon="ph:squares-four"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li class="list-group-item rounded-0 text-light p-3 border-0">
        <a href="/departemen" class="d-flex align-items-center gap-3">
          <iconify-icon icon="ph:buildings"></iconify-icon>
          Departemen
        </a>
      </li>
      <li class="list-group-item rounded-0 text-light p-3 border-0">
        <a href="/pekerjaan" class="d-flex align-items-center gap-3">
          <iconify-icon icon="material-symbols:work-outline"></iconify-icon>
          Pekerjaan
        </a>
      </li>
      <li class="list-group-item rounded-0 text-light p-3 border-0">
        <a href="/karyawan" class="d-flex align-items-center gap-3">
          <iconify-icon icon="mdi:user-group-outline"></iconify-icon>
          Karyawan
        </a>
      </li>
      <li class="list-group-item rounded-0 text-light p-3 border-0">
        <a href="/pelamar" class="d-flex align-items-center gap-3">
          <iconify-icon icon="mdi:user-multiple-plus-outline"></iconify-icon>
          Pelamar
        </a>
      </li>
    </ul>
  </aside>
  <main id="main-content" class="container-fluid pb-3 shrink">
    @yield('content')
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
  <script src="{{ URL::asset('script.js') }}"></script>
</body>
</html>