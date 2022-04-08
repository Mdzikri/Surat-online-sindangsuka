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
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="{{asset('images/favicon.png')}}" rel="icon" type="image/png">

    <title>Suket Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>
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
                      <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
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
    <main role="main">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          
          <div class="carousel-item active bg-oren">
            <div class="container">
              @include('layouts.alert')
              <div class="carousel-caption text-left">
                <h1>SKCK.</h1>
                <p>Layanan pengajuan Surat Pengantar SKCK dari Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}. gunakan layanan ini jika anda membutuhkan surat pengantar untuk keperluan di Polres.</p>
                <p><a class="btn btn-lg tombol-3 shadow" href="{{ route('skck.create') }}" role="button">Ajukan Surat</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item bg-oren2">
            <div class="container">
              @include('layouts.alert')
              <div class="carousel-caption text-right">
                <h1 class="black">SKTM.</h1>
                <p class="black" width="60%">Layanan pengajuan online Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }} untuk Surat Keterangan Tidak Mampu khusus penduduk Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}.</p>
                <p><a class="btn btn-lg tombol-2 shadow" href="{{ route('sktm.create') }}" role="button">Ajukan Surat</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item bg-oren3">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1 class="black">Surat Domisili.</h1>
                <p class="black">Layanan pengajuan online Surat Domisili khusus untuk penduduk Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}.</p>
                <p><a class="btn btn-lg tombol-2 shadow" href="{{ route('sd.create') }}" role="button">Ajukan Surat</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item bg-oren">
            <div class="container">
              <div class="carousel-caption">
                <h1>Surat Keterangan Usaha.</h1>
                <p>Layanan pengajuan online Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }} untuk Surat Keterangan Usaha, khusus untuk penduduk Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}.</p>
                <p><a class="btn btn-lg tombol-3 shadow" href="{{ route('sku.create') }}" role="button">Ajukan Surat</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item bg-oren2">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1 class="black">Surat Kematian.</h1>
                <p class="black">Layanan pengajuan surat online Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }} untuk Surat Laporan Kematian, khusus untuk penduduk Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}.</p>
                <p><a class="btn btn-lg tombol-2 shadow" href="{{ route('sk.create') }}" role="button">Ajukan Surat</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <div class="col mb-4">
              <div class="card">
                <img src="{{ asset('images/skck.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><b>Surat Pengantar SKCK </b></h5>
                  <p class="card-text">Ajukan Surat Pengantar SKCK Anda disini!</p>
                  <p><a class="btn tombol-kotak" href="{{ route('skck.create') }}" role="button">Ajukan Surat &raquo;</a></p>
                </div>
              </div>
            </div>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <div class="col mb-4">
              <div class="card">
                <img src="{{ asset('images/sktm.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><b>SKTM </b></h5>
                  <p class="card-text">Ajukan SKTM Anda disini!</p>
                  <p><a class="btn tombol-kotak" href="{{ route('sktm.create') }}" role="button">Ajukan Surat &raquo;</a></p>
                </div>
              </div>
            </div>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <div class="col mb-4">
              <div class="card">
                <img src="{{ asset('images/sd.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><b>Surat Domisili</b></h5>
                  <p class="card-text">Ajukan Surat Domisili Anda disini!</p>
                  <p><a class="btn tombol-kotak" href="{{ route('sd.create') }}" role="button">Ajukan Surat &raquo;</a></p>
                </div>
              </div>
            </div>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        <div class="row d-flex justify-content-center">
          <div class="col-lg-4">
            <div class="col mb-4">
              <div class="card">
                <img src="{{ asset('images/sku.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><b>Surat Keterangan Usaha</b></h5>
                  <p class="card-text">Ajukan Surat Keterangan Usaha Anda disini!</p>
                  <p><a class="btn tombol-kotak" href="{{ route('sku.create') }}" role="button">Ajukan Surat &raquo;</a></p>
                </div>
              </div>
            </div>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <div class="col mb-4">
              <div class="card">
                <img src="{{ asset('images/sk.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><b>Surat Kematian</b></h5>
                  <p class="card-text">Ajukan Surat Laporan Kematian disini!</p>
                  <p><a class="btn tombol-kotak" href="{{ route('sk.create') }}" role="button">Ajukan Surat &raquo;</a></p>
                </div>
              </div>
            </div>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
      
    </main>

    <footer class="my-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2020 - PKM UIN - Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</p>
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