@extends('layouts.main')
@include('sidebar.menu_crew')

@section('content')
<div class="row">
  <div class="col-12 mt-5">
    <h1>
      Riwayat Perbaikan
    </h1>
    <div class="card shadow">
      <div class="card-body">
        <table class="table" id="dataPerbaikan">
          <thead>
            <tr>
              <th>
                Tanggal
              </th>
              <th>
                Nama Sparepart
              </th>
              <th>
                Part No,
              </th>
              <th>
                Jumlah
              </th>
              <th>
                Nominal
              </th>
              <th>
                Keterangan
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $index => $item)
            <tr>
              <td>
                {{ $item->created_at }}
              </td>
              <td>
                @foreach($item->spareparts as $sparepart)
                {{ $sparepart->nama_sparepart }}, <br>
                @endforeach
              </td>
              <td>
                @foreach($item->spareparts as $sparepart)
                {{ $sparepart->kode_sparepart }}, <br>
                @endforeach
              </td>
              <td>
                {{ $item->spareparts->count() }}
              </td>
              <td>
                {{ $item->biaya }}
              </td>
              <td>
                {{ $item->keterangan }}
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
$('#dataPerbaikan').DataTable({
  autoWidth: true,
  "lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "All"]
  ]
});
</script>

@endsection