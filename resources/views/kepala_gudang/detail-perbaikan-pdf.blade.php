<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    Detail Perbaikan {{ $data->armada->no_lambung }}
  </title>
  <style>
  table {
    width: 100%;
    border-collapse: collapse;
  }

  table,
  th,
  td {
    border: 1px solid black;
  }

  th,
  td {
    padding: 10px;
    text-align: left;
  }
  </style>
</head>
<body>
  <div class="card-body">
    <div class="col-12">
      <h3>
        Detail Armada
      </h3>

      <table class="table">
        <tr>
          <td>
            No. Lambung
          </td>
          <td>
            {{ $data->armada->no_lambung }}
          </td>
        </tr>
        <tr>
          <td>
            No. Polisi
          </td>
          <td>
            {{ $data->armada->no_polisi }}
          </td>
        </tr>
        <tr>
          <td>
            Tahun
          </td>
          <td>
            {{ $data->armada->tahun }}
          </td>
        </tr>
        <tr>
          <td>
            No. STNK
          </td>
          <td>
            {{ $data->armada->no_stnk }}
          </td>
        </tr>
        <tr>
          <td>
            Jenis Trayek
          </td>
          <td>
            {{ $data->armada->jenis_trayek }}
          </td>
        </tr>
        <tr>
          <td>
            Trayek
          </td>
          <td>
            {{ $data->armada->trayek }}
          </td>
        </tr>
      </table>
    </div>
    <div class="col-12">
      <h3>
        Daftar Sparepart Yang Digunakan
      </h3>
      <table class="table datatables" id="dataPerbaikan">
        <thead>
          <tr>
            <th>#</th>
            <th>
              Nama Sparepart
            </th>
            <th>
              Harga Satuan
            </th>
            <th>
              Jumlah
            </th>
            <th>
              Total Harga
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($data->sparepart as $value)
          <tr>
            <td>
              {{ $loop->iteration }}
            </td>
            <td>{{ $value->detail->nama_sparepart }}</td>
            <td>
              Rp. {{ number_format($value->detail->harga, 0,0) }}
            </td>
            <td>{{ $value->jumlah }}</td>
            <td>Rp. {{ number_format($value->detail->harga * 
              $value->jumlah, 0,0)
            }}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="4">
              <b>Total Biaya</b>
            </td>
            <td>
              <b>Rp. {{ number_format($data->biaya, 0,0) }}</b>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-12">
      <h3>
        Keterangan
      </h3>
      <p>
        {{ $data->keterangan }}
      </p>
    </div>
  </div>
</body>
</html>