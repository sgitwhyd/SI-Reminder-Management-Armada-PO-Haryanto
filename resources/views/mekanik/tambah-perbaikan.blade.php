@extends('layouts.main')
@include('sidebar.menu_mekanik')

@section('content')
<h1>
  Tambah Perbaikan
</h1>

<div class="col-md-6 col-sm-12">
  <div class="card shadow">
    <div class="card-body">
      <form action="{{ route('mekanik.tambah-perbaikan') }}" method="POST">
        @method('POST')
        @csrf
        <div class="form-group mb-3">
          <label for="armada">Pilih Armada</label>
          <select name="id_armada" id="armada" class="custom-select">
            @foreach($data as $armada)
            <option value="{{ $armada->id }}">{{ $armada->no_lambung }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="tanggal">Tanggal Perbaikan</label>
          <input type="date" name="tanggal" id="tanggal" class="form-control">
        </div>
        <div class="form-group mb-3">
          <label for="spareparts">Suku Cadang</label>
          <select name="spareparts[]" id="spareparts" class="custom-select" multiple>
            @foreach($spareparts as $sparepart)
            <option value="{{ $sparepart->id }}">{{ $sparepart->nama_sparepart }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="keterangan">
            Keterangan
          </label>
          <textarea class="form-control" name="keterangan" id="keterangan" rows="4"></textarea>
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
  $('#spareparts').select2({
    placeholder: "Pilih suku cadang",
    allowClear: true,
    theme: 'bootstrap4'
  });
});
</script>

@endsection