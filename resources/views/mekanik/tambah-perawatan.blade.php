@extends('layouts.main')
@include('sidebar.menu_mekanik')

@section('content')
<h1>
  Tambah Perawatan
</h1>

<div class="col-12">
  <div class="card shadow">
    <div class="card-body">
      <form action="{{ route('mekanik.tambah-perawatan') }}" method="POST">
        @method('POST')
        @csrf
        <div class="form-group mb-3 d-flex flex-column">
          <label for="armada">Pilih Armada</label>
          <select name="id_armada" id="armada" class="custom-select" style="width: 100%;">
            @foreach($data as $armada)
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
        <button type="submit" class="btn btn-primary">Tambah Perbaikan</button>
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
});
</script>

@endsection