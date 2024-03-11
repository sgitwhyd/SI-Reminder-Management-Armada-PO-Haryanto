@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    <h2 class="mb-2 page-title">Edit Form Rampcheck</h2>
    <p class="card-text">Mencakup data pengecekan sebelum keberangkatan</p>
    <a href="{{ '/kepala-gudang/rampcheck' }}" class="btn mb-2 btn-secondary"><i class="fe fe-chevron-left fe-18"></i>
      Kembali</a>

    <input type="hidden" name="id_rampcheck" id="id_rampcheck">
    <div class="row my-4">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">Data administrasi</h4>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label for="checker" class="col-sm-3 col-form-label">Checker</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="checker" value="{{ $rampcheck->user->full_name}}"
                  placeholder="petugas checker" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="date_check" class="col-sm-3 col-form-label">Date Check</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="date_check" value="{{ $rampcheck['tgl_rampcheck']}}"
                  name="date_check" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="time_check" class="col-sm-3 col-form-label">Time Check</label>
              <div class="col-sm-9">
                <input type="time" class="form-control" id="time_check" value="{{ $rampcheck['waktu_rampcheck']}}"
                  name="time_check" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="no_polisi" class="col-sm-3 col-form-label">No. Polisi</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="no_polisi" value="{{ $rampcheck['no_polisi']}}"
                  name="no_polisi" placeholder="nomor polisi" required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="no_lambung" class="col-sm-3 col-form-label">No. Lambung</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="no_lambung" value="{{ $rampcheck['no_lambung']}}"
                  name="no_lambung" placeholder="nomor lambung" required readonly>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">Kilometer & BBM</h4>
          </div>
          <div class="card-body">
            <div class="form-group row">
              <label for="posisi_kilometer" class="col-sm-3 col-form-label">Posisi Kilometer</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="posisi_kilometer"
                  value="{{ $rampcheck['posisi_kilometer']}}" name="posisi_kilometer" placeholder="kilometer sekarang"
                  required readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="posisi_bbm" class="col-sm-3 col-form-label">Posisi BBM</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="posisi_bbm" value="{{ $rampcheck['posisi_bbm']}}"
                  name="posisi_bbm" placeholder="BBM sekarang" required readonly>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">Kondisi Kendaraan</h4>
          </div>
          <div class="card-body kondisi-kendaraan">
              <div class="custom-control custom-checkbox mb-2">
                <input type="checkbox" class="custom-control-input" id="check_all" name="check_all">
                <!-- <label class="custom-control-label" for="check_all"><strong>Check all</strong></label> -->
              </div>
              <hr class="my-2">
              <div id="rampcheck-list">
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Panel LED dalam</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="panel_led_dalam" name="panel_led_dalam" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                    <!-- <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="pld_ada" name="pld_ada">
                      <label class="custom-control-label" for="pld_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="pld_baik" name="pld_baik">
                      <label class="custom-control-label" for="pld_baik">Baik</label>
                    </div> -->
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lampu_kabin" class="col-sm-3 col-form-label">Lampu Kabin</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="lampu_kabin" name="lampu_kabin" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="klakson" class="col-sm-3 col-form-label">Klakson</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="klakson" name="klakson" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="konektor_pintu_hidrolik" class="col-sm-3 col-form-label">Konektor Pintu Hidrolik</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="konektor_pintu_hidrolik" name="konektor_pintu_hidrolik" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="handgrip" class="col-sm-3 col-form-label">Handgrip</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="handgrip" name="handgrip" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="tempat_sampah" class="col-sm-3 col-form-label">Tempat Sampah</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="tempat_sampah" name="tempat_sampah" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="apar" class="col-sm-3 col-form-label">Pemadam/APAR(2)</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="apar" name="apar" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="palu_darurat" class="col-sm-3 col-form-label">Palu Darurat</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="palu_darurat" name="palu_darurat" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pjk" class="col-sm-3 col-form-label">PJK</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="pjk" name="pjk" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="ban" class="col-sm-3 col-form-label">Ban/Roda</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="ban" name="ban" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="ac" class="col-sm-3 col-form-label">AC</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="ac" name="ac" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_luar" class="col-sm-3 col-form-label">Panel LED luar</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="panel_led_luar" name="panel_led_luar" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lampu_utama" class="col-sm-3 col-form-label">Lampu Utama</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="lampu_utama" name="lampu_utama" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lampu_sein" class="col-sm-3 col-form-label">Lampu Sein</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="lampu_sein" name="lampu_sein" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lampu_senja" class="col-sm-3 col-form-label">Lampu Senja</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="lampu_senja" name="lampu_senja" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="wiper_washer" class="col-sm-3 col-form-label">Wiper dan Washer</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="wiper_washer" name="wiper_washer" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="spion" class="col-sm-3 col-form-label">Spion</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="spion" name="spion" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lampu_mundur" class="col-sm-3 col-form-label">Lampu Mundur</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="lampu_mundur" name="lampu_mundur" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lampu_rem" class="col-sm-3 col-form-label">Lampu Rem</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="lampu_rem" name="lampu_rem" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="lampu_plat_nopol" class="col-sm-3 col-form-label">Lampu Plat Nopol</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="lampu_plat_nopol" name="lampu_plat_nopol" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="dongkrak" class="col-sm-3 col-form-label">Dongkrak</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="dongkrak" name="dongkrak" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pembuka_roda" class="col-sm-3 col-form-label">Pembuka Roda</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="pembuka_roda" name="pembuka_roda" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="segitiga_pengaman" class="col-sm-3 col-form-label">Segitiga Pengaman</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="segitiga_pengaman" name="segitiga_pengaman" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="ban_cadangan" class="col-sm-3 col-form-label">Ban Cadangan</label>
                  <div class="col-sm-9">
                    <select class="form-control " id="ban_cadangan" name="ban_cadangan" tabindex="-1">
                        <option value="ADA">Ada</option>
                        <option value="TIDAK ADA">Tidak Ada</option>
                        <option value="BAIK">Baik</option>
                        <option value="TIDAK BAIK">Tidak Baik</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header">
            <h4 class="card-title">Kesimpulan</h4>
          </div>
          <div class="card-body">
            <div class="form-group mb-3">
              <label for="catatan_rampcheck">Catatan</label>
              <textarea class="form-control" id="catatan_rampcheck" name="catatan_rampcheck"
                placeholder="Catatan dalam pengecekan" rows="5" readonly>{{$rampcheck['catatan_rampcheck']}}</textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6 d-flex flex-column align-items-center">
                <label for="ttd_checker">Tanta tangan checker</label>
                <img src="{{ asset('storage/' . $rampcheck->ttd_checker) }}" width="100" alt="">
                <p>
                  {{ $rampcheck->user->full_name }}
                </p>
              </div>
              <div class="form-group col-md-6">
                <form action="/kepala-gudang/rampcheck/update/{{ $rampcheck->id_rampcheck}}" method="post"
                  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                    <label for="ttd_checker">Tanda Tangan Kepala Gudang</label>
                    <div class="custom-file mb-3">
                      <input type="file" class="custom-file-input" id="ttd_kepala_gudang" name="ttd_kepala_gudang">
                      <label class="custom-file-label" for="ttd_kepala_gudang">Choose file...</label>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="status">
                      Status Rampcheck
                    </label>
                    <select class="form-control" name="status" id="status" required>
                      <option selected>
                        Menunggu Persetujuan
                      </option>
                      <option value="APPROVE">Disetujui</option>
                      <option value="REJECT">Ditolak</option>
                    </select>
                  </div>
                  <button type="submit" class="btn mb-2 btn-primary"><i class="fe fe-send"></i> Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
$(document).ready(function() {
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });

  $('.custom-control-input').each(function() {
    $(this).attr('disabled', true);
  })

  $('#check_all').on('click', function() {
    var checkAll = $(this).is(':checked');
    if (checkAll) {
      $('#rampcheck-list .custom-control-input').prop('checked', true);
    } else {
      $('#rampcheck-list .custom-control-input').prop('checked', false);
    }

  });
  $('#id_rampcheck').val("{{ $rampcheck['id_rampcheck']}}");
  $('#panel_led_dalam').val("{{ $rampcheck['panel_led_dalam'] }}");
  $('#lampu_kabin').val("{{ $rampcheck['lampu_kabin'] }}");
  $('#klakson').val("{{ $rampcheck['klakson'] }}");
  $('#konektor_pintu_hidrolik').val("{{ $rampcheck['konektor_pintu_hidrolik'] }}");
  $('#handgrip').val("{{ $rampcheck['handgrip'] }}");
  $('#tempat_sampah').val("{{ $rampcheck['tempat_sampah'] }}");
  $('#apar').val("{{ $rampcheck['apar'] }}");
  $('#palu_darurat').val("{{ $rampcheck['palu_darurat'] }}");
  $('#pjk').val("{{ $rampcheck['pjk'] }}");
  $('#ban').val("{{ $rampcheck['ban'] }}");
  $('#ac').val("{{ $rampcheck['ac'] }}");
  $('#panel_led_luar').val("{{ $rampcheck['panel_led_luar'] }}");
  $('#lampu_utama').val("{{ $rampcheck['lampu_utama'] }}");
  $('#lampu_sein').val("{{ $rampcheck['lampu_sein'] }}");
  $('#lampu_senja').val("{{ $rampcheck['lampu_senja'] }}");
  $('#wiper_washer').val("{{ $rampcheck['wiper_washer'] }}");
  $('#spion').val("{{ $rampcheck['spion'] }}");
  $('#lampu_mundur').val("{{ $rampcheck['lampu_mundur'] }}");
  $('#lampu_rem').val("{{ $rampcheck['lampu_rem'] }}");
  $('#lampu_plat_nopol').val("{{ $rampcheck['lampu_plat_nopol'] }}");
  $('#dongkrak').val("{{ $rampcheck['dongkrak'] }}");
  $('#pembuka_roda').val("{{ $rampcheck['pembuka_roda'] }}");
  $('#segitiga_pengaman').val("{{ $rampcheck['segitiga_pengaman'] }}");
  $('#ban_cadangan').val("{{ $rampcheck['ban_cadangan'] }}");
});
</script>
@endsection