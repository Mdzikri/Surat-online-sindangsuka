@extends('layouts.admin.bar')
@section('judul', 'Kelola Data Desa')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-7 pr-1">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Data Desa</h5>
              </div>
              <div class="card-body">
                @if (isset($desa))
                <form action="{{ route('desa.store') }}" method="post">
                  @csrf
                    <div class="">
                      <div class="form-group">
                        <label>Nama Desa</label>
                        <input type="text" name="nama_desa" class="form-control" value="{{ old('nama_desa') ?? $desa->nama_desa }}">
                        @error('nama_desa') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="">
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control" value="{{ old('kecamatan') ?? $desa->kecamatan }}">
                        @error('kecamatan') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="">
                      <div class="form-group">
                        <label>Kabupaten</label>
                        <input type="text" name="kabupaten" class="form-control" value="{{ old('kabupaten') ?? $desa->kabupaten }}">
                        @error('kabupaten') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="">
                      <div class="form-group">
                        <label>Alamat Kantor Desa</label>
                        <input type="text" name="alamat_kantor" class="form-control" value="{{ old('alamat_kantor') ?? $desa->alamat_kantor }}">
                        @error('alamat_kantor') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                  <button type="submit" class="btn btn-primary my-3">Ubah</button>
                </form>
                @else
                <form action="{{ route('desa.store') }}" method="post">
                  @csrf
                    <div class="">
                      <div class="form-group">
                        <label>Nama Desa</label>
                        <input type="text" name="nama_desa" class="form-control">
                        @error('nama_desa') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="">
                      <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control">
                        @error('kecamatan') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="">
                      <div class="form-group">
                        <label>Kabupaten</label>
                        <input type="text" name="kabupaten" class="form-control">
                        @error('kabupaten') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="">
                      <div class="form-group">
                        <label>Alamat Kantor Desa</label>
                        <input type="text" name="alamat_kantor" class="form-control">
                        @error('alamat_kantor') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                  <button type="submit" class="btn btn-primary my-3">Ubah</button>
                </form> 
                @endif
              </div>
            </div>
          </div>

          @if (isset($desa))
            <div class="col-md-5 pl-1">
                <div class="card card-logo">
                <div class="card-body">
                <form action="{{ route('desa.logo', $desa->id) }}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="">
                        <label for="logo_desa">Logo Desa</label> <br>
                        <img src="{{ asset('images/'.$desa->logo_desa.'') }}" alt="Logo Desa" class="img-thumbnail mb-2" width="180px">
                        <input type="file" id="logo_desa" name="logo_desa" value="">

                        @if ('$desa->logo_desa')
                        <small class="form-text text-muted">Klik tombol diatas untuk mengganti logo Desa.</small>
                        @else
                        <small class="form-text text-muted">Tambahkan Logo Desa.</small>
                        @endif

                        @error('logo_desa') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Simpan</button>
                    </form>
                </div>
                </div>
            </div>
          @endif
        </div>
      </div>
@endsection