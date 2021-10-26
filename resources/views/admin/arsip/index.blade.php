@extends('layouts.admin.bar')
@section('judul', 'Arsip')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container card">
                <div class="card-header mx-4">
                    <div class="d-flex justify-content-between">
                        <h2 class="card-title">Arsip Surat</h2>
                        <a type="button" class="btn btn-primary" href="{{ route('arsip.laporan') }}">Download Laporan</a>
                    </div>
                    <h5 class="card-category mt-2">Daftar Surat yang telah disetujui:</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered">
                            <thead class="text-primary">
                                <th><b>Pengaju</b></th>
                                <th><b>Surat</b></th>
                                <th><b>Nomor Surat</b></th>
                                <th><b>Tanggal Ajuan</b></th>
                                <th><b>Tanggal Acc</b></th>
                                <th class="text-right" width="15%"><b>Opsi</b></th>
                            </thead>
                            <tbody>
                            @foreach ($arsip as $a)
                            <tr>
                                <td>{{ $a->user->nama }}</td>
                                <td>{{ $a->jenis }}</td>
                                <td>{{ $a->nosurat }}</td>
                                <td>{{ $a->created_at->format('d M Y') }}</td>
                                <td>{{ $a->updated_at->format('d M Y') }}</td>
                                <td class="text-right">
                                    <a href="{{ route('adm.lihat', $a->id) }}" class="badge badge-warning">Lihat</a>
                                    <a href="{{ route('adm.download', $a->id) }}" class="badge badge-success">Download</a>
                                    {{-- <a href="{{ route('adm.download', $a->id) }}" class="badge badge-danger">Hapus</a> --}}
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
@endsection