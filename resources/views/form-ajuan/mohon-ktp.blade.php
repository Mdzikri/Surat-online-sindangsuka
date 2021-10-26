@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Formulir Permohonan Kartu Tanda Penduduk</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Beda Nama, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
      @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data Lainnya</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation" novalidate>
          @csrf
            <input type="hidden" name="jenis" value="Formulir Permohonan KTP">
            <div class="mb-3">
                <label for="jenis_permohonan" class="">Jenis Permohonan</label>
                <div class="">
                    <select name="jenis_permohonan" class="custom-select d-block w-100 select" id="jenis_permohonan">
                      <option value="Baru">Baru</option>
                      <option value="Perpanjangan">Perpanjangan</option>
                      <option value="Penggantian">Penggantian</option>
                    </select>
                    @error('jenis_permohonan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 pr-1 pr-1">
                    <label for="no_kk">No KK :</label>
                    <input name="no_kk" type="text" class="form-control shadow" id="no_kk" placeholder="contoh: 320402482359828" required>
                    @error('no_kk') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-4 pr-1 pr-1">
                    <label for="nama_kk">Nama KK :</label>
                    <input name="nama_kk" type="text" class="form-control shadow" id="nama_kk" placeholder="Nama pada KK" required>
                    @error('nama_kk') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-4 pr-1 pr-1">
                    <label for="kode_pos">Kode Pos :</label>
                    <input name="kode_pos" type="text" class="form-control shadow" id="kode_pos" placeholder="contoh: 40393" required>
                    @error('kode_pos') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="mb-3">
              <label for="keterangan">Keperluan :</label>
              <textarea class="form-control shadow" name="keterangan" id="keterangan" cols="10" rows="3" placeholder="Cantumkan keperluan, contoh: Perlengkapan Administrasi. dan pesan lainnya (jika ada)."></textarea>
              @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>
          <hr class="mb-4">
          <button class="btn btn-lg btn-block tombol shadow" type="submit" name="translate">Ajukan Permohonan Surat</button>
        </form>
      </div>
    </div>
    </div>
@endsection