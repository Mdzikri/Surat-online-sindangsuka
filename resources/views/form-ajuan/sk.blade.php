@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Data Surat Kematian</h2>
        <p class="birusubjudul">Harap isikan data dibawah ini sesuai dengan data Almarhum.</p>
      </div>

    <div class="row">
      <div class="identitas col-md-5 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Identitas Pelapor</span>
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
              <h6 class="my-0">Tempat, Tanggal Lahir</h6>
            </div>
            <span class="text-muted">{{ Auth::user()->ttl }}</span>
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
            <span class="text-muted">{{ Auth::user()->alamat }}</span>
          </li>
        </ul>
      <form action="{{ route('store') }}" method="post" class="needs-validation" novalidate>
        @csrf
        <input type="hidden" name="jenis" value="Surat Kematian">
        <input type="hidden" name="keterangan" value="-">
        <div class="mb-3">
            <label for="hubungan">Hubungan pelapor dengan yang meninggal :</label>
            <input name="hubungan" type="text" class="form-control shadow" id="hubungan" placeholder="contoh: Keluarga">
            @error('hubungan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
          </div>
        </div>
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-6">
              <h4 class="mb-3">Identitas Almarhum</h4>
              <div class="mb-3">
                <label for="nama_alm">Nama Lengkap :</label>
                <input name="nama_alm" type="text" class="form-control shadow" id="nama_alm" placeholder="">
                @error('nama_alm') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
              <div class="mb-3">
                <label for="jk_alm">Jenis Kelamin :</label>
                <select name="jk_alm" class="custom-select d-block w-100 select shadow" id="jk_alm">
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                @error('jk_alm') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
              <div class="mb-3">
                <label for="umur_alm">Umur :</label>
                <input name="umur_alm" type="text" class="form-control shadow" id="umur_alm" placeholder="">
                @error('umur_alm') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
              <div class="mb-3">
                <label for="agama_alm">Agama :</label>
                <input name="agama_alm" type="text" class="form-control shadow" id="agama_alm" placeholder="">
                @error('agama_alm') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
              <div class="mb-3">
                <label for="alamat_alm">Alamat :</label>
                <input name="alamat_alm" type="text" class="form-control shadow" id="alamat_alm" placeholder="">
                @error('alamat_alm') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
            </div>

            <div class="col-md-6">
              <h4 class="mb-3">Telah Meninggal Dunia Pada :</h4>
              <div class="mb-3">
                <label for="hari">Hari :</label>
                <input name="hari" type="text" class="form-control shadow" id="hari" placeholder="">
                @error('hari') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
              <div class="mb-3">
                <label for="tanggal">Tanggal :</label>
                <input name="tanggal" type="text" class="form-control shadow" id="tanggal" placeholder="">
                @error('tanggal') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
              <div class="mb-3">
                <label for="pukul">Pukul :</label>
                <input name="pukul" type="text" class="form-control shadow" id="pukul" placeholder="">
                @error('pukul') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
              <div class="mb-3">
                <label for="tempat">Bertempat di :</label>
                <input name="tempat" type="text" class="form-control shadow" id="tempat" placeholder="">
                @error('tempat') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
              <div class="mb-3">
                <label for="penyebab">Penyebab Kematian :</label>
                <input name="penyebab" type="text" class="form-control shadow" id="penyebab" placeholder="contoh: sakit">
                @error('penyebab') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit" name="translate">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection