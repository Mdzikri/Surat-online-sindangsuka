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
    <link href="{{ isset($desa) ? asset('images/' . $desa->logo_desa . '') : asset('images/logo.png') }}" rel="icon" type="image/png">

    <title>Suket Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</title>
  </head>
  <body>
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light costum-nav px-4 py-3 shadow"> --}}
    <nav class="navbar navbar-expand-lg costum-nav navbar-dark bg-oren px-4 py-3 shadow lengkung">
      <a class="navbar-brand" href="#">
        <img src="{{ isset($desa) ? asset('images/' . $desa->logo_desa . '') : asset('images/logo.png') }}" alt="logo desa">
        <span>{{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('skck.create') }}">SKCK</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sktm.create') }}">SKTM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sk.create') }}">Surat Kematian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sku.create') }}">Surat Keterangan Usaha</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('sd.create') }}">Surat Domisili</a>
          </li>
          @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link tombol-2 shadow" href="{{ route('register') }}">Daftar</a>
          </li>
          @else
          @endif
        </ul>
      </div>
    </nav>
    <img class="bg" src="{{ asset('images/bg.jpg') }}" alt="">
    <div class="container justify-content-center">
      {{-- <a class="sourcefreepik" href='https://www.freepik.com/vectors/woman'><small>pch.vector - www.freepik.com</small></a> --}}
    </div>

    @include('layouts.alert')

    <div class="container">
      <div class="row section-utama">
        <div class="col-12 col-lg-12 pb-4">
          <h4>Layanan</h4>
          <h2>Persuratan</h2>
          <h5>Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</h5>
          <p>Layanan Persuratan Online Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }} Kecamatan {{ isset($desa) ? $desa->nama_desa : '*atur alamat desa' }} Kabupaten {{ isset($desa) ? $desa->nama_desa : '*atur alamat desa' }}. Klik tombol masuk untuk membuat surat</p>

          @if (Route::has('login'))
            @auth
              <a href="{{ url('/home') }}" class="btn-lg shadow">Mulai</a>
            @else
              <a href="{{ route('login') }}" class="btn-lg shadow">Masuk</a>
            @endauth
          @endif
          
              {{-- <a href="#">Masuk</a> --}}
            </div>
          </div>
        </div>
        

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>