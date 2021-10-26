@extends('layouts.auth')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">Daftar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="nama" class="">Nama Lengkap</label>
                                    <div class="">
                                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pr-1 pl-1">
                                <div class="form-group">
                                    <label for="nik" class="">NIK</label>
                                    <div class="">
                                        <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik">
                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="no_kk" class="">NO KK</label>
                                    <div class="">
                                        <input id="no_kk" type="text" class="form-control @error('no_kk') is-invalid @enderror" name="no_kk" value="{{ old('no_kk') }}" required autocomplete="no_kk">
                                        @error('no_kk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 pr-1 pr-1">
                                {{-- <div class="form-group">
                                    <label for="agama" class="">Agama</label>
                                    <div class="">
                                        <input id="agama" type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" value="{{ old('agama') }}" required autocomplete="agama">
                                        @error('agama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label for="agama" class="">Agama</label>
                                    <div class="">
                                        <select name="agama" class="custom-select d-block w-100 select" id="agama">
                                          <option value="Islam">Islam</option>
                                          <option value="Katolik">Katolik</option>
                                          <option value="Protestan">Protestan</option>
                                          <option value="Hindu">Hindu</option>
                                          <option value="Budha">Budha</option>
                                          <option value="Konghuchu">Konghuchu</option>
                                        </select>
                                        @error('agama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pr-1 pl-1">
                                <div class="form-group">
                                    <label for="ttl" class="">Tempat, Tanggal Lahir</label>
                                    <div class="">
                                        <input id="ttl" type="text" class="form-control @error('ttl') is-invalid @enderror" name="ttl" value="{{ old('ttl') }}" required autocomplete="ttl" placeholder="contoh: Bandung, 8 September 1999">
                                        @error('ttl')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label for="jk" class="">Jenis Kelamin</label>
                                    <div class="">
                                        <select name="jk" class="custom-select d-block w-100 select" id="jk">
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 pr-1">
                                <div class="form-group">
                                    <label for="status" class="">Status</label>
                                    <div class="">
                                        <select name="status" class="custom-select d-block w-100 select" id="status">
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
                            </div>
                            <div class="col-md-3 pr-1 pl-1">
                                <div class="form-group">
                                    <label for="pekerjaan" class="">Pekerjaan</label>
                                    <div class="">
                                        <input id="pekerjaan" type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" value="{{ old('pekerjaan') }}" required autocomplete="pekerjaan" placeholder="contoh: Ibu Rumah Tangga">
                                        @error('pekerjaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 pr-1 pl-1">
                                <div class="form-group">
                                    <label for="rw_id" class="">RW</label>
                                    <div class="">
                                        <select name="rw_id" class="custom-select d-block w-100 select" id="rw_id">
                                        @foreach ($rw as $w)
                                            <option value="{{ $w->id }}">RW.{{ $w->no }}</option>
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
                            <div class="col-md-2 pr-1 pl-1">
                                <div class="form-group">
                                    <label for="rt_id" class="">RT</label>
                                    <div class="">
                                        <select name="rt_id" class="custom-select d-block w-100 select" id="rt_id">
                                        @foreach ($rt as $t)
                                            <option value="{{ $t->id }}">RT.{{ $t->no }}/RW.{{ $t->rw->no }}</option>
                                        @endforeach
                                            {{-- <input type="hidden" name="rw_id" value="{{ $t->rw->id }}"> --}}
                                        </select>
                                        @error('rt_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 pl-1">
                                <div class="form-group">
                                    <label for="kewarganegaraan" class="">Kewarganegaraan</label>
                                    <div class="">
                                        <input id="kewarganegaraan" type="text" class="form-control @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" value="Indonesia" required autocomplete="kewarganegaraan" placeholder="Indonesia">
                                        @error('kewarganegaraan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="pendidikan" class="">Pendidikan</label>
                                    <div class="">
                                        <select name="pendidikan" class="custom-select d-block w-100 select" id="pendidikan">
                                          <option value="SD/Sederajat">SD/Sederajat</option>
                                          <option value="SMP/Sederajat">SMP/Sederajat</option>
                                          <option value="SMA/Sederajat">SMA/Sederajat</option>
                                          <option value="S1/Sederajat">S1/Sederajat</option>
                                          <option value="S2/Sederajat">S2/Sederajat</option>
                                          <option value="S3/Sederajat">S3/Sederajat</option>
                                        </select>
                                        @error('pendidikan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pr-1 pl-1">
                                <div class="form-group">
                                    <label for="nama_ibu" class="">Nama Ibu</label>
                                    <div class="">
                                        <input id="nama_ibu" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ old('nama_ibu') }}" required autocomplete="nama_ibu">
                                        @error('nama_ibu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="nama_ayah" class="">Nama Ayah</label>
                                    <div class="">
                                        <input id="nama_ayah" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ old('nama_ayah') }}" required autocomplete="nama_ayah">
                                        @error('nama_ayah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="">Alamat Lengkap</label>
                            <div class="">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" placeholder="No Rumah, Jalan, Rt/Rw, Kecamatan, Desa, Kabupaten/Kota">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="password" class="">Kata Sandi</label>
                                    <div class="">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="password-confirm" class="">Ulangi Kata Sandi</label>
                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 my-3">
                                <button type="submit" class="btn tombol">
                                    <span class="px-5">
                                        Daftar
                                    </span>
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
