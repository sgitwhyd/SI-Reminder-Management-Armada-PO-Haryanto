@extends('layouts.main')
@include('sidebar.menu_crew')

@section('content')
<div class="row">
  <div class="col-12 mt-5">
    <h1>
      Riwayat Perbaikan
    </h1>
    <table class="table table-hover">
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
          <th>
            Status
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
          <td>
            {{ $item->status }}
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    {{ $data->links() }}
  </div>
</div>
@endsection

@section('script')


@endsection