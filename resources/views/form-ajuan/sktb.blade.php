@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan SKTB</h2>
        <p class="birusubjudul">Untuk pengajuan SKTB, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
      @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data Lainnya</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation" novalidate>
          @csrf
            <input type="hidden" name="jenis" value="SKTB">
            <div class="mb-3">
                <label for="properti">Memiliki :</label>
                <input name="properti" type="text" class="form-control shadow" id="properti" placeholder="contoh: Tanah/Bangunan/Tanah dan Bangunan" required>
                @error('properti') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>
            <div class="row mb-3">
                <div class="col-md-6 pr-1 pr-1">
                    <label for="lokasi">Lokasi :</label>
                    <input name="lokasi" type="text" class="form-control shadow" id="lokasi" placeholder="contoh: Jalan Bunga No.11" required>
                    @error('lokasi') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pr-1 pr-1">
                    <label for="luas">Luas :</label>
                    <input name="luas" type="text" class="form-control shadow" id="luas" placeholder="contoh: 30 x 50 m" required>
                    @error('luas') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 pr-1 pr-1">
                    <label for="atas_nama">Atas Nama :</label>
                    <input name="atas_nama" type="text" class="form-control shadow" id="atas_nama" placeholder="contoh: Bambang Sugiono" required>
                    @error('atas_nama') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pr-1 pr-1">
                    <label for="harga">Harga :</label>
                    <input name="harga" type="text" class="form-control shadow" id="harga" placeholder="contoh: TIGA RATUS LIMA PULUH JUTA RUPIAH" required>
                    @error('harga') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
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