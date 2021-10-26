@extends('layouts.admin.bar')
@section('judul', 'Kelola Kades')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-7 pr-1">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Data Kepala Desa</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('kades.update', $kades->id) }}" method="post">
                  @method('patch')
                  @csrf
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') ?? $kades->nama }}">
                        @error('nama') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ old('nik') ?? $kades->nik }}">
                        @error('nik') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') ?? $kades->jabatan }}">
                        @error('jabatan') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="col-md-4 pr-1 pl-1">
                      <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" value="{{ old('agama') ?? $kades->agama }}">
                        @error('agama') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control pb-2" id="exampleFormControlSelect1" name="jk" value="{{ $kades->jk }}">
                          <option value="{{ $kades->jk }}">{{ $kades->jk }}</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jabatan') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Periode</label>
                        <input type="text" name="periode" class="form-control" value="{{ old('periode') ?? $kades->periode }}">
                        @error('periode') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="col-md-8 pl-1">
                      <div class="form-group">
                        <label>Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl" class="form-control" value="{{ old('ttl') ?? $kades->ttl }}">
                        @error('ttl') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') ?? $kades->alamat }}">
                        @error('alamat') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary my-3">Simpan</button>
                </form>
              </div>
            </div>
            <div class="card pt-1">
              <div class="card-header pt-2">
                <h5 class="title">Lengkapi Foto Kepala Desa</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('kades.foto', $kades->id) }}" method="post" enctype="multipart/form-data">
                  @method('patch')
                  @csrf
                  <div class="">
                    <label for="fotokades">Foto Kades</label> <br>
                    @if ($kades->fotokades)
                      <img src="{{ asset('images/fotokades/'.$kades->fotokades.'') }}" alt="Kades {{ $kades->nama }}" class="img-thumbnail" width="180px">
                    @endif
                    <input type="file" class="" id="fotokades" name="fotokades" value="{{ $kades->fotokades}}">

                    @if ($kades->fotokades)
                      <small class="form-text text-muted">Klik tombol diatas untuk mengganti foto Kades.</small>
                    @else
                      <small class="form-text text-muted">Tambahkan Pas Foto Kades.</small>
                    @endif

                    @error('fotokades') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                  <div class="">
                    <label for="ttdcap">TTD dan Cap</label> <br>
                    @if ($kades->ttdcap)
                      <img src="{{ asset('images/ttdcap/'.$kades->ttdcap.'') }}" alt="Cap dan Ttd {{ $kades->nama }}" class="img-thumbnail" width="180px">
                    @endif

                    <input type="file" class="" id="ttdcap" name="ttdcap" value="{{ $kades->ttdcap }}">

                    @if ($kades->ttdcap)
                      <small class="form-text text-muted">Klik tombol diatas untuk mengganti Ttd Kades.</small>
                    @else
                      <small class="form-text text-muted">Tambahkan Cap dan Ttd Kades.</small>
                    @endif
                    
                    @error('ttdcap') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>

                  <button type="submit" class="btn btn-primary my-3">Simpan</button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-5 pl-1">
            <div class="card card-kades">
              <div class="card-body">
                <div class="container text-center my-2">
                    <img src="{{ asset('images/fotokades/'.$kades->fotokades) }}" class="rounded-circle" width="120px">
                </div>
                <h5 class="title text-center">Data Identitas</h5>
                <table border="0" align="center" width=83% style="padding-left: 30px;">
                    <tr>
                        <td class="text-secondary" width=28%>Nama</td>
                        <td class="text-secondary">:</td>
                        <td style="text-transform: uppercase;">{{ $kades->nama }}</td>
                    </tr>
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
                    <tr>
                        <td class="text-secondary">Ttl</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $kades->ttl }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Alamat</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $kades->alamat }}</td>
                    </tr>
                </table>
              </div>
              <hr>
              <div class="button-container text-center mb-3">
                <a href="" data-toggle="modal" data-target="#hapusKades{{ $kades->id }}" class="btn btn-danger">Hapus Kades</a>
                <form action="{{ route('kades.aktifkan', $kades->id) }}" method="post" class="d-inline">
                  @csrf
                  <button type="submit" class="btn btn-success">Aktifkan Kades</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

<!-- Modal Hapus Kades -->
<div class="modal fade" id="hapusKades{{$kades->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Kepala Desa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center">Anda yakin ingin menghapus <b>{{ $kades->nama }}</b> dari <i> Data Kepala Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</i> ?</p>
        <small class="text-secondary text-center">*tindakan ini akan membuat {{ $kades->nama }} tidak terdata lagi di data Kepala Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}.</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <form action="{{ route('kades.delete', $kades->id) }}" method="post">
          @csrf
          @method('delete')
          <button class="btn btn-danger" type="submit">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection