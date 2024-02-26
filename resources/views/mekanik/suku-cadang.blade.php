@extends('layouts.main')
@include('sidebar.menu_mekanik')

@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    <h2 class="mb-2 page-title">Data Sparepart</h2>
    <p class="card-text">Mencakup data stok dan status sparepart</p>
    <div class="row my-4">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-body">
            <table class="table datatables" id="datasparepart">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Sparepart</th>
                  <th>Nama Sparepart</th>
                  <th>Harga</th>
                  <th>Stock</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $key => $sparepart)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $sparepart->kode_sparepart }}</td>
                  <td>{{ $sparepart->nama_sparepart }}</td>
                  <td>
                    Rp. {{ number_format($sparepart->harga, 0, ',', '.') }}
                  </td>
                  <td>{{ $sparepart->stock }}</td>
                  <td>{{ $sparepart->status }}</td>
                  <td>{{ $sparepart->keterangan }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
$('#datasparepart').DataTable({
  autoWidth: true,
  "lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "All"]
  ]
});
</script>

@endsection