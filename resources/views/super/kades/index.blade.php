@extends('layouts.admin.bar')
@section('judul', 'Kelola Data Kepala Desa')
@section('content')
    <div class="content">
        <div class="container">
            <h2 class="title text-center mb-3">PEJABAT PENGESAH SURAT</h2>
            <hr>
            <div class="row">
              @if (isset($kades_aktif))
              <div class="card border-light mb-3 col-md-6 offset-md-3">
                <div class="card-header"><i><b>Pejabat Pengesah Surat Aktif</b></i></div>
                <div class="card-body row mb-3">
                  <div class="col-md-4">
                    <img src="{{ asset('images/fotokades/'.$kades_aktif->fotokades) }}" class="rounded-circle" height="120px" width="120px">
                  </div>
                  <div class="col-md-8 pt-3">
                    <h5 class="card-title">{{ $kades_aktif->nama }}</h5>
                    <table border="0" align="center" width=100% style="padding-left: 30px;">
                        <tr>
                            <td class="text-secondary">Jabatan</td>
                            <td class="text-secondary">:</td>
                            <td>{{ $kades_aktif->jabatan }}</td>
                        </tr>
                        <tr>
                            <td class="text-secondary">Periode</td>
                            <td class="text-secondary">:</td>
                            <td>{{ $kades_aktif->periode }}</td>
                        </tr>
                    </table>
                  </div>
                </div>
              </div>
              @endif
            </div>
            <hr>
            <div class="d-flex justify-content-between mb-3">
              <h4 class="title text-center my-3" style="text-transform: uppercase">KEPALA DESA DAN PEJABAT PENGESAH SURAT {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</h4>
              <button type="submit" class="btn btn-primary shadow" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i> Tambah</button>
              {{-- <form action="" method="">
                <div class="input-group no-border">
                  <input type="text" value="" class="form-control bg-white" placeholder="Cari Kades atau Pejabat Desa...">
                  <div class="input-group-append">
                    <div class="input-group-text bg-white">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </form> --}}
            </div>
            
            <div class="row">
            @foreach ($kades as $k)
              <div class="col-md-4 pr-1 pl-1">
                <div class="card card-user">
                  <div class="card-body">
                    <div class="container text-center my-2">
                        {{-- <img src="{{ asset('images/kades.jpg') }}" class="rounded-circle" width="120px"> --}}
                        <img src="{{ asset('images/fotokades/'.$k->fotokades) }}" class="rounded-circle" height="120px" width="120px">
                    </div>
                    <h5 class="title text-center">{{ $k->nama }}</h5>
                    <table border="0" align="center" width=100% style="padding-left: 30px;">
                        <tr>
                            <td class="text-secondary" width=30%>Nama</td>
                            <td class="text-secondary">:</td>
                            <td style="text-transform: uppercase;">{{ $k->nama }}</td>
                        </tr>
                        <tr>
                            <td class="text-secondary">Jabatan</td>
                            <td class="text-secondary">:</td>
                            <td>{{ $k->jabatan }}</td>
                        </tr>
                        <tr>
                            <td class="text-secondary">Periode</td>
                            <td class="text-secondary">:</td>
                            <td>{{ $k->periode }}</td>
                        </tr>
                        <tr>
                            <td class="text-secondary">Ttl</td>
                            <td class="text-secondary">:</td>
                            <td>{{ $k->ttl }}</td>
                        </tr>
                        <tr>
                            <td class="text-secondary">Alamat</td>
                            <td class="text-secondary">:</td>
                            <td>{{ $k->alamat }}</td>
                        </tr>
                    </table>
                  </div>
                  <hr>
                  <div class="button-container">
                    <a href="{{ route('kades.edit', $k->id) }}" class="btn btn-neutral btn-icon btn-round btn-lg">
                      <i class="far fa-edit"></i>
                    </a>
                    <a href="" data-toggle="modal" data-target="#aktifkanKades{{$k->id}}" class="btn btn-neutral btn-icon btn-round btn-lg">
                      <i class="fa fa-check-square" aria-hidden="true"></i>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="aktifkanKades{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Aktifkan Kepala Desa?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Aktifkan <b>{{ $k->nama }}</b> sebagai<br><b>Kepala Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</b> saat ini?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                            <form action="{{ route('kades.aktifkan', $k->id) }}" method="post">
                              @csrf
                              <button class="btn btn-success" type="submit">Aktifkan</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kepala Desa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('kades.store') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Kepala Desa">
                @error('nama') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK Kades">
                @error('nik') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 pr-1">
              <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" class="form-control" id="agama" name="agama" placeholder="Agama">
                @error('agama') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
            </div>
            <div class="col-md-6 pr-1 pl-1">
              <div class="form-group">
                <label for="ttl">Ttl</label>
                <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Tempat, tgl bulan tahun">
                @error('ttl') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
            </div>
            <div class="col-md-3 pl-1">
              <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select class="form-control pb-2" id="exampleFormControlSelect1" name="jk" value="">
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
                @error('jk') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="cont: Kepala Desa">
                @error('jabatan') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label for="periode">Periode</label>
                <input type="text" class="form-control" id="periode" name="periode" placeholder="cont: 2020-2025">
                @error('periode') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" placeholder="cont: Kp. Kopeng RT/RW 01/01"></textarea>
            @error('alamat') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
          </div>
          {{-- <div class="row">
            <div class="col-md-6 pr-1">
              <div class="">
                <label for="fotokades">Foto Kades</label>
                <input type="file" class="" id="fotokades" name="fotokades" value="">
                <small class="form-text text-muted">Tambahkan foto kartu Kades.</small>
                @error('fotokades') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="">
                <label for="ttdcap">Ttd dan Cap</label>
                <input type="file" id="ttdcap" name="ttdcap" value="">
                <small class="form-text text-muted">Tambahkan Ttd dan Cap Kades.</small>
                @error('ttdcap') <div class="text-danger mt-1" > <small>{{$message}}</small> </div> @enderror
              </div>
            </div>
          </div> --}}
          <div class="d-flex text-right mt-3">
              <button type="submit" class="btn btn-primary">Tambah</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection