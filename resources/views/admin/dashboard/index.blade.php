@extends('layouts.admin.bar')
@section('judul', 'Dashboard Admin')
@section('content')
    <div class="row ml-1">
        <div class="card border-light col-lg-6 col-md-6">
          <div class="card-header"><i><b>Pejabat Pengesah Surat Aktif</b></i></div>
          <div class="card-body row mb-3">
            <div class="col-md-4">
              <img src="{{ asset('images/fotokades/'.$kades->fotokades) }}" class="rounded-circle" height="100px" width="100px">
            </div>
            <div class="col-md-8 pt-3">
              <h5 class="card-title">{{ $kades->nama }}</h5>
              <table border="0" align="center" width=100% style="padding-left: 30px;">
                  <tr>
                      <td class="text-secondary">Jabatan</td>
                      <td class="text-secondary">:</td>
                      <td>{{ $kades->jabatan }}</td>
                  </tr>
                  <tr>
                      <td class="text-secondary">Periode</td>
                      <td class="text-secondary">:</td>
                      <td>{{ $kades->periode }}</td>
                  </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-3 pr-1">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Antrian Pengajuan</h5>
                    <h4>Belum Disetujui :</h4>
                    <a href="{{ route('antrian.index') }}"><h2 class="text-secondary"><span class="badge badge-pill badge-danger">{{ $antrian->count() }}</span> Surat</h2></a>
                    <div class="dropdown">
                    <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('antrian.index') }}">Lihat daftar</a>
                    </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-refresh"></i> Diperbaharui
                        </div>
                    </div>
                </div>
                {{-- <div class="card-body">
                </div> --}}
            </div>
        </div>

        <div class="col-lg-3 pl-1">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">User</h5>
                    <h4 class="card-title">User Terdaftar :</h4>
                    <a href="{{ route('antrian.index') }}"><h2 class="text-secondary mt-1"><span class="badge badge-pill badge-info">{{ $user }}</span> User</h2></a>
                    <div class="dropdown">
                        <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('user.index') }}">Lihat daftar</a>
                            <a class="dropdown-item" href="{{ route('user.index') }}">Kelola User</a>
                            {{-- <a class="dropdown-item text-danger" href="#">Remove Data</a> --}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="fa fa-refresh" aria-hidden="true"></i> Diperbaharui
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="container card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-category mt-2">Menunggu Persetujuan:</h5>
                            <h3 class="card-title">Antrian Surat</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class=" text-primary">
                                <th><b>Pengaju</b></th>
                                <th><b>Surat</b></th>
                                <th><b>Tanggal Ajuan</b></th>
                                @role('superadmin')
                                <th class="text-right"><b>Opsi</b></th>
                                @endrole
                            </thead>
                            <tbody>
                            @foreach ($antrian as $surat)
                            <tr>
                                <td>{{ $surat->user->nama }}</td>
                                <td>{{ $surat->jenis }}</td>
                                <td>{{ $surat->created_at->diffForHumans() }}</td>
                                @role('superadmin')
                                <td class="text-right">
                                    <a href="{{ route('antrian.edit', $surat->id) }}" class="badge badge-warning">Buka</a>
                                </td>
                                @endrole
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container">
                    {{$antrian->links()}} 
                </div>
            </div>
        </div>
    </div>
@endsection