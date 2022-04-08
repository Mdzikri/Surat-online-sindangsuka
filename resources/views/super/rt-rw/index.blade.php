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
                              <small class="text-secondary">Tambah RT pada Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}.</small>
                              <form action="{{ route('rw.store') }}" method="post">
                                @csrf
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="no">RW</label>
                                      <input type="text" class="form-control" id="no" name="no"placeholder="contoh: 01">
                                      @error('no') <div class="text-danger mt-1" > <small>{{$message}}</small> <div>        
                                      @enderror
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
                            <th class="text-right"><b>Opsi</b></th> 
                        </thead>
                        <tbody>
                        @foreach ($rw as $w)
                          <tr>
                              <td>RW.{{ $w->no }}</td>
                              <td class="text-right" width="15%">
                                  <a href="{{ route('rw.edit', $w->id) }}" class="badge badge-info">Edit</a>
                                  {{-- <a href="" data-toggle="modal" data-target="#hapusRw{{$w->id}}" class="badge badge-danger">Hapus</a> --}}
                                  <!-- Modal Hapus RT -->
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
                                  
                                  {{-- <a href="" data-toggle="modal" data-target="#editRw{{$w->id}}" class="badge badge-info">Edit</a> --}}
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
                                          <p class="text-center">Tambahkan Ketua RW.<i>{{ $w->no }}</i> untuk menambahkan hak akses RW pada akun Ketua RT</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                          <form action="{{ route('rw.update-ketua', $w->id) }}" method="post">
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