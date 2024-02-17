@extends('layouts.main')

@section('content')
   <div class="row justify-content-center">
      <div class="col-12">
         <h2 class="mb-2 page-title">Data Sparepart</h2>
         <p class="card-text">Mencakup data stok dan status sparepart</p>
         <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#addSparepart"><i class="fe fe-plus"></i> Tambah</button>
         {{-- modal add --}}
         <div class="modal fade" id="addSparepart" tabindex="-1" role="dialog" aria-labelledby="addSparepartTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="addSparepartTitle">Tambah Sparepart</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <form action="" id="sparepart-add" method="">
                     <input type="hidden" name="postId" id="postId">
                     <div class="modal-body">
                        <div class="form-group">
                           <label for="nama_sp">Nama Sparepart</label>
                           <input type="text" class="form-control" id="nama_sp" name="nama_sp">
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="no_sp">No. Sparepart</label>
                              <input type="text" class="form-control" id="no_sp" name="no_sp">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="stock">Stock</label>
                              <input type="text" class="form-control" id="stock" name="stock">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="status">Status</label>
                           <select class="form-control select-status" id="status" name="status" tabindex="-1">
                              @foreach ($status_sp as $key => $value)
                                 <option value="{{ $value }}">{{$value}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn mb-2 btn-primary">Save data</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
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
                     <table class="table datatables" id="datasparepart">
                        <thead>
                        <tr>
                           <th>#</th>
                           <th>No. Sparepart</th>
                           <th>Nama Sparepart</th>
                           <th>Stock</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list_sparepart as $key => $value)
                        <tr>
                           <td>{{($key+1)}}</td>
                           <td>{{ $value['no_sp'] }}</td>
                           <td>{{ $value['nama_sp'] }}</td>
                           <td>{{ $value['stock'] }}</td>
                           <td>{{ $value['status'] }}</td>
                           <td>
                              <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <button type="button" class="dropdown-item edit-sparepart" data-id="{{$value['id_sp']}}">Edit</button>
                                 <button type="button" class="dropdown-item delete-sparepart" data-id="{{$value['id_sp']}}">Remove</button>
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
    $('#datasparepart').DataTable({
      autoWidth: true,
      "lengthMenu": [
         [10, 25, 50, -1],
         [10, 25, 50, "All"]
      ]
   });
  
   $('.select-status').select2({
      theme: 'bootstrap4',
   });

   $(document).ready(function() {
      //  Edit post
      $('.edit-sparepart').click(function() {
         var postId = $(this).data('id');
         $.ajax({
            url: 'sparepart/edit',
            type: 'POST',
            data: {
               id: postId,
               _token: '{{ csrf_token() }}'
            },
            success: function(data) {
               // console.log(data)
               $('#postId').val(data['id_sp'])
               $('#nama_sp').val(data['nama_sp'])
               $('#no_sp').val(data['no_sp'])
               $('#stock').val(data['stock'])
               $('#status').val(data['status'])
               $('#addSparepart').modal('show');
            },
            error: function(xhr, status, error) {
               console.error('Error:', error);
            }
         });
      });
      // Save or update post
      $('#sparepart-add').submit(function(e) {
         e.preventDefault();
         var postId = $('#postId').val();
         var no_sp = $('#no_sp').val();
         var nama_sp = $('#nama_sp').val();
         var stock = $('#stock').val();
         var status = $('#status').val();
         var url = postId ? '/sparepart/update' : '/sparepart';
         var method = postId ? 'PUT' : 'POST';

         $.ajax({
            url: url,
            type: method,
            data: {
               id_sp: postId,
               no_sp: no_sp,
               nama_sp: nama_sp,
               stock: stock,
               status: status,
               _token: '{{ csrf_token() }}'
            },
            success: function(data) {
               // successHtml = '<div class="alert alert-success">'+data['message']+'</div>';
               // $('#form-notif').html( successHtml );
               // $('#addSparepart').modal('hide');
               location.reload();
            },
            error: function(data) {
               var result = data.responseJSON;
               errorsHtml = '<div class="alert alert-danger"><ul>';
               $.each( result.errors, function( key, value ) {
                     errorsHtml += '<li>'+ value[0] + '</li>';
               });
               errorsHtml += '</ul></div>';
               $('#form-notif').html( errorsHtml );
               $('#addSparepart').modal('hide');
            }
         });
      });
      // Delete post
      $('.delete-sparepart').click(function() {
         var postId = $(this).data('id');
         if (confirm('Are you sure you want to delete this post?')) {
               $.ajax({
                  url: 'sparepart/delete/' + postId,
                  type: 'DELETE',
                  data: {
                     _token: '{{ csrf_token() }}'
                  },
                  success: function(data) {
                     location.reload();
                  },
                  error: function(xhr, status, error) {
                     console.error('Error:', error);
                  }
               });
         }
      });

      $('#addSparepart').on('hidden.bs.modal', function () {
         $('#postId').val('')
         $('#no_sp').val('')
         $('#nama_sp').val('')
         $('#stock').val('')
         $('#status').val('')
      });
   });
  </script>
  
@endsection

