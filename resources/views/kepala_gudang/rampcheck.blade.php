@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    <h2 class="mb-2 page-title">Data Rampcheck</h2>
    <p class="card-text">Mencakup data pengecekan sebelum keberangkatan</p>
    <a href="{{ 'rampcheck/add' }}" class="btn mb-2 btn-primary"><i class="fe fe-plus"></i> Tambah</a>
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
            <table class="table datatables" id="dataRampcheck">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tgl Periksa</th>
                  <th>Petugas</th>
                  <th>No Lambung</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list_rampcheck as $key => $value)
                <tr>
                  <td>
                    {{ $key + 1 }}
                  </td>
                  <td>
                    {{ $value->tgl_rampcheck }}
                  </td>
                  <td>
                    {{ $value->user->full_name }}
                  </td>
                  <td>
                    {{ $value->no_lambung }}
                  </td>
                  <td>
                    @if($value->status == 'PENDING')
                    <span class="badge badge-warning">
                      PENDING
                    </span>
                    @elseif($value->status == 'APPROVE')
                    <span class="badge badge-success">
                      APPROVE
                    </span>
                    @else
                    <span class="badge badge-danger">
                      REJECT
                    </span>
                    @endif
                  </td>
                  <td>
                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a href="{{ 'rampcheck/pdf/'.$value['id_rampcheck'] }}" class="dropdown-item">View</a>
                      <a href="{{'rampcheck/edit/'.$value['id_rampcheck']}}" class="dropdown-item">Konfirmasi</a>
                      <button type="button" class="dropdown-item delete-rampcheck"
                        data-id="{{$value['id_rampcheck']}}">Delete</button>
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
$('#dataRampcheck').DataTable({
  autoWidth: true,
  "lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "All"]
  ]
});

$(document).ready(function() {
  // Delete post
  $(document).on('click', '.delete-rampcheck', function() {
    var postId = $(this).data('id');
    if (confirm('Apakah anda yakin untuk menghapus rampcheck?')) {
      $.ajax({
        url: 'rampcheck/delete/' + postId,
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

})
</script>
@endsection