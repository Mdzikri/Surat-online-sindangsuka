@extends('layouts.auth')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header shadow">Daftar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="shadow form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nik" class="col-md-4 col-form-label text-md-right">NIK</label>
                            <div class="col-md-6">
                                <input id="nik" type="text" class="shadow form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik">
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ttl" class="col-md-4 col-form-label text-md-right">Tempat, Tanggal Lahir</label>
                            <div class="col-md-6">
                                <input id="ttl" type="text" class="shadow form-control @error('ttl') is-invalid @enderror" name="ttl" value="{{ old('ttl') }}" required autocomplete="ttl" placeholder="contoh: Bandung, 8 September 1999">
                                @error('ttl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="agama" class="col-md-4 col-form-label text-md-right">Agama</label>
                            <div class="col-md-6">
                                <input id="agama" type="text" class="shadow form-control @error('agama') is-invalid @enderror" name="agama" value="{{ old('agama') }}" required autocomplete="agama">
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jk" class="col-md-4 col-form-label text-md-right">Jenis Kelamin</label>
                            <div class="col-md-6">
                                <select name="jk" class="custom-select d-block w-100 select shadow" id="jk">
                                  <option value="Laki-laki">Laki-laki</option>
                                  <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <select name="status" class="custom-select d-block w-100 select shadow" id="status">
                                  <option value="Menikah">Menikah</option>
                                  <option value="Belum Menikah">Belum Menikah</option>
                                  <option value="Duda">Duda</option>
                                  <option value="Janda">Janda</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pekerjaan" class="col-md-4 col-form-label text-md-right">Pekerjaan</label>
                            <div class="col-md-6">
                                <input id="pekerjaan" type="text" class="shadow form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan') }}" required autocomplete="pekerjaan" placeholder="contoh: Ibu Rumah Tangga">
                                @error('pekerjaan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rt_rw" class="col-md-4 col-form-label text-md-right">Anggota Rt/Rw</label>
                            <div class="col-md-6">
                                <input id="rt_rw" type="text" class="shadow form-control @error('rt_rw') is-invalid @enderror" name="rt_rw" value="{{ old('rt_rw') }}" required autocomplete="rt_rw" placeholder="contoh: 03/05">
                                @error('rt_rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat Lengkap</label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="shadow form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" placeholder="No Rumah, Jalan, Rt/Rw, Kecamatan, Desa, Kabupaten/Kota">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kewarganegaraan" class="col-md-4 col-form-label text-md-right">Kewarganegaraan</label>
                            <div class="col-md-6">
                                <input id="kewarganegaraan" type="text" class="shadow form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" value="Indonesia" required autocomplete="kewarganegaraan" placeholder="Indonesia">
                                @error('kewarganegaraan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Kata Sandi</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="shadow form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Ulangi Kata Sandi</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="shadow form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="shadow tombol">
                                    Daftar
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
