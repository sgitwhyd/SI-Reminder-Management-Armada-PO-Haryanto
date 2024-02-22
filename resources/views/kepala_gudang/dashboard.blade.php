@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    <div class="row">
      <div class="col-md-6 col-xl-3 mb-4">
        <div class="card shadow border-0">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col-3 text-center">
                <span class="circle circle-sm bg-primary-light">
                  <i class="fe fe-16 fe-shopping-bag text-white mb-0"></i>
                </span>
              </div>
              <div class="col pr-0">
                <p class="small text-muted mb-0">Monthly Sales</p>
                <span class="h3 mb-0 text-white">$1250</span>
                <span class="small text-muted">+5.5%</span>
              </div>
            </div>
          </div>
        </div>
      </div>
        
    </div> <!-- end section -->
  </div>
</div> <!-- .row -->
@endsection

@section('script')


@endsection