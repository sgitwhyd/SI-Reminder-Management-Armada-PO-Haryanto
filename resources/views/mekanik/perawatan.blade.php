@extends('layouts.main')
@include('sidebar.menu_mekanik')

@section('content')
<h2 class="mb-2 page-title">Data Perawatan</h2>
<p class="card-text">Mencakup data perawatan tiap - tiap bus</p>
<div class="card shadow">
  <div class="card-body">
    <table class="table datatables" id="dataPerawatan">
      <thead>
        <tr>
          <th>
            No
          </th>
          <th>
            Armada/No. Lambung
          </th>
          <th>
            Tanggal Periksa
          </th>
          <th>
            Oli Gardan
          </th>
          <th>
            Oli Mesin
          </th>
          <th>
            Oli Transmisi
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $index => $value)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $value->armada->no_lambung }}</td>
          <td>{{ $value->tanggal }}</td>
          <td>{{ $value->oli_gardan }} </td>
          <td>{{ $value->oli_mesin }} </td>
          <td>{{ $value->oli_transmisi }} </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('script')

<script>
$('#dataPerawatan').DataTable({
  autoWidth: true,
  "lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "All"]
  ]
});
</script>

@endsection