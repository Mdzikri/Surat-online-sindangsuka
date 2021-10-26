<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="{{asset('images/favicon.png')}}" rel="icon" type="image/png">

    <title>Suket Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</title>
  </head>
  <body>
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light costum-nav px-4 py-3 shadow"> --}}
    <nav class="navbar navbar-expand-lg costum-nav navbar-dark bg-oren px-4 py-3 shadow">
      <a class="navbar-brand" href="#">
        <img src="{{ isset($desa) ? asset('images/' . $desa->logo_desa . '') : asset('images/logo.png') }}" alt="logo desa">
        <span>Suket Online</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('login') }}">Masuk <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link tombol-2 shadow" href="{{ route('register') }}">Daftar</a>
          </li>
        </ul>
      </div>
    </nav>
    

    <main class="py-4">
        @yield('content')
    </main>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>