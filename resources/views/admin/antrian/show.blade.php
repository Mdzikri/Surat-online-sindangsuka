@extends('layouts.admin.bar')
@section('judul', 'Detail Ajuan Surat')
@section('content')
<div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Nama Pengaju :</label>
  <div class="col-sm-10">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $ajuan->user->nama }}">
  </div>
</div>
<div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Nama :</label>
  <div class="col-sm-10">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $ajuan->user->nama }}">
  </div>
</div>
@endsection