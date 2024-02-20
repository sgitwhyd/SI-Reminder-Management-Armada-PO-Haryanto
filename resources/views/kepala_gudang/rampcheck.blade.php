@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<div class="row justify-content-center">
   <div class="col-12">
      <h2 class="mb-2 page-title">Data Rampcheck</h2>
      <p class="card-text">Mencakup data pengecekan sebelum keberangkatan</p>
      <a href="{{ 'rampcheck/add' }}" class="btn mb-2 btn-primary" ><i class="fe fe-plus"></i> Tambah</a>
      <div id="form-notif">
         @if(session('success'))
         <div class="alert alert-success">
            <p>{{ session('success') }}</p>
         </div>
         @endif
      </div>
      <div class="row my-4">
         <div class="col-md-12">
            <div class="card shadow">
               <div class="card-body">
                  <table class="table datatables" id="dataPerawatan">
                     <thead>
                     <tr>
                        <th>#</th>
                        <th>Tgl Periksa</th>
                        <th>No Polisi</th>
                        <th>No Lambung</th>
                        <th>Kilometer</th>
                        <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>
                        @foreach($list_rampcheck as $key => $value)
                        <tr>
                           <td>{{($key+1)}}</td>
                           <td>{{$value['tgl_rampcheck']}}</td>
                           <td>{{$value['no_polisi']}}</td>
                           <td>{{$value['no_lambung']}}</td>
                           <td>{{$value['posisi_kilometer']}}</td>
                           <td>
                              <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <button type="button" class="dropdown-item">Edit</button>
                                 <button type="button" class="dropdown-item">Remove</button>
                              </div>
                           </td>
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
   $('#dataPerawatan').DataTable({
      autoWidth: true,
      "lengthMenu": [
         [10, 25, 50, -1],
         [10, 25, 50, "All"]
      ]
   });
</script>
@endsection

