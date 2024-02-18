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
                        <th>Kode</th>
                        <th>Tgl Perawatan</th>
                        <th>Lokasi</th>
                        <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1.</td>
                           <td>PWT-001</td>
                           <td>12-02-2024</td>
                           <td>Pool</td>
                           <td>
                              <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <button type="button" class="dropdown-item">Edit</button>
                                 <button type="button" class="dropdown-item">Remove</button>
                              </div>
                           </td>
                        </tr>
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

