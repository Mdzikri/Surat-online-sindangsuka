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
    <link rel="stylesheet" href="{{ asset('css/surat-saya.css') }}">
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
        <img src="{{ asset('images/logo.png') }}" alt="logo kabupaten garut">
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
    
    <div class="nav-scroller bg-oren3 shadow-sm">
      <nav class="nav nav-underline">
        <a class="nav-link" href="{{ route('suratsaya') }}">Semua</a>
        <a class="nav-link active" href="{{ route('menunggu') }}">Menunggu Persetujuan</a>
        <a class="nav-link" href="{{ route('diterima') }}">Diterima</a>
        <a class="nav-link" href="{{ route('ditolak') }}">Ditolak</a>
      </nav>
    </div>
    @include('layouts.alert')

    
    @if (count($adabelum) != 0)
    <main role="main" class="container">
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Menunggu Persetujuan</h6>
          @foreach ($adabelum as $ajuan)
          <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#ffcc00"/><text x="50%" y="50%" fill="#ffcc00" dy=".3em">32x32</text></svg>
            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
              <div class="d-flex justify-content-between align-items-center w-100">
                <strong class="text-gray-dark">{{ $ajuan->jenis }}</strong>
                  <a class="badge badge-warning">Belum Disetujui</a>
              </div>
              <span class="d-block"> diajukan {{ $ajuan->created_at->format('d M Y') }} <b>&middot;</b> <a href="" data-toggle="modal" data-target="#batalkanAjuan{{$ajuan->id}}" class="text-danger">Batalkan</a> | <a href="" class="text-warning">Hubungi</a> | <a href="" data-toggle="modal" data-target="#detailAjuan{{$ajuan->id}}" class="text-info">Lihat Detail</a> </span> 
            </div>
          </div>
          <!-- Modal Batalkan Pengajuan -->
              <div class="modal fade" id="batalkanAjuan{{$ajuan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Batalkan Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda yakin ingin membatalkan pengajuan <b>{{ $ajuan->jenis }}</b> Anda yang diajukan pada tanggal <i>{{ $ajuan->created_at->format('d M Y') }}</i> ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                      <form action="{{ route('ajuan.batalkan', $ajuan->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Ya</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal Lihat Pengajuan -->
              <div class="modal fade" id="detailAjuan{{$ajuan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Detail Pengajuan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <h5 class="card-title text-center">Pengajuan {{ $ajuan->jenis }}</h5>
                      <table border="0" align="center" width=100% style="padding-left: 30px;" class="mb-3">
                          <tr>
                              <td class="text-secondary" width=30%>Pengaju</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->nama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">NIK</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->nik }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Ttl</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->ttl }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Agama</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->agama }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Jenis Kelamin</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->jk }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Status</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->status }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pekerjaan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->pekerjaan }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Rt/Rw</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->rt_rw }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Alamat</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->user->alamat }}</td>
                          </tr>
                          <tr>
                              <td class="text-secondary">Pesan Keterangan</td>
                              <td class="text-secondary">:</td>
                              <td>{{ $ajuan->keterangan }}</td>
                          </tr>
                      </table>
                      <small class="text-secondary text-center"><i>*jika terdapat kesalahan data, segera batalkan pengajuan dan edit Profil anda dengan data yang benar, lalu ajukan kembali surat!</i></small>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                  </div>
                </div>
              </div>
          @endforeach
        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>
    </main>
    @endif

    

    @if (count($adabelum) == 0)
    <main role="main" class="container">
      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Menunggu Persetujuan</h6>
        <div class="container bg-oren3 py-4">
          <img class="mx-auto d-block" src="{{ asset('images/surat.png') }}" alt="" width="48%">
          <h4 class="toren text-center mb-2"><b>Anda belum mengajukan surat apapun</b></h4>
          <button data-toggle="modal" data-target="#ajukanModal" class="btn tombol-kotak-biru mx-auto d-block mt-3">Ajukan Surat &raquo;</button>
        </div>
        <small class="d-block text-right mt-3">
          <a href="#">All updates</a>
        </small>
      </div>
    </main>
    @endif


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


<!-- Modal -->
<div class="modal fade" id="ajukanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajukan Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-center">Pilih Surat yang Anda Butuhkan</h5>
        <div class="row d-flex justify-content-center">
          <a href="{{ route('skck.create') }}" class="btn tombol-kotak mx-1 my-1">SKCK</a>
          <a href="{{ route('sktm.create') }}" class="btn tombol-kotak mx-1 my-1">SKTM</a>
          <a href="{{ route('sd.create') }}" class="btn tombol-kotak mx-1 my-1">Surat Domisili</a>
          <a href="{{ route('sku.create') }}" class="btn tombol-kotak mx-1 my-1">Surat Keterangan Usaha</a>
          <a href="{{ route('sk.create') }}" class="btn tombol-kotak mx-1 my-1">Surat Kematian</a>
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>