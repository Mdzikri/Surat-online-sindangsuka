@extends('layouts.admin.bar')
@section('judul', 'Acc Ajuan Surat')
@section('content')
    <div class="row">
          <div class="col-md-5 order-2">
            <div class="card px-3">
                @if ($ajuan->jenis == 'Surat Kematian')
                <div class="card-header">
                  <h5 class="title">Identitas Almarhum</h5>
                </div>
                <div class="card-body">
                  <table class="table">
                      <tbody>
                        <tr>
                          <td><label>Nama</label></td>
                          <td>{{ $ajuan->sk->nama_alm }}</td>
                        </tr>
                        <tr>
                          <td><label>Jenis Kelamin</label></td>
                          <td>{{ $ajuan->sk->jk_alm }}</td>
                        </tr>
                        <tr>
                          <td><label>Umur</label></td>
                          <td>{{ $ajuan->sk->umur_alm }}</td>
                        </tr>
                        <tr>
                          <td><label>Nama</label></td>
                          <td>{{ $ajuan->sk->alamat_alm }}</td>
                        </tr>
                        <tr>
                          <td><label>Agama</label></td>
                          <td>{{ $ajuan->sk->agama_alm }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                @elseif($ajuan->jenis == 'Surat Keterangan Usaha')
                <div class="card-header">
                  <h5 class="title">Data Usaha</h5>
                </div>
                <div class="card-body">
                  <table class="table">
                      <tbody>
                        <tr>
                          <td><label>Nama Usaha</label></td>
                          <td>{{ $ajuan->sku->nama_usaha }}</td>
                        </tr>
                        <tr>
                          <td><label>Alamat Usaha</label></td>
                          <td>{{ $ajuan->sku->alamat_usaha }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                @endif
                @if ($ajuan->jenis == 'SKTM')
                <div class="card-header">
                  <h5 class="title">Data Kelengkapan</h5>
                </div>
                <div class="card-body">
                  <table class="table">
                      <tbody>
                        <tr>
                          <td><label>Nomor Telepon/WA</label></td>
                          <td>{{ $ajuan->user->telp }}</td>
                        </tr>
                        <tr>
                          <td><label>Penghasilan</label></td>
                          <td>{{ $ajuan->user->penghasilan }}</td>
                        </tr>
                        <tr>
                          <td><label>Foto KTP</label></td>
                          <td>
                            <img src="{{ asset('storage/fotoktp/'.$ajuan->user->fotoktp.'') }}" alt="Foto KTP {{ $ajuan->user->nama }}" class="img-thumbnail" width="180px">
                          </td>
                        </tr>
                        <tr>
                          <td><label>Foto KK</label></td>
                          <td>
                            <img src="{{ asset('storage/fotokk/'.$ajuan->user->fotokk.'') }}" alt="Foto KK {{ $ajuan->user->nama }}" class="img-thumbnail" width="180px">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>  
                @endif
                <div class="card-header">
                  <h5 class="title">Data Ajuan Surat</h5>
                </div>
                <div class="card-body">
                  <table class="table">
                      <tbody>
                        <tr>
                          <td><label>Surat</label></td>
                          <td>{{ $ajuan->jenis }}</td>
                        </tr>
                        <tr>
                          <td><label>Keterangan</label></td>
                          <td>{{ $ajuan->keterangan }}</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <div class="card-header">
                  <h5 class="title">Pengaju</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td><label>Nama</label></td>
                          <td>{{ $ajuan->user->nama }}</td>
                        </tr>
                        <tr>
                          <td><label>Penduduk</label></td>
                          <td>{{ $ajuan->user->rt_rw }}</td>
                        </tr>
                        @if ($ajuan->jenis == 'Surat Kematian')
                        <tr>
                          <td><label>Hubungan dengan yang meninggal</label></td>
                          <td>{{ $ajuan->sk->hubungan }}</td>
                        </tr>
                        @endif
                      </tbody>
                    </table>
                </div>
            </div>
          </div>

          {{-- Bagian Kiri --}}

          <div class="col-md-7 order-1">
            <div class="card px-4">
              <div class="card-body">
                 <div>
                   <h4 class="title text-center mt-0 mb-3">ACC Surat Ajuan</h4>
                 </div>
                 <hr>
                 <div class="row mb-3">
                  <div class="col-md-5">
                    <label>Pengaju</label> <br>
                    <label>Jenis Surat</label>
                    <label>Keterangan dari Pengaju</label>
                  </div>
                  <div class="col-md-7">
                    <a href="#exampleModal" data-toggle="modal" data-target="#exampleModal">{{ $ajuan->user->nama }}</a> <br>
                    <b>{{ $ajuan->jenis }}</b> <br>
                    {{ $ajuan->keterangan }}
                  </div>
                 </div>
                 <div>
                   <h6 class="title text-center">Pilih Keperluan</h6>
                 </div>
                @if ($ajuan->jenis == 'Surat Kematian')
                 <form action="{{ route('antrian.update.sk', $ajuan->id) }}" method="post">
                @endif
                @if ($ajuan->jenis == 'Surat Keterangan Usaha')
                 <form action="{{ route('antrian.update.sku', $ajuan->id) }}" method="post">
                @endif
                @if ($ajuan->jenis == 'SKTM')
                 <form action="{{ route('antrian.update.sktm', $ajuan->id) }}" method="post">
                @endif
                @if ($ajuan->jenis == 'Surat Kematian')
                 <form action="{{ route('antrian.update.sk', $ajuan->id) }}" method="post">
                @endif
                @if ($ajuan->jenis == 'Surat Domisili')
                 <form action="{{ route('antrian.update.sd', $ajuan->id) }}" method="post">
                @endif
                @if ($ajuan->jenis == 'SKCK')
                 <form action="{{ route('antrian.update.skck', $ajuan->id) }}" method="post">
                @endif
                @if ($ajuan->jenis == 'Surat Keterangan Belum Menikah')
                 <form action="{{ route('antrian.update.belum-menikah', $ajuan->id) }}" method="post">
                @endif
                @if ($ajuan->jenis == 'Surat Keterangan Beda Nama')
                 <form action="{{ route('antrian.update.beda-nama', $ajuan->id) }}" method="post">
                @endif
                @if ($ajuan->jenis == 'SKTB')
                 <form action="{{ route('antrian.update.sktb', $ajuan->id) }}" method="post">
                @endif
                @if ($ajuan->jenis == 'Formulir Permohonan KTP')
                 <form action="{{ route('antrian.update.mohon-ktp', $ajuan->id) }}" method="post">
                @endif
                   @method('patch')
                   @csrf
                   <select name="keterangan" class="form-control" id="keterangan" required>
                   	  <option disabled selected>Pilih</option>
                      @foreach ($keperluan as $k)
                        <option value="{{ $k->keperluan }}">{{ $k->keperluan }}</option>
                      @endforeach
                    </select>
                    @error('keterangan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
                   <small id="emailHelp" class="form-text text-muted ml-2">*Pilih berdasarkan keterangan dari pengaju.</small>
                   <button type="submit" class="btn btn-primary ml-2 my-3 allign-right">Acc Pengajuan</button>
                   {{-- <a href="{{ route('antrian.tolak', $ajuan->id) }}" class="btn btn-danger ml-2 my-3 allign-right">Tolak</a> --}}
                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#staticBackdrop">Tolak Pengajuan</button>
                 </form>
              </div>
            </div>
          </div>
        </div>



<!-- Modal Tolak Pengajuan -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tolak Pengajuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('antrian.tolak', $ajuan->id) }}" method="post">
          @csrf
          <div class="">
            <label for="pesan_penolakan">Pesan Penolakan : </label>
            <select class="form-control mt-2" id="pesan_penolakan" name="pesan_penolakan">
              @foreach ($pesan_penolakan as $pesan)
              <option value="{{ $pesan->isi }}">{{ $pesan->isi }}</option>
              @endforeach
            </select>
          </div>
          <div class="d-flex text-right">
              <button type="submit" class="btn btn-danger">Tolak Pengajuan</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Identitas Pengaju-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Identitas Pengaju</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-3">
         <div class="col-md-2 text-secondary">
           <span>Nama</span> <br>
           <span>NIK</span> <br>
           <span>Ttl</span> <br>
           <span>Agama</span> <br>
           <span>Jenis Kelamin</span> <br>
           <span>Status</span> <br>
           <span>Pekerjaan</span> <br>
           <span>Rt/Rw</span> <br> 
           <span>Alamat</span> <br>
         </div>
         <div class="col-md-1">
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
           <span>:</span> <br>
         </div>
         <div class="col-md-9 pl-1">
           <a href="{{ route('user.show', $ajuan->user->id) }}">{{ $ajuan->user->nama }}</a> <br>
           <b>{{ $ajuan->user->nik }}</b> <br>
           <span>{{ $ajuan->user->ttl }}</span> <br>
           <span>{{ $ajuan->user->agama }}</span> <br>
           <span>{{ $ajuan->user->jk }}</span> <br>
           <span>{{ $ajuan->user->status }}</span> <br>
           <span>{{ $ajuan->user->pekerjaan }}</span> <br>
           <span>{{ $ajuan->user->rt_rw }}</span> <br>
           <span>{{ $ajuan->user->alamat }}</span> <br>
         </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <a href="{{ route('user.show', $ajuan->user->id) }}" class="btn btn-primary">Lihat lebih banyak</a>
        {{-- <button type="button" class="btn btn-primary">Lihat lebih banyak</button> --}}
      </div>
    </div>
  </div>
</div>
@endsection