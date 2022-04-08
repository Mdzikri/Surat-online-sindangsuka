@extends('layouts.admin.bar')
@section('judul', 'Kelola Data Desa')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-7 pr-1">
            <div class="card">
              <div class="card-header">
                <h3 class="title">Edit No. RW</h3>
                <span>Edit Nomor RW jika terdapat kesalahan</span>
                <form action="{{ route('rw.update-no', $rw->id) }}" method="post">
                  @method('patch')
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="no">RW</label>
                        <input type="text" class="form-control" id="no" name="no" value="{{ $rw->no }}">
                        @error('no') <div class="text-danger mt-1" > <small>{{$message}}</small> <div>        
                        @enderror
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-primary" type="submit">Ubah</button>
                </form>
              </div>
              <hr>
              @if (!isset($rw->ketua)||$pilihan == 1)
                <div class="card-header">
                  <h3 class="title">Tambahkan Ketua RW</h3>
                  <span>Pilih user untuk dijadikan sebagai Ketua RW.{{ $rw->no }}</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class=" text-primary">
                                <th><b>Nama</b></th>
                                <th class="text-right"><b>Opsi</b></th>
                            </thead>
                            <tbody>
                            @foreach ($user as $u)
                            @if ($u->hasRole('admin'))
                            @else
                              <tr>
                                  <td>{{ $u->nama }}</td>
                                  <td class="text-right">
                                      <a href="" data-toggle="modal" data-target="#pilih{{$u->id}}" class="badge badge-primary">Pilih</a>
                                      {{-- Modal Pilih Ketua RW --}}
                                      <div class="modal fade" id="pilih{{$u->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Pilih Sebagai Ketua RW</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <p class="text-center">Anda yakin ingin memilih <b>{{ $u->nama }}</b> sebagai Ketua <i><b>RW.{{ $rw->no }}</b></i> ?</p>
                                              <small class="text-secondary">*tindakan ini akan membuat {{ $u->nama }} mempunyai akses sebagai Admin di Website Layanan Surat Desa{{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</small>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                              <form action="{{ route('rw.update-ketua', $rw->id) }}" method="post">
                                                @csrf
                                                @method('patch')
                                                {{-- <input type="hidden" name="ketua" value="{{ $u->nik }}"> --}}
                                                <input type="hidden" name="ketua" value="{{ $u->id }}">
                                                <button class="btn btn-primary" type="submit">Pilih</button>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </td>
                              </tr>
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
              @else
                <div class="card-header ml-3"><h3 class="title">Ketua RW.{{ $rw->no }}</h3></div>
                <div class="card-body row mb-3">
                  <div class="col-md-4">
                    <img src="{{ asset('images/fotokades/default.jpeg') }}" class="rounded-circle" height="100px" width="100px">
                  </div>
                  <div class="col-md-8 pt-3">
                    <h5 class="card-title">{{ $ketua->nama }}</h5>
                    <table border="0" align="center" width=100% style="padding-left: 30px;">
                        <tr>
                            <td class="text-secondary" width="15%">Alamat</td>
                            <td class="text-secondary" width="3%">:</td>
                            <td>{{ $ketua->alamat }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('rw.ganti', $rw->id) }}" class="btn btn-warning">Ganti Ketua</a>
                  </div>
                </div>
              @endif
            </div>
          </div>
          <div class="col-md-5 pr-1">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">
                        Daftar RT pada RW.{{ $rw->no }}<a href="" data-toggle="modal" data-target="#infoAdmin"><i class="fas fa-info-circle mt-3"></i></a>
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
                              <small class="text-secondary">Tambah RT pada RW.{{ $rw->no }}</small>
                              <form action="{{ route('rt.store', $rw->id) }}" method="post">
                                @csrf
                                  <div class="form-group">
                                    <label for="no">RT</label>
                                    <input type="text" class="form-control" id="no" name="no" placeholder="Contoh: 03">
                                    @error('no') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                                  </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                <button class="btn btn-primary" type="submit">Tambah</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <h5 class="card-category mt-2">Edit dan Kelola RT yang terdapat pada RW.{{ $rw->no }}</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead class="text-primary">
                            <th><b>RT</b></th>
                            <th class="text-right" width="30%"><b>Opsi</b></th> 
                        </thead>
                        <tbody>
                          @foreach ($rt as $t)
                          <tr>
                            @if ($t->no == "-")
                                
                            @else
                              <td>RT.{{ $t->no }}</td>
                              <td class="text-right">
                                  <a href="{{ route('rt.edit', $t->id) }}" class="badge badge-info">Edit</a>
                                  <a href="" data-toggle="modal" data-target="#hapusRt{{$t->id}}" class="badge badge-danger">Hapus</a>
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
                                          <form action="{{ route('rt.delete', $t->id) }}" method="post">
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
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
@endsection