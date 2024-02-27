@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<h2 class="mb-2 page-title">Data Perawatan</h2>
<p class="card-text">Mencakup data perawatan tiap - tiap bus</p>

<a href="/kepala-gudang/perawatan/buat-perawatan" class="btn btn-primary mb-3">
  + Tambah Data Perawatan
</a>

<div class="card shadow">
  <div class="card-body">
    <table class="table datatables" id="dataPerawatan">
      <thead>
        <tr>
          <th>
            No
          </th>
          <th>
            Armada/No. Lambung
          </th>
          <th>
            Tanggal Periksa
          </th>
          <th>
            Oli Gardan
          </th>
          <th>
            Oli Mesin
          </th>
          <th>
            Oli Transmisi
          </th>
          <th>
            Tertanda
          </th>
          <th>
            Action
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $index => $value)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $value->armada->no_lambung }}</td>
          <td>{{ $value->tanggal }}</td>
          <td>{{ number_format((float)$value->oli_gardan, 0, '.') }} KM</td>
          <td>{{ number_format((float)$value->oli_mesin, 0, '.') }} KM</td>
          <td>{{ number_format((float)$value->oli_transmisi, 0, '.') }} KM</td>
          <td>
            <img src="{{ asset('storage/' . $value->ttd_kepala_gudang) }}" style="width: 120px;" alt="tanda-tangan">
          </td>
          <td>
            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu dropdown-menu-right">
              <button type="button" class="dropdown-item delete-perawatan" data-id="{{$value->id}}">Delete</button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
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

  $(document).ready(function(){
  // Delete post
    $(document).on('click', '.delete-perawatan', function() {
        var postId = $(this).data('id');
        if (confirm('Apakah anda yakin untuk menghapus perawatan?')) {
          $.ajax({
              url: 'perawatan/delete/' + postId,
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