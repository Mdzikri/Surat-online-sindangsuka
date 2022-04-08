@extends('layouts.admin.bar')
@section('judul', 'Kelola Data Desa')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-7 pr-1">
            <div class="card">
              @if ($pilihan == 1||$pilihan == 2||!isset($rt->ketua))
                <div class="card-header">
                  <h3 class="title">Tambahkan Ketua RT</h3>
                  <span>Pilih user untuk dijadikan sebagai Ketua RT.{{ $rt->no }}</span>
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
                              <tr>
                                  <td>{{ $u->nama }}</td>
                                  <td class="text-right">
                                      <a href="" data-toggle="modal" data-target="#pilih{{$u->id}}" class="badge badge-primary">Pilih</a>
                                      {{-- Modal Pilih Ketua RT --}}
                                      <div class="modal fade" id="pilih{{$u->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Pilih Sebagai Ketua RT</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <p class="text-center">Anda yakin ingin memilih <b>{{ $u->nama }}</b> sebagai Ketua <i><b>RT.{{ $rt->no }}</b></i> ?</p>
                                              <small class="text-secondary">*tindakan ini akan membuat {{ $u->nama }} mempunyai akses sebagai Admin di Website Layanan Surat Desa{{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</small>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                              <form action="{{ route('rt.update-ketua', $rt->id) }}" method="post">
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
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
              @else
                <div class="card-header ml-3"><h3 class="title">Ketua RT.{{ $rt->no }}</h3></div>
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
                    <a href="{{ route('rt.ganti', $rt->id) }}" class="btn btn-warning">Ganti Ketua</a>
                  </div>
                </div>
              @endif
            </div>
          </div>
          <div class="col-md-5 pr-1">
            <div class="card">
              <div class="card-body">
                <div class="card-header">
                  <h3 class="title">Edit No. RT</h3>
                  <span>Edit Nomor RT jika terdapat kesalahan</span>
                  <form action="{{ route('rt.update-no', $rt->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="no">RT</label>
                          <input type="text" class="form-control" id="no" name="no" value="{{ $rt->no }}">
                          @error('no') <div class="text-danger mt-1" > <small>{{$message}}</small> <div>        
                          @enderror
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Ubah</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection