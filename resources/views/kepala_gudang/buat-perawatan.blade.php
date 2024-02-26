@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<h1>
  Tambah Perawatan
</h1>

<div class="col-12">
  <div class="card shadow">
    <div class="card-body">
      <form action="{{ route('kepala_gudang.buat-perawatan') }}" enctype="multipart/form-data" method="POST">
        @method('POST')
        @csrf
        <div class="form-group mb-3 d-flex flex-column">
          <label for="armada">Pilih Armada</label>
          <select name="id_armada" id="armada" class="custom-select" style="width: 100%;">
            @foreach($data_armada as $armada)
            <option value="{{ $armada->id }}">{{ $armada->no_lambung }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="tanggal">Tanggal Perawatan</label>
          <input type="date" name="tanggal" id="tanggal" class="form-control">
        </div>
        <div class="input-group mb-3 d-flex flex-column">
          <label for="oli_gardan">
            Oli Gardan
          </label>
          <div class="d-flex">
            <input type="text" class="form-control" name="oli_gardan" id="oli_gardan" placeholder="Oli Gardan"
              aria-label="Oli Gardan">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">KM</span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 d-flex flex-column">
          <label for="oli_mesin">
            Oli Mesin
          </label>
          <div class="d-flex">
            <input type="text" class="form-control" name="oli_mesin" id="oli_mesin" placeholder="Oli Gardan"
              aria-label="Oli Gardan">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">KM</span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 d-flex flex-column">
          <label for="oli_transmisi">
            Oli Transmisi
          </label>
          <div class="d-flex">
            <input type="text" class="form-control" name="oli_transmisi" id="oli_transmisi" placeholder="Oli Gardan"
              aria-label="Oli Gardan">
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">KM</span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="ttd_kepala_gudang">Tertanda Kepala Gudang</label>
          <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" id="ttd_kepala_gudang" name="ttd_kepala_gudang">
            <label class="custom-file-label" for="ttd_kepala_gudang">Choose file...</label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>

@endsection
@section('script')

<script>
$(document).ready(function() {
  $('#armada').select2({
    theme: 'bootstrap4',
    placeholder: 'Pilih Armada'
  });

  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
});
</script>

@endsection