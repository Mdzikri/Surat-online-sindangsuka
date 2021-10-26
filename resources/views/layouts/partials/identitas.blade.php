<div class="identitas col-md-5 mb-4">
  <h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">Data Identitas Pengaju</span>
    <a href="{{ route('edit.profil') }}" class="btn btn-secondary rounded-pill tomboledit">ubah</a>
  </h4>
  <ul class="list-group mb-3 shadow">
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">Nama Lengkap</h6>
      </div>
      <span class="text-muted">{{ Auth::user()->nama }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">NIK</h6>
      </div>
      <span class="text-muted">{{ Auth::user()->nik }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">Tempat, Tanggal Lahir</h6>
      </div>
      <span class="text-muted">{{ Auth::user()->ttl }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">Jenis Kelamin</h6>
      </div>
      <span class="text-muted">{{ Auth::user()->jk }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">Status</h6>
      </div>
      <span class="text-muted">{{ Auth::user()->status }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">Agama</h6>
      </div>
      <span class="text-muted">{{ Auth::user()->agama }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">Pekerjaan</h6>
      </div>
      <span class="text-muted">{{ Auth::user()->pekerjaan }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">Alamat</h6>
      </div>
      <span class="text-muted">{{ Auth::user()->alamat }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
      <div>
        <h6 class="my-0">Kewarganegaraan</h6>
      </div>
      <span class="text-muted">{{ Auth::user()->kewarganegaraan }}</span>
    </li>
  </ul>
</div>