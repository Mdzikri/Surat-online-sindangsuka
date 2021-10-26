@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Keterangan Usaha</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Usaha, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
      @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data Lainnya</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation" novalidate>
          @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan Usaha">
            <div class="mb-3">
              <label for="nama_usaha">Nama Usaha :</label>
              <input name="nama_usaha" type="text" class="form-control shadow" id="nama_usaha" placeholder="contoh: Keripik Emping Jagung" required>
              @error('nama_usaha') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div> 
            <div class="mb-3">
              <label for="alamat_usaha">Alamat tempat usaha :</label>
              <input name="alamat_usaha" type="text" class="form-control shadow" id="alamat_usaha" placeholder="" required>
              @error('alamat_usaha') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
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