@extends('layouts.main')

@section('content')
   <div class="row justify-content-center">
      <div class="col-12">
         <h2 class="mb-2 page-title">Form Perawatan</h2>
         <p class="card-text">Lakukan perawatan rutin sesuai SOP, untuk kenyamanan dan pengoptimalan armada.</p>
         {{-- form cek start --}}
         <form action="" method="post">
            <div class="row my-4">
               <div class="col-md-12">
                  <div class="card shadow">
                     <div class="card-header">
                        <strong class="cart-title">Data Pemeriksaan</strong>
                     </div>
                     <div class="card-body">
                        <div class="form-row mb-3">
                           <div class="col-md-6 mb-3">
                              <label for="tgl_perawatan">Tgl Perawatan</label>
                              <div class="input-group">
                                 <input type="text" class="form-control drgpicker" id="tgl_perawatan" name="tgl_perawatan">
                                 <div class="input-group-append">
                                    <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16 mx-1"></span></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label>Lokasi Perawatan</label>
                              <div class="form-row">
                                 <div class="form-group col-md-4">
                                    <div class="custom-control custom-radio mb-3">
                                       <input type="radio" class="custom-control-input" value="terminal" id="terminal" name="lokasi">
                                       <label class="custom-control-label" for="terminal">Terminal</label>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <div class="custom-control custom-radio mb-3">
                                       <input type="radio" class="custom-control-input" value="pool" id="pool" name="lokasi">
                                       <label class="custom-control-label" for="pool">Pool</label>
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <div class="custom-control custom-radio mb-3">
                                       <input type="radio" class="custom-control-input" value="other" id="other" name="lokasi">
                                       <label class="custom-control-label" for="other">Lainnya</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="card shadow">
                     <div class="card-header">
                        <strong class="cart-title">
                           Unsur Administrasi
                        </strong>
                     </div>
                     <div class="card-body">
                        
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="card shadow">
                     <div class="card-header">
                        <strong class="cart-title">
                           Unsur Teknis Utama
                        </strong>
                     </div>
                     <div class="card-body">
                        
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="card shadow">
                     <div class="card-header">
                        <strong class="cart-title">
                           Unsur Teknis Penunjang
                        </strong>
                     </div>
                     <div class="card-body">
                        
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="card shadow">
                     <div class="card-header">
                        <strong class="cart-title">
                           Kesimpulan
                        </strong>
                     </div>
                     <div class="card-body">
                        
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>

   <form action="{{'/perawatan'}}" method="post">
   @csrf
    <div class="custom-control custom-checkbox mb-3">
      <input type="checkbox" class="custom-control-input" id="customControlValidation1" name="customControlValidation1">
      <label class="custom-control-label" for="customControlValidation1">Check this custom
        checkbox1</label>
    </div>
    <div class="custom-control custom-checkbox mb-3">
      <input type="checkbox" class="custom-control-input" id="customControlValidation2" name="customControlValidation2">
      <label class="custom-control-label" for="customControlValidation2">Check this custom
        checkbox2</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="customControlValidation22" name="radio-stacked" required="">
      <label class="custom-control-label" for="customControlValidation22">Card</label>
      <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
    </div>
   <button type="submit">check</button>
   </form>

  

@endsection

@section('script')
  
@endsection

