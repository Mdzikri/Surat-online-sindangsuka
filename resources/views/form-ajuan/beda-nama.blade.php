@extends('layouts.main')

@section('content')
    <div class="container">
      <div class="py-5 text-center">
        <h2 class="orenjudul">Pengajuan Surat Keterangan Beda Nama</h2>
        <p class="birusubjudul">Untuk pengajuan Surat Keterangan Beda Nama, Harap isikan data dibawah ini sesuai dengan data pribadi anda.</p>
      </div>

    <div class="row">
      @include('layouts.partials.identitas')
      <div class="col-md-7">
        <h4 class="mb-3">Isi Data Lainnya</h4>
        <form action="{{ route('store') }}" method="post" class="needs-validation" novalidate>
          @csrf
            <input type="hidden" name="jenis" value="Surat Keterangan Beda Nama">
            <div class="mb-3">
                <label for="perbedaan">Data yang beda:</label>
                <input name="perbedaan" type="text" class="form-control shadow" id="perbedaan" placeholder="contoh: Nama Lengkap/Tgl Lahir/dll" required>
                @error('perbedaan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
            </div>
            <div class="row mb-3">
                <div class="col-md-6 pr-1 pr-1">
                    <label for="dokumen1">Dokumen 1 :</label>
                    <input name="dokumen1" type="text" class="form-control shadow" id="dokumen1" placeholder="contoh: KTP" required>
                    @error('dokumen1') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pr-1 pr-1">
                    <label for="data1">Data tertera :</label>
                    <input name="data1" type="text" class="form-control shadow" id="data1" placeholder="contoh: Liya" required>
                    @error('data1') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 pr-1 pr-1">
                    <label for="dokumen2">Dokumen 2 :</label>
                    <input name="dokumen2" type="text" class="form-control shadow" id="dokumen2" placeholder="contoh: Kartu Keluarga" required>
                    @error('dokumen2') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                </div>
                <div class="col-md-6 pr-1 pr-1">
                    <label for="data2">Data tertera :</label>
                    <input name="data2" type="text" class="form-control shadow" id="data2" placeholder="contoh: Lia" required>
                    @error('data2') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
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