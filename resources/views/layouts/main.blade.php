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

    <title>Suket Desa</title>
  </head>
  <body>
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light costum-nav px-4 py-3 shadow"> --}}
    <nav class="navbar navbar-expand-lg costum-nav navbar-dark bg-oren px-4 py-3 shadow">
      <a class="navbar-brand" href="#">
        <img src="{{ isset($desa) ? asset('images/' . $desa->logo_desa . '') : asset('images/logo.png') }}" alt="logo kabupaten garut">
        <span>Suket Online</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle {{ request()->is('sku', 'sk', 'sktm', 'skck', 'sd') ? 'text-dark' : '' }}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  Ajukan Surat
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('skck.create') }}">
                      SKCK
                  </a>
                  <a class="dropdown-item" href="{{ route('sktm.create') }}">
                      SKTM
                  </a>
                  <a class="dropdown-item" href="{{ route('sd.create') }}">
                      Surat Domisili
                  </a>
                  <a class="dropdown-item" href="{{ route('sk.create') }}">
                      Surat Kematian
                  </a>
                  <a class="dropdown-item" href="{{ route('sku.create') }}">
                      Surat Keterangan Usaha
                  </a>
                  <a class="dropdown-item" href="{{ route('sktb.create') }}">
                      SKTB
                  </a>
                  <a class="dropdown-item" href="{{ route('belumMenikah.create') }}">
                      Surat Keterangan Belum Menikah
                  </a>
                  <a class="dropdown-item" href="{{ route('sku.create') }}">
                      Surat Keterangan Beda Nama
                  </a>
                  <a class="dropdown-item" href="{{ route('mohonKtp.create') }}">
                      Formulir Permohonan KTP
                  </a>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('surat-saya') ? 'text-dark' : '' }}" href="{{ route('suratsaya') }}">Surat Saya</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('lengkapi-profil') ? 'text-dark' : '' }}" href="{{ route('lengkapi.profil') }}">Lengkapi Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->is('edit-profil') ? 'text-dark' : '' }}" href="{{ route('edit.profil') }}">Edit Profil</a>
          </li>
          @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
          @else
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="tombol-3 nav-link dropdown-toggle shadow" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->nama }}
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          Keluar
                      </a>
                      <a class="dropdown-item" href="{{ route('edit.profil') }}">
                          Pengaturan Akun
                      </a>
                      @role('admin|superadmin')
                      <a class="dropdown-item" href="{{ route('antrian.index') }}">
                          Dashboard Admin
                      </a>
                      @endrole
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </div>
              </li>
          @endguest
        </ul>
      </div>
    </nav>
    @include('layouts.alert')
    
    <div class="">
    @yield('content')
    </div>

    <footer class="my-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2020 - PKM UIN Bandung</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>