@extends('layouts.main')

@section('content')
    <div class="container my-5">
      <div class="row mx-4">
        <div class="col-sm-5">
            <h1>Edit Identitas</h1>
            <p class="mb-3"><i>Apabila terdapat kesalahan pada identitas anda, harap ubah dengan mengedit form ini untuk menghindari kesalahan data pada surat yang anda ajukan.</i></p>
            {{-- <hr class="my-4">
            <h3>Ganti Password</h3>
            <div class="container">
              <form action="{{ route('ganti-password.profil') }}" method="post">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="passwordlama">Password Lama</label>
                  <input type="password" class="form-control" id="passwordlama" name="nama" placeholder="password lama anda">
                  @error('passwordlama') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="form-group">
                  <label for="passwordbaru">Password Baru</label>
                  <input type="password" class="form-control" id="passwordbaru" name="passwordbaru" placeholder="isi password baru">
                  @error('passwordbaru') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="form-group">
                  <label for="konfirmasi">Konfirmasi Password Baru</label>
                  <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" placeholder="ketik ulang password baru">
                  @error('konfirmasi') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="text-right">
                  <button class="btn tombol shadow" type="submit" name="ganti">Ganti Password</button>
                </div>
              </form>
            </div> --}}
        </div>
        <div class="col-sm-7 col-md-7">
          {{-- KONTEN --}}
            <form action="{{ route('update.profil') }}" method="post">
              @method('patch')
              @csrf
              <div class="row">
                <div class="col-md-4 pr-1 pl-1">
                  <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}">
                    @error('nama') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
                <div class="col-md-4 pr-1 pl-1">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="{{ $user->nik }}">
                    @error('nik') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
                <div class="col-md-4 pr-1 pl-1">
                  <div class="form-group">
                    <label for="no_kk">NO KK</label>
                    <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $user->no_kk }}">
                    @error('no_kk') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 pr-1 pl-1">
                  <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="jk" value="{{ $user->jk }}">
                      <option value="{{ $user->jk }}">{{ $user->jk }}</option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                    @error('jk') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
                <div class="col-md-6 pr-1 pl-1">
                  <div class="form-group">
                    <label for="ttl">Tempat Tanggal Lahir</label>
                    <input type="text" class="form-control" id="ttl" name="ttl" value="{{ $user->ttl }}">
                    @error('ttl') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
                <div class="col-md-3 pr-1 pl-1">
                  <div class="form-group">
                    <label for="agama">Agama</label>
                    <input type="text" class="form-control" id="agama" name="agama" value="{{ $user->agama }}">
                    @error('agama') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 pr-1 pl-1">
                  <div class="form-group">
                    <label for="status">Status Pernikahan</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="status" value="{{ $user->status }}">
                      <option value="{{ $user->status }}">{{ $user->status }}</option>
                      <option value="Menikah">Menikah</option>
                      <option value="Belum Menikah">Belum Menikah</option>
                      <option value="Janda">Janda</option>
                      <option value="Duda">Duda</option>
                    </select>
                    @error('status') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
                <div class="col-md-6 pr-1 pl-1">
                  <div class="form-group">
                    <label for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $user->pekerjaan }}">
                    @error('pekerjaan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 pr-1 pl-1">
                  <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan</label>
                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="{{ $user->kewarganegaraan }}">
                    @error('kewarganegaraan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
                <div class="col-md-3 pr-1 pl-1">
                                <div class="form-group">
                                    <label for="rw_id" class="">RW</label>
                                    <div class="">
                                        <select name="rw_id" class="custom-select d-block w-100 select" id="rw_id" value="{{ $user->rw->no }}">
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
                                {{-- <div class="form-group">
                                  <label for="rw">RW</label>
                                  <select class="form-control" id="exampleFormControlSelect1" name="rw" value="{{ $user->rw->no }}">
                                    @foreach ($rw as $w)
                                      <option value="{{ $w->id }}">RW.{{ $w->no }}</option>
                                    @endforeach
                                  </select>
                                  @error('rw') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                                </div> --}}
                            </div>
                            <div class="col-md-3 pr-1 pl-1">
                                <div class="form-group">
                                    <label for="rt_id" class="">RT</label>
                                    <div class="">
                                        <select name="rt_id" class="custom-select d-block w-100 select" id="rt_id" value="{{ $user->rt->no }}">
                                        @foreach ($rt as $t)
                                            <option value="{{ $t->id }}">RT.{{ $t->no }}/RW.{{ $t->rw->no }}</option>
                                        @endforeach
                                        </select>
                                        @error('rt_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                  <label for="rt">RT</label>
                                  <select class="form-control" id="exampleFormControlSelect1" name="rt" value="{{ $user->rt->no }}">
                                    @foreach ($rt as $t)
                                      <option value="{{ $t->id }}">RT.{{ $t->no }}/RW.{{ $t->rw->no }}</option>
                                    @endforeach
                                  </select>
                                  @error('rt') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                                </div> --}}
                            </div>
              </div>
              <div class="row">
                <div class="col-md-12 pr-1 pl-1">
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control pr-1 pl-1" id="alamat" name="alamat" rows="3">{{ $user->alamat }}</textarea>
                    @error('alamat') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
              </div>

              <div class="text-right">
                <button class="btn tombol shadow" type="submit" name="translate">Edit Profil</button>
              </div>
            </form>
        </div>
      </div>
    </div>
@endsection
