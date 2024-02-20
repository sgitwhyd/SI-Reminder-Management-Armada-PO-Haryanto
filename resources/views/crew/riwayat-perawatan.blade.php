@extends('layouts.main')
@include('sidebar.menu_crew')

@section('content')
<div class="row">
  <div class="col-12 mt-5">
    <h1>
      Riwayat Perawatan
    </h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>
            Tanggal
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
        @foreach($data as $index => $item)
        <tr>
          <td>
            {{ $item->tanggal }}
          </td>
          <td>
            {{ $item->oli_gardan }}
          </td>
          <td>
            {{ $item->oli_mesin }}
          </td>
          <td>
            {{ $item->oli_transmisi }}
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