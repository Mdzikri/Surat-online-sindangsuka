@extends('layouts.admin.bar')
@section('judul', 'Kelola Admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="container card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">
                        Super Admin <a href="" data-toggle="modal" data-target="#infoAdmin"><i class="fas fa-info-circle mt-3"></i></a>
                    </h4>
                    <a type="button" class="btn btn-primary" href="{{ route('super-admin.create') }}">Tambah</a>
                </div>
                <h5 class="card-category mt-2">Daftar Super Admin Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="text-primary">
                            <th><b>Nama Super Admin</b></th>
                            <th class="text-center"><b>Rt/Rw</b></th>
                            <th class="text-center" width="15%"><b>Opsi</b></th> 
                        </thead>
                        <tbody>
                        @foreach ($superadmin as $adm)
                        <tr>
                            <td>{{ $adm->nama }}</td>
                            <td class="text-center">{{ $adm->rt->no }}/{{ $adm->rw->no }}</td>
                            <td class="text-center">
                                <a href="{{ route('user.show', $adm->id) }}" class="badge badge-info">Lihat</a>
                                <a href="" data-toggle="modal" data-target="#hapusSuperAdmin{{$adm->id}}" class="badge badge-danger">Hapus</a>
                                <!-- Modal Hapus Admin -->
                                <div class="modal fade" id="hapusSuperAdmin{{$adm->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Izin Super Admin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p class="text-center">Anda yakin ingin menghapus izin <b>Super Admin</b> dari <i>{{ $adm->nama }}</i> ?</p>
                                        <small class="text-secondary">*tindakan ini akan membuat {{ $adm->nama }} tidak memiliki akses untuk menyetujui surat ajuan penduduk Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }} lagi.</small>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                        <form action="{{ route('super-admin.toAdmin', $adm->id) }}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button class="btn btn-danger" type="submit">Turunkan sebagai Admin</button>
                                        </form>
                                        <form action="{{ route('super-admin.toUser', $adm->id) }}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button class="btn btn-danger" type="submit">Turunkan sebagai User</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="container">
                {{$admin->links()}} 
            </div> --}}
        </div>
        <div class="container card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">
                        Admin <a href="" data-toggle="modal" data-target="#infoAdmin"><i class="fas fa-info-circle mt-3"></i></a>
                    </h4>
                    <a type="button" class="btn btn-primary" href="{{ route('admin.create') }}">Tambah</a>
                </div>
                <h5 class="card-category mt-2">Daftar Admin Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="text-primary">
                            <th><b>Nama Admin</b></th>
                            <th class="text-center"><b>Rt/Rw</b></th>
                            <th class="text-center" width="15%"><b>Opsi</b></th> 
                        </thead>
                        <tbody>
                        @foreach ($admin as $adm)
                        <tr>
                            <td>{{ $adm->nama }}</td>
                            <td class="text-center">{{ $adm->rt->no }}/{{ $adm->rw->no }}</td>
                            <td class="text-center">
                                <a href="{{ route('user.show', $adm->id) }}" class="badge badge-info">Lihat</a>
                                <a href="" data-toggle="modal" data-target="#hapusAdmin{{$adm->id}}" class="badge badge-danger">Hapus</a>
                                <!-- Modal Hapus Admin -->
                                <div class="modal fade" id="hapusAdmin{{$adm->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Admin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p class="text-center">Anda yakin ingin menghapus izin <b>Admin</b> dari <i>{{ $adm->nama }}</i> ?</p>
                                        <small class="text-secondary">*tindakan ini akan membuat {{ $adm->nama }} tidak memiliki akses untuk mengelola Website Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }} lagi.</small>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                        <form action="{{ route('admin.delete', $adm->id) }}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- <div class="container">
                {{$admin->links()}} 
            </div> --}}
        </div>
    </div>
    {{-- <div class="col-md-5 pl-1">
        <div class="container card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">
                        Super Admin 
                        <a href="" data-toggle="modal" data-target="#infoSuperAdmin"><i class="fas fa-info-circle mt-3"></i></a>
                    </h4>
                    <a type="button" class="btn btn-primary" href="{{ route('admin.create') }}">Tambah</a>
                </div>
                <h5 class="card-category mt-2">Daftar Super Admin Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="text-primary">
                            <th><b>Nama</b></th>
                            <th><b>Rt/Rw</b></th>
                            <th class="text-right"><b>Opsi</b></th> 
                        </thead>
                        <tbody>
                        @foreach ($superadmin as $super)
                        <tr>
                            <td>{{ $super->nama }}</td>
                            <td>{{ $super->rt_rw }}</td>
                            <td class="text-right">
                                <a href="{{ route('user.show', $super->id) }}" class="badge badge-info">Lihat</a>
                                <a href="" data-toggle="modal" data-target="#hapusSuperAdmin{{$super->id}}" class="badge badge-danger">Hapus</a>
                                <!-- Modal Hapus Super Admin -->
                                <div class="modal fade" id="hapusSuperAdmin{{$super->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Super Admin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p class="text-center text-danger">Anda yakin ingin menghapus izin <b>Super Admin</b> dari <i>{{ $super->nama }}</i> ?</p>
                                        <small class="text-secondary">*tindakan ini akan membuat {{ $super->nama }} tidak memiliki akses untuk mengelola menu Admin, Kepala Desa, dan beberapa menu lainnya lagi.</small>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                        <form action="{{ route('admin.delete', $super->id) }}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<!-- Modal Info Admin -->
<div class="modal fade" id="infoAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Role Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Level user yang mempunyai kewenangan sebagai berikut:
        <ul>
          <li>menyetujui dan menolak surat pengajuan,</li>
          <li>mengelola pengguna,</li>
          <li>mengelola pesan dan keterangan surat,</li>
          <li>mengelola riwayat pengajuan,</li>
          <li>dan mengelola arsip surat.</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Info Super Admin -->
<div class="modal fade" id="infoSuperAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Role Super Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection