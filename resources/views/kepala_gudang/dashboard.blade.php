@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')
@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    @if($alertPerawatan != null)
    @foreach($alertPerawatan as $item)
    <div class="alert alert-warning" role="alert">
      <span class="fe fe-alert-triangle fe-16 mr-2"></span>Bus <span style="font-weight: 700;">
        {{ $item->armada->no_lambung }}
      </span>, Waktunya Melakukan
      Perawatan
      Berkala, Segera Lakukan
      Perawatan, Terakhir dilakukan pada <span style="font-weight: 700;">
        {{ $item->tanggal }}
      </span>
    </div>
    @endforeach
    @else
    <div class="alert alert-success" role="alert">
      <span class="fe fe-check-circle fe-16 mr-2"></span>Semua Bus Sedang Dalam
      Kondisi Baik
    </div>
    @endif
  </div>
</div> <!-- .row -->
@endsection

@section('script')


@endsection