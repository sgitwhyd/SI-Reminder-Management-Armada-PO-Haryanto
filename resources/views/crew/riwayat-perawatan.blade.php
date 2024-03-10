@extends('layouts.main')
@include('sidebar.menu_crew')

@section('content')
<div class="row">
  <div class="col-12 mt-5">
    <h1>
      Riwayat Perawatan
    </h1>
    <div class="card shadow">
      <div class="card-body">
        <table class="table" id="dataPerawatan">
          <thead>
            <tr>
              <th>
                Tanggal
              </th>
              <th>
                Oli Gardan
              </th>
              <th>
                Oli Transmisi
              </th>
              <th>
                Oli Mesin
              </th>
              <th>
                Tanda Tangan Kepala Gudang
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $index => $item)
            <tr>
              <td>
                {{ $item->tanggal }}
              </td>
              <td>{{ $item->oli_gardan }} </td>
              <td>{{ $item->oli_mesin }} </td>
              <td>{{ $item->oli_transmisi }} </td>
              <td>
                <img src="{{ asset('storage/' . $item->ttd_kepala_gudang) }}" alt="ttd_kepala_gudang" width="100">
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
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