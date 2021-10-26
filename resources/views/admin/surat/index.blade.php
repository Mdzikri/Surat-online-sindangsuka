@extends('layouts.admin.bar')
@section('judul', 'Kelola Format Surat')
@section('content')
    <div class="row">

        <div class="col-md-7 pr-1">
            <div class="container card">
                <div class="card-header">
                    <h5 class="card-category mt-2">Kelola Pesan Penolakan Pengajuan:</h5>
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Pesan Penolakan Pengajuan</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPesanPenolakan">
                          Tambah
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class=" text-primary">
                                <th><b>Pesan Penolakan</b></th>
                                <th class="text-right"><b>Opsi</b></th>
                            </thead>
                            <tbody>
                              @foreach ($pesan_penolakan as $p)
                              <tr>
                                <td><i>{{ $p->isi }}</i></td>
                                <td class="text-right inline-block" width="22%">
                                  <button type="button" class="badge badge-warning" data-toggle="modal" data-target="#editPesanPenolakan{{$p->id}}">Edit</button>
                                  <!-- Modal -->
                                  <div class="modal fade" id="editPesanPenolakan{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Edit Pesan Penolakan</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal-body">
                                          <form action="{{ route('pesan-penolakan.update', $p->id) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <div class="form-group">
                                              <label for="isi">Isi Pesan</label>
                                              <textarea class="form-control" name="isi" id="isi" cols="30" rows="10" placeholder="cont: Mohon maaf, pengajuan anda tertolak dikarenakan anda tidak berdomisili di Desa {{ isset($desa) ? asset('images/' . $desa->logo_desa . '') : asset('images/logo.png') }}">{{ $p->isi }}</textarea>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning mr-1">Edit</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#hapusPesanPenolakan{{$p->id}}">Hapus</button>
                                  <!-- Modal -->
                                  <div class="modal fade" id="hapusPesanPenolakan{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Hapus Pesan Penolakan</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body text-center">
                                          Anda yakin ingin menghapus pesan penolakan dibawah ini? <br>
                                          <i class="text-secondary">"{{ $p->isi }}"</i>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                          <form action="{{ route('pesan-penolakan.delete', $p->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-5 pl-1">
            <div class="container card">
                <div class="card-header">
                    <h5 class="card-category mt-2">Kelola keterangan pada surat:</h5>
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Keterangan Surat</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKeperluan">
                          Tambah
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class=" text-primary">
                                <th><b>Keperluan</b></th>
                                <th class="text-right"><b>Opsi</b></th>
                            </thead>
                            <tbody>
                              @foreach ($keperluan as $k)
                              <tr>
                                <td>{{ $k->keperluan }}</td>
                                <td class="text-right inline-block" width="22%">
                                  <button type="button" class="badge badge-warning" data-toggle="modal" data-target="#editKeperluan{{$k->id}}">Edit</button>
                                  <!-- Modal -->
                                  <div class="modal fade" id="editKeperluan{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Edit Keperluan</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal-body">
                                          <form action="{{ route('keperluan.update', $k->id) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <div class="form-group">
                                              <label for="keperluan">Nama Keperluan</label>
                                              <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="cont: Perlengkapan Administrasi" value="{{ $k->keperluan }}" autofocus="">
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-warning mr-1">Edit</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#hapuskeperluan{{$k->id}}">Hapus</button>
                                  <!-- Modal -->
                                  <div class="modal fade" id="hapuskeperluan{{$k->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Hapus Keperluan</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body text-center">
                                           Anda yakin ingin menghapus keperluan dibawah ini? <br>
                                          <i class="text-secondary">"{{ $k->keperluan }}"</i>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                          <form action="{{ route('keperluan.delete', $k->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="tambahKeperluan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Keterangan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('keperluan.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="keperluan">Keperluan</label>
            <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="cont: Perlengkapan Administrasi" autocomplete="" autofocus>
          </div>
          {{-- <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10" placeholder="cont: Demikian surat keterangan ini kami buat dengan sebenarnya untuk selanjutnya dapat dipergunakan sebagaimana mestinya"></textarea>
          </div> --}}
          <div class="d-flex text-right">
              <button type="submit" class="btn btn-primary">Tambah</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahPesanPenolakan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Pesan Penolakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('pesan-penolakan.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="isi">Isi Pesan</label>
            <textarea class="form-control" name="isi" id="isi" cols="30" rows="10" placeholder="cont: Mohon maaf, pengajuan anda tertolak dikarenakan anda tidak berdomisili di Desa {{ isset($desa) ? asset('images/' . $desa->logo_desa . '') : asset('images/logo.png') }}"></textarea>
          </div>
          <div class="d-flex text-right">
              <button type="submit" class="btn btn-primary">Tambah</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection