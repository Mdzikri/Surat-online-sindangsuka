@extends('layouts.admin.bar')
@section('judul', 'Daftar Antrian Persetujuan Surat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-category mt-2">Daftar surat antrian yang pernah di acc atau di tolak:</h5>
                            <h4 class="card-title">Riwayat Surat</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class=" text-primary">
                                <th><b>Pengaju</b></th>
                                <th><b>Surat</b></th>
                                <th><b>Diajukan</b></th>
                                <th><b>Ditolak/Diterima</b></th>
                                <th><b>Status</b></th>
                                {{-- <th><b>Ditindak Oleh</b></th> --}}
                                <th class="text-right"><b>Opsi</b></th>
                            </thead>
                            <tbody>
                            @role('admin')
                                @foreach ($riwayat as $surat)
                                    @if ($surat->user->rt->no == Auth::user()->rt->no)
                                        <tr>
                                            <td>{{ $surat->user->nama }}</td>
                                            <td>{{ $surat->jenis }}</td>
                                            <td>{{ $surat->created_at->format('d M Y') }}</td>
                                            <td>{{ $surat->updated_at->format('d M Y') }}</td>
                                            <td>
                                                @if ($surat->acc == 1)
                                                    <span class="text-success"><b>Diterima</b></span>
                                                @elseif ($surat->acc == 2)
                                                    <span class="text-danger"><b>Ditolak</b></span>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                @if ($surat->acc == 1)
                                                    <a href="{{ route('adm.lihat', $surat->id) }}" class="badge badge-warning">Lihat</a>
                                                @elseif ($surat->acc == 2)
                                                    <a href="" class="badge badge-warning">Lihat</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endrole
                            @role('superadmin')
                                @foreach ($riwayat as $surat)
                                <tr>
                                    <td>{{ $surat->user->nama }}</td>
                                    <td>{{ $surat->jenis }}</td>
                                    <td>{{ $surat->created_at->format('d M Y') }}</td>
                                    <td>{{ $surat->updated_at->format('d M Y') }}</td>
                                    <td>
                                        @if ($surat->acc == 1)
                                            <span class="text-success"><b>Diterima</b></span>
                                        @elseif ($surat->acc == 2)
                                            <span class="text-danger"><b>Ditolak</b></span>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $surat->penindak }}</td> --}}
                                    <td class="text-right">
                                        @if ($surat->acc == 1)
                                            <a href="{{ route('adm.lihat', $surat->id) }}" class="badge badge-warning">Lihat</a>
                                        @elseif ($surat->acc == 2)
                                            <a href="" class="badge badge-warning">Lihat</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @endrole
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="container">
                    {{$riwayat->links()}} 
                </div> --}}
            </div>
        </div>
    </div>
@endsection