<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <style>
  .text-center {
    text-align: center;
  }

  .mt-5 {
    margin-top: 20px;
  }

  .my-5 {
    margin-top: 20px;
    margin-bottom: 20px;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }

  tr,
  td {
    /* padding: 10px; */
  }

  .font-semibold {
    font-weight: 600;
  }

  .separator {
    width: 100%;
    background: orange;
  }

  .signature-frame {
    width: 100%;
    height: fit-content;
    border: 1px solid black;
    border-radius: 10px;
    text-align: center;
    padding-bottom: 12px;
  }

  .signature-frame p {
    font-size: 12px;
  }

  .signature-frame img {
    width: 100px;
    height: 100px;
  }

  </style>
</head>
<body>
  <div class="separator">
    <h2 class="text-center my-5">RAMPCHECK</h2>
  </div>
  <table>
    <tr>
      <td width="50%" class="font-semibold">Checker</td>
      <td>: <?= $rampcheck['checker']; ?></td>
    </tr>
    <tr>
      <td width="50%" class="font-semibold">Hari / Tanggal</td>
      <td>: <?= date('d-m-Y', strtotime($rampcheck['tgl_rampcheck'])); ?></td>
    </tr>
    <tr>
      <td width="50%" class="font-semibold">
        Waktu
      </td>
      <td>: <?= $rampcheck['waktu_rampcheck']; ?></td>
    </tr>
    <tr>
      <td width="50%" class="font-semibold">No. Polisi</td>
      <td>: <?= $rampcheck['no_polisi']; ?></td>
    </tr>
    <tr>
      <td width="50%" class="font-semibold">No. Lambung</td>
      <td>: <?= $rampcheck['no_lambung']; ?></td>
    </tr>
  </table>
  <div class="separator">
    <h2 class="text-center my-5">Kilometer Kendaraan & BBM</h2>
  </div>
  <table>
    <tr>
      <td width="50%" class="font-semibold">Posisi Kilometer</td>
      <td>: <?= $rampcheck['posisi_kilometer']; ?></td>
    </tr>
    <tr>
      <td width="50%" class="font-semibold">
        Posisi BBM
      </td>
      <td>: <?= $rampcheck['posisi_bbm']; ?></td>
    </tr>
  </table>
  <div class="separator">
    <h2 class="text-center">Kondisi Kendaraan</h2>
  </div>
  <table>
    <thead>
      <tr>
        <th width="30%"></th>
        <th width="2%"></th>
        <th></th>
        <th width="30%"></th>
        <th width="2%"></th>
        <th></th>
      </tr>
    </thead>
    <tr>
      <td class="font-semibold">Panel LED dalam</td>
      <td>: </td>
      <td>
        <?= $rampcheck['panel_led_dalam']; ?>
      </td>
      <td class="font-semibold">Lampu Kabin</td>
      <td>: </td>
      <td>
        <?= $rampcheck['lampu_kabin']; ?>
      </td>
    </tr>
    <tr>
      <td class="font-semibold">Klakson</td>
      <td>: </td>
      <td>
        <?= $rampcheck['klakson']; ?>
      </td>
      <td class="font-semibold">Konektor Pintu Hidrolik</td>
      <td>: </td>
      <td>
        <?= $rampcheck['konektor_pintu_hidrolik']; ?>
      </td>
    </tr>
    <tr>
      <td class="font-semibold">Handgrip</td>
      <td>: </td>
      <td>
        <?= $rampcheck['handgrip']; ?>
      </td>
      <td class="font-semibold">Tempat Sampah</td>
      <td>: </td>
      <td>
        <?= $rampcheck['tempat_sampah']; ?>
      </td>
    </tr>
    <tr>
      <td class="font-semibold">Pemadam/APAR</td>
      <td>: </td>
      <td>
        <?= $rampcheck['apar']; ?>
      </td>
      <td class="font-semibold">Palu Darurat</td>
      <td>: </td>
      <td>
        <?= $rampcheck['palu_darurat']; ?>
      </td>
    </tr>
    <tr>
      <td class="font-semibold">PJK</td>
      <td>: </td>
      <td>
        <?= $rampcheck['pjk']; ?>
      </td>
      <td class="font-semibold">Ban/Roda</td>
      <td>: </td>
      <td>
        <?= $rampcheck['ban']; ?>
      </td>
    </tr>
    <tr>
      <td class="font-semibold">AC</td>
      <td>: </td>
      <td>
        <?= $rampcheck['ac']; ?>
      </td>
      <td class="font-semibold">Panel LED Luar</td>
      <td>: </td>
      <td>
        <?= $rampcheck['panel_led_luar']; ?>
      </td>
    </tr>
    <tr>
      <td class="font-semibold">Lampu Utama</td>
      <td>: </td>
      <td>
        <?= $rampcheck['lampu_utama']; ?>
      </td>
      <td class="font-semibold">Lampu Sein</td>
      <td>: </td>
      <td>
        <?= $rampcheck['lampu_sein']; ?>
      </td>
    </tr>
    <tr>
      <td class="font-semibold">Lampu Senja</td>
      <td>: </td>
      <td>
        <?= $rampcheck['lampu_senja']; ?>
      </td>
      <td class="font-semibold">Wiper dan Washer</td>
      <td>: </td>
      <td>
        <?= $rampcheck['wiper_washer']; ?>
      </td>
    </tr>
    <tr>
      <td class="font-semibold">Spion</td>
      <td>: </td>
      <td>
        <?= $rampcheck['spion']; ?>
      </td>
      <td class="font-semibold">Lampu Mundur</td>
      <td>: </td>
      <td>
        <?= $rampcheck['lampu_mundur']; ?>
      </td>
    </tr>
    <tr>
      <td class="font-semibold">Lampu Rem</td>
      <td>: </td>
      <td>
        <?= $rampcheck['lampu_rem']; ?>
      </td>
      <td class="font-semibold">Lampu Plat Nopol</td>
      <td>: </td>
      <td>
        <?= $rampcheck['lampu_plat_nopol']; ?>
      </td>
    </tr>
    <tr>
      <td class="font-semibold">Dongkrak</td>
      <td>: </td>
      <td>
        <?= $rampcheck['dongkrak']; ?>
      </td>
      <td class="font-semibold">Pembuka Roda</td>
      <td>: </td>
      <td>
        <?= $rampcheck['pembuka_roda']; ?>
      </td>
    </tr>
    <tr>
      <td class="font-semibold">Segitiga Pengaman</td>
      <td>: </td>
      <td>
        <?= $rampcheck['segitiga_pengaman']; ?>
      </td>
      <td class="font-semibold">Ban Cadangan</td>
      <td>: </td>
      <td>
        <?= $rampcheck['ban_cadangan']; ?>
      </td>
    </tr>
  </table>
  <br><hr>
  <table>
    <tr>
      <td>
        <label for="catatan" class="font-semibold">
          Catatan :</label>
      </td>
    </tr>
    <tr>
      <td width="100%">
        <?= $rampcheck['catatan_rampcheck']; ?>
      </td>
    </tr>
  </table>
  <br><hr>
  <table>
    <tr>
      <td width="50%">
        <div class="signature-frame">
          <p class="text-center">Tertanda Checker</p>
          <?php if($rampcheck['ttd_checker']) : ?>
          <img src="../public/storage/<?= $rampcheck['ttd_checker']; ?>" alt="" />
          <?php else :?>
          <img src="../public/storage/<?= $rampcheck['ttd_kepala_gudang']; ?>" alt="" />
          <?php endif; ?>
        </div>
      </td>
      <td>
        <div class="signature-frame">
          <p class="text-center">Tertanda Kepala Gudang</p>
          <img src="../public/storage/<?= $rampcheck['ttd_kepala_gudang']; ?>" alt="" />
        </div>
      </td>
    </tr>
  </table>
</body>
</html>