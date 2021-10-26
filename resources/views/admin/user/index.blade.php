@extends('layouts.admin.bar')
@section('judul', 'Kelola User')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container card">
                <div class="card-header">
                    <h4 class="card-title">Daftar User Aktif</h4>
                    <h5 class="card-category mt-2">Penduduk yang telah registrasi</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="text-primary">
                                <th><b>Nama Lengkap</b></th>
                                <th><b>Rt/Rw</b></th>
                                <th><b>Surat Ajuan</b></th>
                                <th class="text-right"><b>Opsi</b></th> 
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                @if ($user->status_verifikasi == 1)
                                    <tr>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->rt->no }}/{{ $user->rw->no }}</td>
                                        <td>
                                            @if (count($user->ajuans) != 0)
                                                @foreach ($user->ajuans as $aj)
                                                    <a href="{{ route('antrian.edit', $aj->id) }}">{{ $aj->jenis }}</a>,
                                                @endforeach
                                            @else
                                            -
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('user.show', $user->id) }}" class="badge badge-info">Lihat</a>
                                        </td>
                                    </tr>
                                @else
                                
                            @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container">
                    {{$users->links()}} 
                </div>
            </div>
            <div class="container card">
                <div class="card-header">
                    <h4 class="card-title">Daftar User Non-Aktif</h4>
                    <h5 class="card-category mt-2">Penduduk yang belum terverifikasi</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="text-primary">
                                <th><b>Nama Lengkap</b></th>
                                <th><b>NIK</b></th>
                                <th><b>NO KK</b></th>
                                <th><b>Rt/Rw</b></th>
                                <th class="text-right"><b>Opsi</b></th> 
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                @if ($user->status_verifikasi == 0)
                                    <tr>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->nik }}</td>
                                        <td>{{ $user->no_kk }}</td>
                                        <td>{{ $user->rt->no }}/{{ $user->rw->no }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('user.show', $user->id) }}" class="badge badge-info">Lihat</a>
                                        </td>
                                    </tr>
                                @else
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container">
                    {{$users->links()}} 
                </div>
            </div>
        </div>
    </div>
@endsection