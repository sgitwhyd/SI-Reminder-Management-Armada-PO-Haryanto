@extends('layouts.main')
@include('sidebar.menu_mekanik')

@section('content')
<h2 class="mb-2 page-title">Data Perbaikan</h2>
<p class="card-text">Mencakup data perbaikan tiap-tiap armada</p>
<div class="card shadow">
  <div class="card-body">
    <table class="table datatables" id="dataPerbaikan">
      <thead>
        <tr>
          <th>#</th>
          <th>
            Armada/No. Lambung
          </th>
          <th>
            Tanggal Perbaikan
          </th>
          <th>
            Suku Cadang
          </th>
          <th>
            Biaya
          </th>
          <th>
            Keterangan
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $index => $value)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $value->armada->no_lambung }}</td>
          <td>
            {{ $value->tanggal }}
          </td>
          <td>
            @if($value->spareparts->isEmpty())
            -
            @else
            @foreach($value->spareparts as $sparepart)
            {{ $sparepart->nama_sparepart  }}, <br>
            @endforeach
            @endif
          </td>
          <td>
            @php
            $total = 0;
            @endphp
            @foreach($value->spareparts as $sparepart)
            @php
            $total += $sparepart->harga;
            @endphp
            @endforeach
            Rp. {{ number_format($total, 0,0) }}
          </td>
          <td>{{ $value->keterangan }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('script')

<script>
$('#dataPerbaikan').DataTable({
  autoWidth: true,
  "lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "All"]
  ]
});
</script>

@endsection