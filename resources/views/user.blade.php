@extends('layouts.main')

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
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="username">Username</label>
                              <input type="text" class="form-control" id="username" name="username">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="email">Email</label>
                              <input type="text" class="form-control" id="email" name="email">
                           </div>
                        </div>
                        <div class="input-group mb-3">
                           <div class="input-group-append">
                              <button class="btn btn-primary" title="generate password" type="button" id="generate-pass" onClick="generatePassword(8)"><i class="fe fe-repeat"></i></button>
                           </div>
                           <input type="text" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                        <hr class="my-3">
                        <div class="custom-control custom-switch">
                           <input type="checkbox" class="custom-control-input" name="adminRole" id="adminRole" value="ADMIN">
                           <label class="custom-control-label" for="adminRole">Switch account to administrator</label>
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
            <!-- Small table -->
            <div class="col-md-12">
               <div class="card shadow">
                  <div class="card-body">
                     <!-- table -->
                     <table class="table datatables" id="datauser">
                        <thead>
                        <tr>
                           <th>#</th>
                           <th>Nama</th>
                           <th>Username</th>
                           <th>Email</th>
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
                              <td>{{ $value['email'] }}</td>
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
               // console.log(data)
               $('#postId').val(data['id_user'])
               $('#full_name').val(data['full_name'])
               $('#username').val(data['username'])
               $('#email').val(data['email'])
               if(data['role'] == 'ADMIN'){
                  $('#adminRole').prop('checked', true);
               } else {
                  $('#adminRole').prop('checked', false);
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
         var email = $('#email').val();
         var password = $('#password').val();
         var role = $('#adminRole').is(':checked') ? 'ADMIN' : 'USER';
         var url = postId ? '/user/update' : '/user';
         var method = postId ? 'PUT' : 'POST';

         $.ajax({
            url: url,
            type: method,
            data: {
               id_user: postId,
               full_name: full_name,
               username: username,
               email: email,
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
                  url: '/delete/' + postId,
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

