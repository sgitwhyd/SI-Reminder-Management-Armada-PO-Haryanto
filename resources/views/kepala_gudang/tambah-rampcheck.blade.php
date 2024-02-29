@extends('layouts.main')
@include('sidebar.menu_kepala_gudang')

@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    <h2 class="mb-2 page-title">Form Rampcheck</h2>
    <p class="card-text">Mencakup data pengecekan sebelum keberangkatan</p>
    <a href="{{ '/kepala-gudang/rampcheck' }}" class="btn mb-2 btn-secondary"><i class="fe fe-chevron-left fe-18"></i>
      Kembali</a>
    <form action="{{ '/kepala-gudang/rampcheck'}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row my-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-header">
              <h4 class="card-title">Data administrasi</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="date_check" class="col-sm-3 col-form-label">Date Check</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="date_check" name="date_check" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="time_check" class="col-sm-3 col-form-label">Time Check</label>
                <div class="col-sm-9">
                  <input type="time" class="form-control" id="time_check" name="time_check" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="select-armada" class="col-sm-3 col-form-label">Armada</label>
                <div class="col-sm-9">
                  <select name="id_armada" id="select-armada" style="width: 100%;" required>
                    <option value="" selected disabled>Pilih armada</option>
                    @foreach($armadas as $armada)
                    <option value="{{ $armada->id }}">{{ $armada->no_lambung }}</option>
                    @endforeach
                  </select>
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
                  <input type="text" class="form-control" id="posisi_kilometer" name="posisi_kilometer"
                    placeholder="kilometer sekarang" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="posisi_bbm" class="col-sm-3 col-form-label">Posisi BBM</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="posisi_bbm" name="posisi_bbm" placeholder="BBM sekarang"
                    required>
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
            <div class="card-body">
              <div class="custom-control custom-checkbox mb-2">
                <input type="checkbox" class="custom-control-input" id="check_all" name="check_all">
                <label class="custom-control-label" for="check_all"><strong>Check all</strong></label>
              </div>
              <hr class="my-2">
              <div id="rampcheck-list">
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Panel LED dalam</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="pld_ada" name="pld_ada">
                      <label class="custom-control-label" for="pld_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="pld_baik" name="pld_baik">
                      <label class="custom-control-label" for="pld_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Lampu Kabin</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_kabin_ada" name="lampu_kabin_ada">
                      <label class="custom-control-label" for="lampu_kabin_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_kabin_baik" name="lampu_kabin_baik">
                      <label class="custom-control-label" for="lampu_kabin_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Klakson</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="klakson_ada" name="klakson_ada">
                      <label class="custom-control-label" for="klakson_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="klakson_baik" name="klakson_baik">
                      <label class="custom-control-label" for="klakson_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Konektor Pintu Hidrolik</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="konektor_ph_ada" name="konektor_ph_ada">
                      <label class="custom-control-label" for="konektor_ph_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="konektor_ph_baik" name="konektor_ph_baik">
                      <label class="custom-control-label" for="konektor_ph_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Handgrip</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="handgrip_ada" name="handgrip_ada">
                      <label class="custom-control-label" for="handgrip_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="handgrip_baik" name="handgrip_baik">
                      <label class="custom-control-label" for="handgrip_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Tempat Sampah</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="tempat_sampah_ada"
                        name="tempat_sampah_ada">
                      <label class="custom-control-label" for="tempat_sampah_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="tempat_sampah_baik"
                        name="tempat_sampah_baik">
                      <label class="custom-control-label" for="tempat_sampah_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Pemadam/APAR(2)</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="apar_ada" name="apar_ada">
                      <label class="custom-control-label" for="apar_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="apar_baik" name="apar_baik">
                      <label class="custom-control-label" for="apar_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Palu Darurat</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="palu_darurat_ada" name="palu_darurat_ada">
                      <label class="custom-control-label" for="palu_darurat_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="palu_darurat_baik"
                        name="palu_darurat_baik">
                      <label class="custom-control-label" for="palu_darurat_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">PJK</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="pjk_ada" name="pjk_ada">
                      <label class="custom-control-label" for="pjk_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="pjk_baik" name="pjk_baik">
                      <label class="custom-control-label" for="pjk_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Ban/Roda</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="ban_ada" name="ban_ada">
                      <label class="custom-control-label" for="ban_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="ban_baik" name="ban_baik">
                      <label class="custom-control-label" for="ban_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">AC</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="ac_ada" name="ac_ada">
                      <label class="custom-control-label" for="ac_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="ac_baik" name="ac_baik">
                      <label class="custom-control-label" for="ac_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Panel LED luar</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="panel_led_luar_ada"
                        name="panel_led_luar_ada">
                      <label class="custom-control-label" for="panel_led_luar_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="panel_led_luar_baik"
                        name="panel_led_luar_baik">
                      <label class="custom-control-label" for="panel_led_luar_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Lampu Utama</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_utama_ada" name="lampu_utama_ada">
                      <label class="custom-control-label" for="lampu_utama_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_utama_baik" name="lampu_utama_baik">
                      <label class="custom-control-label" for="lampu_utama_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Lampu Sein</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_sein_ada" name="lampu_sein_ada">
                      <label class="custom-control-label" for="lampu_sein_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_sein_baik" name="lampu_sein_baik">
                      <label class="custom-control-label" for="lampu_sein_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Lampu Senja</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_senja_ada" name="lampu_senja_ada">
                      <label class="custom-control-label" for="lampu_senja_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_senja_baik" name="lampu_senja_baik">
                      <label class="custom-control-label" for="lampu_senja_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Wiper dan Washer</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="wiper_washer_ada" name="wiper_washer_ada">
                      <label class="custom-control-label" for="wiper_washer_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="wiper_washer_baik"
                        name="wiper_washer_baik">
                      <label class="custom-control-label" for="wiper_washer_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Spion</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="spion_ada" name="spion_ada">
                      <label class="custom-control-label" for="spion_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="spion_baik" name="spion_baik">
                      <label class="custom-control-label" for="spion_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Lampu Mundur</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_mundur_ada" name="lampu_mundur_ada">
                      <label class="custom-control-label" for="lampu_mundur_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_mundur_baik"
                        name="lampu_mundur_baik">
                      <label class="custom-control-label" for="lampu_mundur_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Lampu Rem</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_rem_ada" name="lampu_rem_ada">
                      <label class="custom-control-label" for="lampu_rem_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_rem_baik" name="lampu_rem_baik">
                      <label class="custom-control-label" for="lampu_rem_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Lampu Plat Nopol</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_plat_nopol_ada"
                        name="lampu_plat_nopol_ada">
                      <label class="custom-control-label" for="lampu_plat_nopol_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="lampu_plat_nopol_baik"
                        name="lampu_plat_nopol_baik">
                      <label class="custom-control-label" for="lampu_plat_nopol_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Dongkrak</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="dongkrak_ada" name="dongkrak_ada">
                      <label class="custom-control-label" for="dongkrak_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="dongkrak_baik" name="dongkrak_baik">
                      <label class="custom-control-label" for="dongkrak_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Pembuka Roda</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="pembuka_roda_ada" name="pembuka_roda_ada">
                      <label class="custom-control-label" for="pembuka_roda_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="pembuka_roda_baik"
                        name="pembuka_roda_baik">
                      <label class="custom-control-label" for="pembuka_roda_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Segitiga Pengaman</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="segitiga_pengaman_ada"
                        name="segitiga_pengaman_ada">
                      <label class="custom-control-label" for="segitiga_pengaman_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="segitiga_pengaman_baik"
                        name="segitiga_pengaman_baik">
                      <label class="custom-control-label" for="segitiga_pengaman_baik">Baik</label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="panel_led_dalam" class="col-sm-3 col-form-label">Ban Cadangan</label>
                  <div class="form-row col-sm-9">
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="ban_cadangan_ada" name="ban_cadangan_ada">
                      <label class="custom-control-label" for="ban_cadangan_ada">Ada</label>
                    </div>
                    <div class="custom-control custom-checkbox mx-auto mb-2">
                      <input type="checkbox" class="custom-control-input" id="ban_cadangan_baik"
                        name="ban_cadangan_baik">
                      <label class="custom-control-label" for="ban_cadangan_baik">Baik</label>
                    </div>
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
                  placeholder="Catatan dalam pengecekan" rows="5"></textarea>
              </div>
              <div class="form-group">
                <label for="ttd_kepala_gudang">Tertanda Kepala Gudang</label>
                <div class="custom-file mb-3">
                  <input type="file" class="custom-file-input" id="ttd_kepala_gudang" name="ttd_kepala_gudang">
                  <label class="custom-file-label" for="ttd_kepala_gudang">Choose file...</label>
                </div>
              </div>
              <button type="submit" class="btn mb-2 btn-primary"><i class="fe fe-send"></i> Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
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

    $('#check_all').on('click', function() {
      var checkAll = $(this).is(':checked');
      if (checkAll) {
        $('#rampcheck-list .custom-control-input').prop('checked', true);
      } else {
        $('#rampcheck-list .custom-control-input').prop('checked', false);
      }

    });

    $('#select-armada').select2({
      theme: 'bootstrap4',
      placeholder: 'Pilih Armada',
      allowClear: true
    });
  });
</script>
@endsection