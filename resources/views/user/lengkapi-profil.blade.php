@extends('layouts.main')

@section('content')
    <div class="container my-5">
      <div class="row">
        <div class="col-sm-3 col-md-3">
            <h1>Lengkapi Data Diri</h1>
            <p><i>Lengkapi data diri anda seperti no. telp, penghasilan, foto ktp, foto kartu keluarga, dan pas foto untuk syarat kebutuhan pengajuan surat tertentu.</i></p>
        </div>
        <div class="col-sm-5 col-md-5">
          {{-- KONTEN --}}
            <form action="{{ route('lengkapi.update') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="container row">
                <div class="col-md-5 pr-1 pl-1">
                  <div class="form-group">
                    <label for="telp">No Telp/WhatsApp</label>
                    <input type="number" class="form-control" id="telp" name="telp" value="{{ $user->telp ?? $user->telp }}">
                    @error('telp') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
                <div class="col-md-7 pr-1 pl-1">
                  <div class="form-group">
                    <label for="penghasilan">Penghasilan</label>
                    <select class="form-control" id="penghasilan" name="penghasilan">
                      @if ($user->penghasilan)
                      <option value="{{ $user->penghasilan ?? $user->penghasilan }}">{{ $user->penghasilan }}</option>
                      @endif
                      <option value="< 1.000.000"> < 1.000.000 </option>
                      <option value="1.000.000 sd. 3.000.000">1.000.000 sd. 3.000.000</option>
                      <option value="3.000.000 sd. 5.000.000">3.000.000 sd. 5.000.000</option>
                      <option value="5.000.000 sd. 10.000.000">5.000.000 sd. 10.000.000</option>
                      <option value="> 10.000.000"> > 10.000.000 </option>
                    </select>
                    @error('penghasilan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="fotoktp">Foto KTP</label>
                @can('lengkap')
                <img src="{{ asset('images/fotoktp/'.$user->fotoktp.'') }}" alt="Foto KTP {{ $user->nama }}" class="img-thumbnail" width="180px">
                @endcan
                <input type="file" class="form-control-file" id="fotoktp" name="fotoktp" value="{{ $user->fotoktp ?? $user->fotoktp }}">
                @can('lengkap')
                <small class="form-text text-muted">Klik tombol diatas untuk mengganti foto KTP Anda.</small>
                @else
                <small class="form-text text-muted">Tambahkan foto KTP atau scan foto KTP.</small>
                @endcan
                @error('fotoktp') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
              <div class="form-group">
                <label for="fotokk">Foto KK</label>
                @can('lengkap')
                <img src="{{ asset('images/fotokk/'.$user->fotokk.'') }}" alt="Foto KK {{ $user->nama }}" class="img-thumbnail" width="180px">
                @endcan
                <input type="file" class="form-control-file" id="fotokk" name="fotokk" value="{{ $user->fotokk ?? $user->fotokk }}">
                @can('lengkap')
                <small class="form-text text-muted">Klik tombol diatas untuk mengganti foto KTP Anda.</small>
                @else
                <small class="form-text text-muted">Tambahkan foto kartu Keluarga atau scan foto kartu keluarga.</small>
                @endcan
                @error('fotokk') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
              <div class="">
                @can('lengkap')
                <button class="btn tombol shadow" type="submit" name="translate">Edit Kelengkapan</button>
                @else
                <button class="btn tombol shadow" type="submit" name="translate">Lengkapi</button>
                @endcan
              </div>
              <br>
            </form>
        </div>
        <div class="col-sm-4 col-md-4">
            <div class="card mt-1 px-3 py-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span class="text-muted">Identitas Diri</span>
                  <a href="{{ route('edit.profil') }}" class="btn btn-secondary rounded-pill tomboledit">Edit</a>
                </h4>
                <ul class="list-group mb-3 shadow">
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Nama Lengkap</h6>
                    </div>
                    <span class="text-muted">{{ Auth::user()->nama }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">NIK</h6>
                    </div>
                    <span class="text-muted">{{ Auth::user()->nik }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Tempat, Tanggal Lahir</h6>
                    </div>
                    <span class="text-muted text-right">{{ Auth::user()->ttl }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Jenis Kelamin</h6>
                    </div>
                    <span class="text-muted">{{ Auth::user()->jk }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Status</h6>
                    </div>
                    <span class="text-muted">{{ Auth::user()->status }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Agama</h6>
                    </div>
                    <span class="text-muted">{{ Auth::user()->agama }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Pekerjaan</h6>
                    </div>
                    <span class="text-muted">{{ Auth::user()->pekerjaan }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Alamat</h6>
                    </div>
                    <span class="text-muted text-right">{{ Auth::user()->alamat }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                      <h6 class="my-0">Kewarganegaraan</h6>
                    </div>
                    <span class="text-muted">{{ Auth::user()->kewarganegaraan }}</span>
                  </li>
                </ul>
            </div>
        </div>
      </div>
    </div>
@endsection
