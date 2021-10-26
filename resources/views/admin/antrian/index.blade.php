@extends('layouts.admin.bar')
@section('judul', 'Antrian Pengajuan Surat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-category mt-2">Daftar Antrian Pengajuan Surat:</h5>
                            {{-- <h5 class="card-category mt-2">Menunggu Persetujuan:</h5> --}}
                            <h4 class="card-title">Antrian Pengajuan</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class=" text-primary">
                                <th><b>Pengaju</b></th>
                                <th><b>Surat</b></th>
                                <th><b>Tanggal Ajuan</b></th>
                                <th class="text-right"><b>Opsi</b></th>
                            </thead>
                            <tbody>
                            @foreach ($antrian as $surat)
                            <tr>
                                <td>{{ $surat->user->nama }}</td>
                                <td><b>{{ $surat->jenis }}</b></td>
                                <td>{{ $surat->created_at->diffForHumans() }}</td>
                                <td class="text-right">
                                    <a href="{{ route('antrian.edit', $surat->id) }}" class="badge badge-warning">Buka</a>
                                    {{-- <a href="{{ route('antrian.show', $surat->id) }}" class="badge badge-info">Lihat</a> --}}
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container">
                    {{$antrian->links()}} 
                </div>
            </div>
        </div>
    </div>
@endsection