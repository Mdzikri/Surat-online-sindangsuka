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
                            <h4 class="card-title">Antrian Pengajuan</h4>

                            <div class="dropdown show">
                              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Daftar Surat
                              </a>
                            
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('skck.create') }}">
                                    SKCK
                                </a>
                                <a class="dropdown-item" href="{{ route('sktm.create') }}">
                                    SKTM
                                </a>
                                <a class="dropdown-item" href="{{ route('sd.create') }}">
                                    Surat Domisili
                                </a>
                                <a class="dropdown-item" href="{{ route('sk.create') }}">
                                    Surat Kematian
                                </a>
                                <a class="dropdown-item" href="{{ route('sku.create') }}">
                                    Surat Keterangan Usaha
                                </a>
                                <a class="dropdown-item" href="{{ route('sktb.create') }}">
                                    SKTB
                                </a>
                                <a class="dropdown-item" href="{{ route('belumMenikah.create') }}">
                                    Surat Keterangan Belum Menikah
                                </a>
                                <a class="dropdown-item" href="{{ route('sku.create') }}">
                                    Surat Keterangan Beda Nama
                                </a>
                                <a class="dropdown-item" href="{{ route('mohonKtp.create') }}">
                                    Formulir Permohonan KTP
                                </a>
                              </div>
                            </div>

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
                            @if ()
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
                            @endif
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