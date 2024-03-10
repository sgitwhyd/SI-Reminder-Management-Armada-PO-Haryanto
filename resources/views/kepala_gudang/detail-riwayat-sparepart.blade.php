@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<div class="col-12">
  <h2 class="mb-2 page-title">Detail Riwayat Penggunaan {{ $sparepart->nama_sparepart }}</h2>
  <div class="card shadow">
    <div class="card-body">
      <table class="table">
        <tr>
          <th>
            Armada
          </th>
          <th>
            Tanggal
          </th>
        </tr>
        @foreach($spareparts as $sparepart)
        <tr>
          <td>{{ $sparepart->no_lambung }}</td>
          <td>{{ $sparepart->tanggal }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>

@endsection

@section('script')


@endsection