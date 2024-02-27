@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<h2 class="mb-2 page-title">Data Perbaikan</h2>
<p class="card-text">Mencakup data perbaikan tiap - tiap bus</p>

<a href="/kepala-gudang/perbaikan/buat-perbaikan" class="btn btn-primary mb-3">
  + Tambah Data Perbaikan
</a>

<div class="card shadow">
  <div class="card-body">
    <table class="table datatables" id="dataPerbaikan">
      <thead>
        <tr>
          <th>#</th>
          <th>Armada/No. Lambung</th>
          <th>Tanggal Perbaikan</th>
          <th>Suku Cadang</th>
          <th>Biaya</th>
          <th>Keterangan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $index => $value)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $value->armada->no_lambung }}</td>
          <td>{{ $value->tanggal }}</td>
          <td>
            @if($value->spareparts->isEmpty())
            -
            @else
            @foreach($value->spareparts as $sparepart)
            {{ $sparepart->nama_sparepart  }}, <br>
            @endforeach
            @endif
          </td>
          <td>Rp. {{ number_format($value->biaya, 0,0) }}</td>
          <td>{{ $value->keterangan }}</td>
          <td>
            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="/kepala-gudang/perbaikan/detail/{{ $value->id }}" class="dropdown-item delete-rampcheck">Detail</a>
              <button type=" button" class="dropdown-item delete-perbaikan" data-id="{{$value->id}}">Delete</button>
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
$('#dataPerbaikan').DataTable({
  autoWidth: true,
  "lengthMenu": [
    [10, 25, 50, -1],
    [10, 25, 50, "All"]
  ]
});

$(document).ready(function(){
  // Delete post
    $(document).on('click', '.delete-perbaikan', function() {
        var postId = $(this).data('id');
        if (confirm('Apakah anda yakin untuk menghapus perbaikan?')) {
          $.ajax({
              url: 'perbaikan/delete/' + postId,
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