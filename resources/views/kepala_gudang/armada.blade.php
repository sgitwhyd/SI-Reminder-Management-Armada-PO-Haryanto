@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')

   <div class="row justify-content-center">
      <div class="col-12">
         <h2 class="mb-2 page-title">Data Armada</h2>
         <p class="card-text">Mencakup data surat kendaraan dan kesedian armada</p>
         <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#addArmada"><i class="fe fe-plus"></i> Tambah</button>
         {{-- modal add --}}
         <div class="modal fade" id="addArmada" tabindex="-1" role="dialog" aria-labelledby="addArmadaTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="addArmadaTitle">Tambah Armada</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                  </div>
                  <form action="" id="armada-add" method="" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="postId" id="postId">
                     <div class="modal-body">
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="no_polisi">No. Polisi</label>
                              <input type="text" class="form-control" id="no_polisi" name="no_polisi">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="no_stnk">No. STNK</label>
                              <input type="text" class="form-control" id="no_stnk" name="no_stnk">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="no_lambung">No. Lambung</label>
                              <input type="text" class="form-control" id="no_lambung" name="no_lambung">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="tahun">Tahun</label>
                              <input type="number" class="form-control" id="tahun" name="tahun">
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="trayek">Trayek</label>
                              <input type="text" class="form-control" id="trayek" name="trayek">
                           </div>
                           <div class="form-group col-md-6 d-flex flex-column">
                              <label for="jenis_trayek">Jenis Trayek</label>
                              <select class="form-control select-trayek" id="jenis_trayek" name="jenis_trayek" tabindex="-1">
                                 <option value="AKAP">AKAP</option>
                                 <option value="AKDP">AKDP</option>
                                 <option value="MPU">MPU</option>
                                 <option value="PARIWISATA">PARIWISATA</option>
                              </select>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="gambar_armada">Gambar Armada</label>
                           <div class="custom-file mb-3">
                              <input type="file" class="custom-file-input" id="gambar_armada" name="gambar_armada" required="">
                              <label class="custom-file-label" for="gambar_armada">Choose file...</label>
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
            <table class="table datatables" id="dataArmada">
              <thead>
                <tr>
                  <th>#</th>
                  <th>No. Polisi</th>
                  <th>No. Lambung</th>
                  <th>No. STNK</th>
                  <th>Tahun</th>
                  <th>Trayek</th>
                  <th>Jenis Trayek</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list_armada as $key => $value)
                <tr>
                  <td>{{($key+1)}}</td>
                  <td>{{ $value['no_polisi'] }}</td>
                  <td>{{ $value['no_lambung'] }}</td>
                  <td>{{ $value['no_stnk'] }}</td>
                  <td>{{ $value['tahun'] }}</td>
                  <td>{{ $value['trayek'] }}</td>
                  <td>{{ $value['jenis_trayek'] }}</td>
                  <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <button type="button" class="dropdown-item edit-armada" data-id="{{$value['id']}}">Edit</button>
                      <button type="button" class="dropdown-item delete-armada"
                        data-id="{{$value['id']}}">Remove</button>
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
   $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
   });

   $('#dataArmada').DataTable({
      autoWidth: true,
      "lengthMenu": [
         [10, 25, 50, -1],
         [10, 25, 50, "All"]
      ]
   });
  
   $('.select-trayek').select2({
      theme: 'bootstrap4',
   });

   $('.select-trayek').select2({
   theme: 'bootstrap4',
   });

   $(document).ready(function() {
   //  Edit post
   $(document).on('click', '.edit-armada', function() {
      var postId = $(this).data('id');
      $.ajax({
         url: 'armada/edit',
         type: 'post',
         data: {
         id: postId,
         _token: '{{ csrf_token() }}'
         },
         success: function(data) {
         $('#postId').val(data['id'])
         $('#no_polisi').val(data['no_polisi'])
         $('#no_lambung').val(data['no_lambung'])
         $('#no_stnk').val(data['no_stnk'])
         $('#tahun').val(data['tahun'])
         $('#trayek').val(data['trayek'])
         $('#jenis_trayek').val(data['jenis_trayek'])
         $('#addArmada').modal('show');
         },
         error: function(xhr, status, error) {
         console.error('Error:', error);
         }
      });
   });

   // Save or update post
   $('#armada-add').submit(function(e) {
      e.preventDefault();
      var postId = $('#postId').val();
      var no_pol = $('#no_polisi').val();
      var no_lam = $('#no_lambung').val();
      var no_stnk = $('#no_stnk').val();
      var tahun = $('#tahun').val();
      var trayek = $('#trayek').val();
      var jenis_trayek = $('#jenis_trayek').val();
      var gambar_armada = $('#gambar_armada')[0].files[0];
      var url = postId ? 'armada/update' : 'armada';
      var method = postId ? 'PUT' : 'POST';
      var formData = new FormData(this);
      console.log(formData);
      $.ajax({
         url: url,
         type: method,
         data: formData,
         processData: false,
         dataType: "json",
         contentType: false,

         // data: {
         //    id_armada: postId,
         //    no_polisi: no_pol,
         //    no_lambung: no_lam,
         //    no_stnk: no_stnk,
         //    tahun: tahun,
         //    trayek: trayek,
         //    jenis_trayek: jenis_trayek,
         //    gambar_armada: gambar_armada,
         //    _token: '{{ csrf_token() }}'
         // },
         success: function(data) {
         // successHtml = '<div class="alert alert-success">'+data['message']+'</div>';
         // $('#form-notif').html( successHtml );
         // $('#addArmada').modal('hide');
         location.reload();
         },
         error: function(data) {
         var result = data.responseJSON;
         errorsHtml = '<div class="alert alert-danger"><ul>';
         $.each(result.errors, function(key, value) {
            errorsHtml += '<li>' + value[0] + '</li>';
         });
         errorsHtml += '</ul></div>';
         $('#form-notif').html(errorsHtml);
         $('#addArmada').modal('hide');
         }
      });
   });

   // Delete post
   $(document).on('click', '.delete-armada', function() {
      var postId = $(this).data('id');
      if (confirm('Apakah anda yakin untuk menghapus armada?')) {
         $.ajax({
         url: 'armada/delete/' + postId,
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

   $('#addArmada').on('hidden.bs.modal', function () {
      $('#postId').val('')
      $('#no_polisi').val('')
      $('#no_lambung').val('')
      $('#no_stnk').val('')
      $('#tahun').val('')
      $('#trayek').val('')
      $('#jenis_trayek').val('AKAP')
   });
});

</script>
  
@endsection
