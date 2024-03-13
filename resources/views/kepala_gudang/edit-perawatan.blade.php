@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<h1>
  Edit Perawatan
</h1>

<div class="col-12">
  <div class="card shadow">
    <div class="card-body">
      <form action="{{ route('kepala_gudang.update-perawatan') }}" enctype="multipart/form-data" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="id_perawatan" value="{{$perawatan->id}}">
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
        <div class="form-group mb-3">
          <label for="oli_gardan">
            Oli Gardan
          </label>
          <input type="date" name="oli_gardan" id="oli_gardan" class="form-control">
        </div>
        <div class="form-group mb-3">
          <label for="oli_mesin">
            Oli Mesin
          </label>
          <input type="date" class="form-control" name="oli_mesin" id="oli_mesin" placeholder="Oli Gardan"
            aria-label="Oli Gardan">
        </div>
        <div class="form-group mb-3">
          <label for="oli_transmisi">
            Oli Transmisi
          </label>
          <input type="date" name="oli_transmisi" id="oli_transmisi" class="form-control">
        </div>
        <div class="form-group d-flex flex-column">
          <label for="ttd_kepala_gudang">Tertanda Kepala Gudang</label>
          <img src="{{ asset('storage/' . $perawatan->ttd_kepala_gudang) }}" width="100" alt="" srcset="">
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

  $('#armada').val('{{$perawatan->id_armada}}').trigger('change');
  $('#tanggal').val('{{$perawatan->tanggal}}');
  $('#oli_gardan').val('{{$perawatan->oli_gardan}}');
  $('#oli_mesin').val('{{$perawatan->oli_mesin}}');
  $('#oli_transmisi').val('{{$perawatan->oli_transmisi}}');
});
</script>

@endsection