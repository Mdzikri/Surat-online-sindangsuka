@if (session('status'))
<div class="alert {{ session('warna') }} alert-dismissible fade show" role="alert">
  <i>{{ session('status') }}</i>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif