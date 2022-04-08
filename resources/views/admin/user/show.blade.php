@extends('layouts.admin.bar')
@section('judul', 'Detail User')
@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-6 order-md-2 pl-1">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Data {{ $user->nama }}</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @method('patch')
                    @csrf
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>No NIK</label>
                        <input type="text" name="nik" class="form-control" value="{{ old('nik') ?? $user->nik }}">
                        @error('nik') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') ?? $user->nama }}">
                        @error('nama') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Tempat, Tanggal Lahir</label>
                        <input type="text" name="ttl" class="form-control" value="{{ old('ttl') ?? $user->ttl }}">
                        @error('ttl') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="jk" value="{{ old('jk') ?? $user->jk }}">
                          <option value="{{ $user->jk }}">{{ $user->jk }}</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('jk') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control" value="{{ old('pekerjaan') ?? $user->pekerjaan }}">
                        @error('pekerjaan') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" value="{{ old('agama') ?? $user->agama }}">
                        @error('agama') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="">
                        <label for="exampleInputEmail1">Status</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status" value="{{ old('status') ?? $user->status }}">
                          <option value="{{ old('status') ?? $user->status }}">{{ old('status') ?? $user->status }}</option>
                          <option value="Menikah">Menikah</option>
                          <option value="Belum Menikah">Belum Menikah</option>
                          <option value="Janda">Janda</option>
                          <option value="Duda">Duda</option>
                        </select>
                        @error('status') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') ?? $user->alamat }}">
                        @error('alamat') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label for="rt_id" class="">RT</label>
                        <div class="">
                            {{-- <select name="rt_id" class="custom-select d-block w-100 select" id="rt_id">
                            @foreach ($rt as $t)
                                <option value="{{ $t->id }}">RT.{{ $t->no }}/RW.{{ $t->rw->no }}</option>
                            @endforeach
                            </select>
                            @error('rt_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label for="rw_id" class="">RW</label>
                        <div class="">
                            {{-- <select name="rw_id" class="custom-select d-block w-100 select" id="rw_id" value={{ $rtnya->no }}>
                            @foreach ($rw as $w)
                                <option value="{{ $w->id }}">RW.{{ $w->no }}</option>
                            @endforeach
                            </select>
                            @error('rw_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Kewarganegaraan</label>
                        <input type="text" name="kewarganegaraan" class="form-control" value="{{ old('kewarganegaraan') ?? $user->kewarganegaraan }}">
                        @error('kewarganegaraan') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 pl-1">
                    <div class="form-group mt-2">
                      <button type="submit" class="btn btn-primary ml-2 my-3 allign-right">Edit Identitas</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6 order-md-1 pr-1">
            <div class="card card-user">
              <div class="card-body">
                <h5 class="title text-center">Data Identitas</h5>
                <table border="0" align="center" width=83% style="padding-left: 30px;">
                    <tr>
                        <td class="text-secondary" width=28%>Nama</td>
                        <td class="text-secondary">:</td>
                        <td style="text-transform: uppercase;">{{ $user->nama }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">No NIK</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $user->nik }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Tempat Tgl Lahir</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $user->ttl }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Agama</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $user->agama }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Jenis Kelamin</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $user->jk }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Status</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $user->status }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Pekerjaan</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $user->pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Penduduk Rt/Rw</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $user->rt->no }}/{{ $user->rw->no }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Alamat</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $user->alamat }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Kewarganegaraan</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $user->kewarganegaraan }}</td>
                    </tr>
                </table>

                <h5 class="title text-center mt-4">Data Kelengkapan</h5>
                @if ($user->status_lengkap == 1)
                <table border="0" align="center" width=83% style="padding-left: 30px;">
                    <tr>
                        <td class="text-secondary" width=28%>No Telp</td>
                        <td class="text-secondary">:</td>
                        <td style="text-transform: uppercase;">{{ $user->telp }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Penghasilan</td>
                        <td class="text-secondary">:</td>
                        <td>{{ $user->penghasilan }}</td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Foto KTP</td>
                        <td class="text-secondary">:</td>
                        <td>
                          <img src="{{ asset('images/fotoktp/'.$user->fotoktp.'') }}" alt="Foto KTP {{ $user->nama }}" class="img-thumbnail" width="180px">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-secondary">Foto KK</td>
                        <td class="text-secondary">:</td>
                        <td>
                          <img src="{{ asset('images/fotokk/'.$user->fotokk.'')}}" alt="Foto KK {{ $user->nama }}" class="img-thumbnail" width="180px">
                        </td>
                    </tr>
                </table>
                @else
                <div class="d-flex justify-content-center">
                    <small class="">*User belum melengkapi data kelengkapan</small>
                </div>
                @endif
              </div>
              <hr>
              <div class="button-container">
                @if ($user->status_verifikasi == 0)
                  <form action="{{ route('user.verifikasi', $user->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-primary">Verifikasi Penduduk</button>
                  </form>
                @else
                  <form action="{{ route('user.nonaktifkan', $user->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-danger">Non-aktifkan Penduduk</button>
                  </form>
                  <hr>
                  <form action="{{ route('admin.reset.password', $user->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                      <div class="mr-3 ml-3">
                        <label>Reset Password</label>
                        <input type="password" name="password" class="form-control" value="">
                        @error('password') <div class="text-danger mt-1"> <small>{{$message}}</small> </div> @enderror
                      </div>
                    </div>
                    <button type="submit" class="btn btn-warning">Reset Password</button>
                  </form>
                @endif
                {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusUser">Non-Aktifkan Penduduk</button> --}}
              </div>
            </div>
          </div>
        </div>
      </div>


<!-- Modal -->
<div class="modal fade" id="hapusUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Non-Aktifkan User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
         Anda yakin ingin menonaktifkan <b>{{ $user->nama }}</b> sebagai user di website layanan surat Desa? <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <form action="{{ route('user.delete', $user->id) }}" method="post" class="d-inline">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger">Non-aktifkan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection