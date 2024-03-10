@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<h1>
  Riwayat Sparepart
</h1>

<div class="card shadow">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table " id="dataRiwayatSparepart" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Sparepart</th>
            <th>Nama Sparepart</th>
            <th>Total Digunakan</th>
            <th>Stock</th>
            <th>
              Detail
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $sparepart)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sparepart->kode_sparepart }}</td>
            <td>{{ $sparepart->nama_sparepart }}</td>
            <td>{{ $sparepart->total_used }}</td>
            <td>{{ $sparepart->stock }}</td>
            <td>
              <a href="riwayat/{{ $sparepart->id }}">
                Detail
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

@section('script')

<script>
$(document).ready(function() {
  $('#dataRiwayatSparepart').DataTable({
    autoWidth: true,
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ]
  });
});
</script>

@endsection