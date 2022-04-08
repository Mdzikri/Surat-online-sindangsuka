<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link href="{{ isset($desa) ? asset('images/' . $desa->logo_desa . '') : asset('images/logo.png') }}" rel="icon" type="image/png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard Admin - {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}         
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Fonts and icons -->
  <link href="{{ asset('css/adm/icon/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('css/adm/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/adm/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
  <link href="{{ asset('css/adm/demo.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/tambahan.css') }}">

  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />
</head>
<!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" -->
<body class="">
  <div class="wrapper ">
    <div class="sidebar bg-oren" data-color="orange">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          <img src="{{ isset($desa) ? asset('images/' . $desa->logo_desa . '') : asset('images/logo.png') }}" alt="Logo Desa" width="35" class="mr-2">
          {{ Auth::user()->nama }}
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ request()->is('dashboard-adm') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
              <i class="fa fa-desktop" aria-hidden="true"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          @role('superadmin')
          <li class="{{ request()->is('antrian') ? 'active' : '' }}">
            <a href="{{ route('antrian.index') }}">
              <i class="fa fa-envelope"></i>
              <p>Surat Belum di Acc</p>
            </a>
          </li>


          <li class="{{ request()->is('surat') ? 'active' : '' }}">
            <a href="{{ route('surat.index') }}">
              <i class="fa fa-file"></i>
              <p>Pesan Penolakkan</p>
            </a>
          </li>
          <li class="{{ request()->is('kades') ? 'active' : '' }}">
            <a href="{{ route('kades.index') }}">
              <i class="fas fa-user-tie"></i>
              <p>Kelola Kades</p>
            </a>
          </li>
          <li class="{{ request()->is('admin') ? 'active' : '' }}">
            <a href="{{ route('admin.index') }}">
              <i class="fas fa-users-cog"></i>
              <p>Kelola Admin</p>
            </a>
          </li>
          <li class="{{ request()->is('desa') ? 'active' : '' }}">
            <a href="{{ route('desa.index') }}">
              <i class="fas fa-hotel"></i>
              <p>Atur Nama Desa</p>
            </a>
          </li>
          <li class="{{ request()->is('rt-rw') ? 'active' : '' }}">
            <a href="{{ route('rt-rw.index') }}">
              <i class="fas fa-user-check"></i>
              <p>Kelola RT dan RW</p>
            </a>
          </li>
          @endrole
          <li class="{{ request()->is('user') ? 'active' : '' }}">
            <a href="{{ route('user.index') }}">
              <i class="fa fa-id-card"></i>
              <p>Data Penduduk</p>
            </a>
          </li>
          <li class="{{ request()->is('riwayat-pengajuan') ? 'active' : '' }}">
            <a href="{{ route('riwayat.index') }}">
              <i class="fa fa-history" aria-hidden="true"></i>
              <p>Riwayat Pengajuan</p>
            </a>
          </li>
          <li class="{{ request()->is('arsip') ? 'active' : '' }}">
            <a href="{{ route('arsip.index') }}">
              <i class="fa fa-archive"></i>
              <p>Arsip Surat</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent bg-dark navbar-absolute shadow py-3">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">@yield('judul')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-cog"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Pengaturan</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="">Ubah Password</a>
                  <a class="dropdown-item" href="{{ route('edit.profil') }}">Edit Profil</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user"></i>
                  <p>
                    <span class="d-lg-none d-md-block">User Settings</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('home') }}">Halaman User</a>
                  <a class="dropdown-item" href="{{ route('edit.profil') }}">Lihat Profil</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                    Log Out
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="container px-4 pt-5 mt-5">
        <div class="content">
          @include('layouts.alert')
          @yield('content')
        </div>
      </div>
      
      <footer class="footer">
        <div class=" container-fluid ">
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, PKM UIN-Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. & <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('js/adm/core/jquery.min.js') }}"></script>
  <script src="{{ asset('js/adm/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/adm/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/adm/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('js/adm/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('js/adm/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/adm/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <!-- Datatables -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
  <script>
      $(document).ready(function () {
          $('#example').DataTable();
      });
  </script>
</body>

</html>


<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->