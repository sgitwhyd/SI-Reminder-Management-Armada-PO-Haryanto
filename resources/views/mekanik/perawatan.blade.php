@extends('layouts.main')
@include('sidebar.menu_mekanik')

@section('content')
<a href="/mekanik/tambah-perawatan" class="btn btn-primary mb-3">
  + Perawatan
</a>
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
          <th>
            Status
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $index => $value)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $value->armada->no_lambung }}</td>
          <td>{{ $value->tanggal }}</td>
          <td>{{ number_format((float)$value->oli_gardan, 0, '.') }} KM</td>
          <td>{{ number_format((float)$value->oli_mesin, 0, '.') }} KM</td>
          <td>{{ number_format((float)$value->oli_transmisi, 0, '.') }} KM</td>
          <td>
            @if($value->status == 'selesai')
            <span class="badge badge-success">Selesai</span>
            @else
            <span class="badge badge-warning">Belum Selesai</span>
            @endif
          </td>
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