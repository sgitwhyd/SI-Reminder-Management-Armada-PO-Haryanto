@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
   <div class="row justify-content-center">
      <div class="col-12">
         <h2 class="mb-2 page-title">Data User</h2>
         <p class="card-text">Mencakup data autentifikasi user dan akses user</p>
         <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#addUser"><i class="fe fe-plus"></i> Tambah</button>
         {{-- modal add --}}
         <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="addUserTitle">Tambah User</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <form action="" id="user-add" method="">
                     <input type="hidden" name="postId" id="postId">
                     <div class="modal-body">
                        <div class="form-group">
                           <label for="full_name">Nama lengkap</label>
                           <input type="text" class="form-control" id="full_name" name="full_name">
                        </div>
                        <div class="form-group">
                           <label for="username">Username</label>
                           <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="input-group mb-3">
                           <div class="input-group-append">
                              <button class="btn btn-primary" title="generate password" type="button" id="generate-pass" onClick="generatePassword(8)"><i class="fe fe-repeat"></i></button>
                           </div>
                           <input type="text" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                        <hr class="my-3">
                        <div class="mb-2">
                           <p class="mb-2">Akses User</p>
                           <div class="form-row">
                              <div class="col-md-4">
                                 <div class="custom-control custom-radio mb-3">
                                    <input type="radio" class="custom-control-input" id="kepala_gudang" value="KEPALA GUDANG" name="role" required>
                                    <label class="custom-control-label" for="kepala_gudang">Kepala Gudang</label>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="custom-control custom-radio mb-3">
                                    <input type="radio" class="custom-control-input" id="mekanik" value="MEKANIK" name="role" required>
                                    <label class="custom-control-label" for="mekanik">Mekanik</label>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="custom-control custom-radio mb-3">
                                    <input type="radio" class="custom-control-input" id="crew" value="CREW"name="role" required>
                                    <label class="custom-control-label" for="crew">Crew</label>
                                 </div>
                              </div>
                           </div>
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
                     <table class="table datatables" id="datauser">
                        <thead>
                        <tr>
                           <th>#</th>
                           <th>Nama</th>
                           <th>Username</th>
                           <th>Role</th>
                           <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                           @foreach($users as $key => $value)
                           <tr>
                              <td>{{($key+1)}}</td>
                              <td>{{ $value['full_name'] }}</td>
                              <td>{{ $value['username'] }}</td>
                              <td>{{ $value['role'] }}</td>
                              <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-right">
                                    <button type="button" class="dropdown-item edit-user" data-id="{{$value['id_user']}}">Edit</button>
                                    <button type="button" class="dropdown-item delete-user" data-id="{{$value['id_user']}}">Remove</button>
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
   $('#datauser').DataTable({
      autoWidth: true,
      "lengthMenu": [
         [10, 25, 50, -1],
         [10, 25, 50, "All"]
      ]
   });

   $('.select-trayek').select2({
      theme: 'bootstrap4',
   });

   function generatePassword(length) {
      let result = '';
      const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
      const charactersLength = characters.length;
      let counter = 0;
      while (counter < length) {
         result += characters.charAt(Math.floor(Math.random() * charactersLength));
         counter += 1;
      }
      return $('#user-add #password').val(result);
   }

   $(document).ready(function() {
      //  Edit post
      $('.edit-user').click(function() {
         var postId = $(this).data('id');
         $.ajax({
            url: 'user/edit',
            type: 'post',
            data: {
               id: postId,
               _token: '{{ csrf_token() }}'
            },
            success: function(data) {
               $('#postId').val(data['id_user'])
               $('#full_name').val(data['full_name'])
               $('#username').val(data['username'])
               if(data['role'] == 'KEPALA GUDANG'){
                  $('#kepala_gudang').prop('checked', true);
               } else if (data['role'] == 'MEKANIK'){
                  $('#mekanik').prop('checked', true);
               } else if (data['role'] == 'CREW'){
                  $('#crew').prop('checked', true);
               }
               $('#addUser').modal('show');
            },
            error: function(xhr, status, error) {
               console.error('Error:', error);
            }
         });
      });
      // Save or update post
      $('#user-add').submit(function(e) {
         e.preventDefault();
         var postId = $('#postId').val();
         var full_name = $('#full_name').val();
         var username = $('#username').val();
         var password = $('#password').val();
         var role;
         if($('#kepala_gudang').is(':checked')) role = 'KEPALA GUDANG';
         if($('#mekanik').is(':checked')) role = 'MEKANIK';
         if($('#crew').is(':checked')) role = 'CREW';
         var url = postId ? 'user/update' : 'user';
         var method = postId ? 'PUT' : 'POST';

         $.ajax({
            url: url,
            type: method,
            data: {
               id_user: postId,
               full_name: full_name,
               username: username,
               password: password,
               role: role,
               _token: '{{ csrf_token() }}'
            },
            success: function(data) {
               // successHtml = '<div class="alert alert-success">'+data['message']+'</div>';
               // $('#form-notif').html( successHtml );
               // $('#adduser').modal('hide');
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
               $('#adduser').modal('hide');
            }
         });
      });
      // Delete post
      $('.delete-user').click(function() {
         var postId = $(this).data('id');
         if (confirm('Apakah anda yakin ingin menghapus user?')) {
            $.ajax({
               url: 'user/delete/' + postId,
               type: 'DELETE',
               data: {
                  _token: '{{ csrf_token() }}'
               },
               success: function(data) {
                  console.log(data);
                  location.reload();
               },
               error: function(xhr, status, error) {
                  console.error('Error:', error);
               }
            });
         }
      });

      $('#adduser').on('hidden.bs.modal', function () {
         $('#postId').val('')
         $('#username').val('')
         $('#full_name').val('')
         $('#email').val('')
         $('#password').val('')
      });
   });
  </script>
  
@endsection

