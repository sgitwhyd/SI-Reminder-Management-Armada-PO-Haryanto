@extends('layouts.main')
@include('sidebar.menu_crew')

@section('content')
<div class="row">
  <div class="col-12">
    @if($alertPerawatan)
    <div class="alert alert-warning" role="alert">
      <span class="fe fe-alert-triangle fe-16 mr-2"></span> Waktunya Melakukan Perawatan Berkala, Segera Lakukan
      Perawatan, Terakhir dilakukan pada {{ $alertPerawatan->tanggal }}
    </div>
    @endif
    <div class="row">
      <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-0">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-3 text-center">
                <span class="circle circle-sm bg-primary">
                  <i class="fe fe-16 fe-shopping-cart text-white mb-0"></i>
                </span>
              </div>
              <div class="col pr-0">
                <p class="small text-muted mb-0">Nomor Lambung</p>
                <span class="h3 mb-0">
                  {{ $dataBus->no_lambung }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end section -->
  </div>
  <div class="col-12">
    <h1>
      Detail Armada
    </h1>
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <div class="d-flex flex-column mb-3">
          <strong>Nomor Lambung</strong>
          <span>
            {{ $dataBus->no_lambung }}
          </span>
        </div>
        <div class="d-flex flex-column mb-3">
          <strong>Nomor Polisi</strong>
          <span>
            {{ $dataBus->no_polisi }}
          </span>
        </div>
        <div class="d-flex flex-column mb-3">
          <strong>
            Trayek
          </strong>
          <span>
            {{ $dataBus->trayek }}
          </span>
        </div>
        <div class="d-flex flex-column mb-3">
          <strong>
            Crew
          </strong>
          <span>
            Pak Budi, Pak Joko, Pak Agus
          </span>
        </div>
      </div>
      <div class="col-md-6 col-sm-12">
        <div class="d-flex flex-column mb-3">
          <strong>
            Foto Armada
          </strong>
          <img src="{{ $dataBus->gambar_armada }}" alt="Foto Armada" width="200">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')


@endsection