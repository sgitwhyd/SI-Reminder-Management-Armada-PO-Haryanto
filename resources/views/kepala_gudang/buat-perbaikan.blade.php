@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<h1>
  Tambah Perbaikan
</h1>

<div class="col-12">
  <div class="card shadow">
    <div class="card-body">
      <form action="{{ route('kepala_gudang.buat-perbaikan') }}" method="POST">
        @method('POST')
        @csrf
        <div class="form-group mb-3">
          <label for="armada">Pilih Armada</label>
          <select name="id_armada" id="armada" class="custom-select">
            @foreach($data_armada as $armada)
            <option value="{{ $armada->id }}">{{ $armada->no_lambung }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="tanggal">Tanggal Perbaikan</label>
          <input type="date" name="tanggal" id="tanggal" class="form-control">
        </div>
        <div class="form-group mb-3">
          <label for="keterangan">
            Keterangan
          </label>
          <textarea class="form-control" name="keterangan" id="keterangan" rows="4"></textarea>
        </div>
        <div id="suku_cadang">
          <label for="jumlah">Suku Cadang</label>
          <input type="hidden" name="spareparts" id="spareparts">
          <div>
            <table class="table">
              <thead>
                <tr>
                  <th>
                    Kode Sparepart
                  </th>
                  <th>
                    Nama
                  </th>
                  <th>
                    Jumlah
                  </th>
                  <th>
                    Aksi
                  </th>
                </tr>
              </thead>
              <tbody id="sparepart">
              </tbody>
            </table>
          </div>
        </div>
        <div class="">
          <h4 class="text-center my-3">
            Daftar Suku Cadang
          </h4>
          <table class="table datatables" id="tableSparepart">
            <thead>
              <tr>
                <th>
                  Kode Sparepart
                </th>
                <th>
                  Nama
                </th>
                <th>
                  Stok
                </th>
                <th>
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($data_sparepart as $sparepart)
              <tr>
                <td>
                  {{ $sparepart->kode_sparepart }}
                </td>
                <td>
                  {{ $sparepart->nama_sparepart }}
                </td>
                <td>
                  {{ $sparepart->stock }}
                </td>
                <td>
                  <button type="button" class="btn btn-primary buttonTambahSparepart"
                    data="{{ $sparepart }}">Tambah</button>
                </td>
                @endforeach
            </tbody>
          </table>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Perbaikan</button>
      </form>
    </div>
  </div>
</div>

@endsection
@section('script')

<script>
$(document).ready(function() {

  $('#tableSparepart').DataTable({
    autoWidth: true,
    "lengthMenu": [
      [10, 25, 50, -1],
      [10, 25, 50, "All"]
    ]
  });

  const choosedSparepart = [];

  $('#suku_cadang').hide();

  window.render = function() {
    let html = '';

    $.each(choosedSparepart, function(index, value) {
      html += `
        <tr id="sparepart-${value.id}">
          <td>${value.kode_sparepart}</td>
          <td>${value.nama_sparepart}</td>
          <td class="jumlah">${value.jumlah}</td>
          <td class="jumlah">
            <button type="button" class="btn btn-danger delete-sparepart"
              onClick="deleteSparepart(${value.id})">Hapus</button>
          </td>
        </tr>
      `;
    });

    $('#spareparts').val(JSON.stringify(choosedSparepart));

    if (choosedSparepart.length > 0) {
      $('#suku_cadang').show();
    } else {
      $('#suku_cadang').hide();
    }

    $('#sparepart').html(html);
  }

  window.deleteSparepart = function(id) {
    const sparepart = choosedSparepart.find((item) => item.id === id);
    if (sparepart.jumlah > 1) {
      choosedSparepart.map(item => {
        if (item.id === id) {
          item.jumlah -= 1;
        }
      })
    } else {
      const index = choosedSparepart.findIndex((item) => item.id === id);
      choosedSparepart.splice(index, 1);
    }

    render();

  }

  $('#tableSparepart tbody').on('click', '.buttonTambahSparepart', function () {
    const sparepart = $(this).attr('data');
    const sparepartObj = JSON.parse(sparepart);

    choosedSparepart.some(item => {
      if (item.id === sparepartObj.id && item.jumlah >= sparepartObj.stock) {
        alert('Stock tidak mencukupi');
        return;
      }

      if (item.id === sparepartObj.id) {
        item.jumlah += 1;
        render();
        return;
      }

    })

    const isExist = choosedSparepart.find((item) => item.id === sparepartObj.id);
    if (!isExist) {
      choosedSparepart.push({
        id: sparepartObj.id,
        kode_sparepart: sparepartObj.kode_sparepart,
        nama_sparepart: sparepartObj.nama_sparepart,
        stock: sparepartObj.stock,
        jumlah: 1,
      })
    }

    render();
  })
});
</script>

@endsection