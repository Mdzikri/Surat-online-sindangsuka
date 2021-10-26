@extends('layouts.admin.bar')
@section('judul', 'Kelola User')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Admin</h4>
                    <h5 class="card-category mt-2">Tambah Admin Pengelola Website Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="text-primary">
                                <th><b>Nama Lengkap</b></th>
                                <th><b>Rt/Rw</b></th>
                                <th class="text-right"><b>Opsi</b></th> 
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                            @if ($user->hasPermissionTo('setingumum'))
                                
                            @else
                              <tr>
                                  <td>{{ $user->nama }}</td>
                                  <td>{{ $user->rt->no }}/{{ $user->rw->no }}</td>
                                  <td class="text-right">
                                      <button class="badge badge-primary" data-toggle="modal" data-target="#tambahAdmin{{$user->id}}" type="submit">Tambah</button>
                                      <!-- Modal Tambah Admin -->
                                      <div class="modal fade" id="tambahAdmin{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <p class="text-center">Anda yakin ingin menjadikan <i>{{ $user->nama }}</i> sebagai <b>Admin</b> ?</p>
                                              <small class="text-secondary">*tindakan ini akan membuat {{ $user->nama }} memiliki akses untuk mengelola Website Desa {{ isset($desa) ? $desa->nama_desa : '*atur nama desa' }}.</small>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                                              <form action="{{ route('admin.store', $user->id) }}" method="post">
                                                @csrf
                                                <button class="btn btn-primary" type="submit">Tambah</button>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </td>
                              </tr>
                                
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="container">
                    {{$users->links()}} 
                </div> --}}
            </div>
        </div>
    </div>
@endsection