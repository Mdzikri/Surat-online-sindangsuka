@extends('layouts.admin.bar')
@section('judul', 'Kelola Admin')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('layouts.alert')
        <div class="container card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">
                        RW Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }} <a href="" data-toggle="modal" data-target="#infoAdmin"><i class="fas fa-info-circle mt-3"></i></a>
                    </h4>
                    <a href="" data-toggle="modal" data-target="#tambahRw" class="btn btn-primary">Tambah</a>
                     <!-- Modal Tambah RW -->
                      <div class="modal fade" id="tambahRw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah RW</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p class="text-center">Tambah RT</p>
                              <small class="text-secondary">Tambah RT pada Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}.</small>
                              <form action="{{ route('rw.store') }}" method="post">
                                @csrf
                                <div class="row">
                                  <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                      <label for="no">RW</label>
                                      <input type="text" class="form-control" id="no" name="no"placeholder="contoh: 01">
                                      @error('no') <div class="text-danger mt-1" > <small>{{$message}}</small> <div>        
                                      @enderror
                                    </div>
                                  </div>
                                  <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                      <label for="ketua">NIK Ketua RW</label>
                                      <input type="text" class="form-control" id="ketua" name="ketua" placeholder="NIK Ketua RW">
                                      @error('ketua') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                                    </div>
                                  </div>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                <button class="btn btn-info" type="submit">Tambah</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <h5 class="card-category mt-2">Daftar Admin Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="text-primary">
                            <th><b>RW</b></th>
                            <th><b>Ketua</b></th>
                            <th class="text-right"><b>Opsi</b></th> 
                        </thead>
                        <tbody>
                        @foreach ($rw as $w)
                        <tr>
                            <td>{{ $w->no }}</td>
                            <td>{{ $w->ketua }}</td>
                            <td class="text-right" width="15%">
                                <a href="" data-toggle="modal" data-target="#editRw{{$w->id}}" class="badge badge-info">Edit</a>
                                <!-- Modal Edit RW -->
                                <div class="modal fade" id="editRw{{$w->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit RW</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p class="text-center">Anda yakin ingin mengedit RW <i>{{ $w->no }}</i> ?</p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                        <form action="{{ route('rw.update', $w->id) }}" method="post">
                                          @csrf
                                          @method('patch')
                                          <button class="btn btn-info" type="submit">Edit</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                {{-- <a href="" data-toggle="modal" data-target="#hapusRw{{$w->id}}" class="badge badge-danger">Hapus</a> --}}
                                <!-- Modal Hapus RW -->
                                <div class="modal fade" id="hapusRw{{$w->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus RW</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p class="text-center">Anda yakin ingin menghapus <i><b>RW.{{ $w->no }}</b></i> ?</p>
                                        <small class="text-secondary">*tindakan ini akan membuat RW.{{ $w->no }} tidak terdaftar lagi di Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</small>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                        <form action="{{ route('rw.delete', $w->id) }}" method="post">
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

        <div class="container card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">
                        RT Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}<a href="" data-toggle="modal" data-target="#infoAdmin"><i class="fas fa-info-circle mt-3"></i></a>
                    </h4>
                    <a href="" data-toggle="modal" data-target="#tambahRt" class="btn btn-primary" href="{{ route('admin.create') }}">Tambah</a>
                     <!-- Modal Tambah RT -->
                    <div class="modal fade" id="tambahRt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah RT</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <p class="text-center">Tambah RT</p>
                              <small class="text-secondary">Tambah RT pada Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}.</small>
                              <form action="{{ route('rt.store') }}" method="post">
                                @csrf
                                <div class="row">
                                  <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label for="rw_id" class="">Pilih RW</label>
                                        <div class="">
                                            <select name="rw_id" class="custom-select d-block w-100 select" id="rw_id">
                                              @foreach ($rw as $w)
                                                <option value="{{ $w->id }}">RW. {{ $w->no }}</option>
                                              @endforeach
                                            </select>
                                            @error('rw_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                      <label for="no">RT</label>
                                      <input type="text" class="form-control" id="no" name="no" placeholder="Contoh: 03">
                                      @error('no') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="ketua">NIK Ketua RT</label>
                                  <input type="text" class="form-control" id="ketua" name="ketua" placeholder="Contoh: 03">
                                  @error('ketua') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                <button class="btn btn-info" type="submit">Tambah</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <h5 class="card-category mt-2">Daftar RT Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="text-primary">
                            <th><b>RT</b></th>
                            <th><b>RW</b></th>
                            <th><b>Ketua</b></th>
                            <th class="text-right" width="15%"><b>Opsi</b></th> 
                        </thead>
                        <tbody>
                        @foreach ($rt as $t)
                        <tr>
                            <td>{{ $t->no }}</td>
                            <td>{{ $t->rw->no }}</td>
                            <td>{{ $t->ketua }}</td>
                            <td class="text-right">
                                <a href="" data-toggle="modal" data-target="#editRt{{$t->id}}" class="badge badge-info">Edit</a>
                                <!-- Modal Edit RT -->
                                <div class="modal fade" id="editRt{{$t->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit RT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p class="text-center">Anda yakin ingin menghapus izin <b>Admin</b> dari <i>{{ $t->no }}</i> ?</p>
                                        <small class="text-secondary">*tindakan ini akan membuat {{ $t->no }} tidak memiliki akses untuk mengelola Website Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }} lagi.</small>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                        <form action="{{ route('rt.update', $t->id) }}" method="post">
                                          @csrf
                                          @method('patch')
                                          <button class="btn btn-info" type="submit">Edit</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                {{-- <a href="" data-toggle="modal" data-target="#hapusRt{{$t->id}}" class="badge badge-danger">Hapus</a> --}}
                                <!-- Modal Hapus RT -->
                                <div class="modal fade" id="hapusRt{{$t->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus RT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <p class="text-center">Anda yakin ingin menghapus <i><b>RT.{{ $t->no }}/Rw.{{ $t->rw->no }}</b></i> ?</p>
                                        <small class="text-secondary">*tindakan ini akan membuat RT.{{ $t->no }} tidak terdaftar lagi di RW.{{ $t->rw->no }}</small>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                        <form action="{{ route('admin.delete', $t->id) }}" method="post">
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
    </div>
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