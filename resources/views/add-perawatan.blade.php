@extends('layouts.main')

@section('content')
   <div class="row justify-content-center">
      <div class="col-12">
         <h2 class="mb-2 page-title">Form Perawatan</h2>
         <p class="card-text">Lakukan perawatan rutin sesuai SOP, untuk kenyamanan dan pengoptimalan armada.</p>
         {{-- form cek start --}}
         <form action="" method="post">
            <div class="row my-4">
               <div class="col-md-12">
                  <div class="card shadow">
                     <div class="card-header">
                        <strong class="cart-title">Data Pemeriksaan</strong>
                     </div>
                     <div class="card-body">
                        <div class="form-row mb-3">
                           <div class="col-md-6 mb-3">
                              <label for="tgl_perawatan">Tgl Perawatan</label>
                              <div class="input-group">
                                 <input type="text" class="form-control drgpicker" id="tgl_perawatan" name="tgl_perawatan" required>
                                 <div class="input-group-append">
                                    <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16 mx-1"></span></div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="nama_po">Nama PO</label>
                              <input type="text" class="form-control" id="nama_po" required>
                              <div class="invalid-feedback"> Please input a valid PO </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label>Lokasi Perawatan</label>
                              <div class="form-row">
                                 <div class="form-group mx-auto">
                                    <div class="custom-control custom-radio">
                                       <input type="radio" class="custom-control-input" value="terminal" id="terminal" name="lokasi" required>
                                       <label class="custom-control-label" for="terminal">Terminal</label>
                                    </div>
                                 </div>
                                 <div class="form-group mx-auto">
                                    <div class="custom-control custom-radio">
                                       <input type="radio" class="custom-control-input" value="pool" id="pool" name="lokasi" required>
                                       <label class="custom-control-label" for="pool">Pool</label>
                                    </div>
                                 </div>
                                 <div class="form-group mx-auto">
                                    <div class="custom-control custom-radio">
                                       <input type="radio" class="custom-control-input" value="other" id="other" name="lokasi" required>
                                       <label class="custom-control-label" for="other">Lainnya</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="nama_lokasi">Nama Lokasi</label>
                              <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required>
                              <div class="invalid-feedback"> Please input a valid location </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="nama_pengemudi">Nama Pengemudi</label>
                              <input type="text" class="form-control" id="nama_pengemudi" nama="nama_pengemudi" required>
                              <div class="invalid-feedback"> Please input a valid location </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="umur_pengemudi">Umur Pengemudi</label>
                              <input type="number" class="form-control" id="umur_pengemudi" nama="umur_pengemudi" required>
                              <div class="invalid-feedback"> Please input a valid age </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label>Nomor Kendaraan</label>
                              <div class="form-row">
                                 <div class="form-group mx-auto">
                                    <div class="custom-control custom-radio">
                                       <input type="radio" class="custom-control-input" value="reguler" id="reguler" name="lokasi" required>
                                       <label class="custom-control-label" for="reguler">Reguler</label>
                                    </div>
                                 </div>
                                 <div class="form-group mx-auto">
                                    <div class="custom-control custom-radio">
                                       <input type="radio" class="custom-control-input" value="cadangan" id="cadangan" name="lokasi" required>
                                       <label class="custom-control-label" for="cadangan">Cadangan</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="nomor_stuk">Nomor STUK</label>
                              <input type="text" class="form-control" id="nomor_stuk" nama="nomor_stuk" required>
                              <div class="invalid-feedback"> Please input a valid number</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label>Jenis Trayek</label>
                              <div class="form-row">
                                 @foreach($jenis_trayek as $key => $value)
                                 <div class="form-group mx-auto">
                                    <div class="custom-control custom-radio">
                                       <input type="radio" class="custom-control-input" value="{{$value}}" id="{{$value}}" name="jenis_trayek" required>
                                       <label class="custom-control-label" for="{{$value}}">{{$value}}</label>
                                    </div>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="trayek">Trayek</label>
                              <input type="text" class="form-control" id="trayek" nama="trayek" required>
                              <div class="invalid-feedback"> Please input a valid trayek</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="card shadow">
                     <div class="card-header">
                        <strong class="cart-title">
                           Unsur Administrasi
                        </strong>
                     </div>
                     <div class="card-body">
                        <div class="form-group row">
                           <label for="kartu_uji" class="col-sm-3 col-form-label">Kartu Uji/STUK</label>
                           <div class="row col-sm-9">
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kartu_uji" value="ada" id="ku_ada" required>
                                    <label class="custom-control-label" for="ku_ada">Ada, berlaku</label>
                                 </div>
                              </div>
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kartu_uji" value="tidak ada" id="ku_tidak_ada" required>
                                    <label class="custom-control-label" for="ku_tidak_ada">Tidak ada</label>
                                 </div>
                              </div>
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kartu_uji" value="tidak berlaku" id="ku_tidak_berlaku" required>
                                    <label class="custom-control-label" for="ku_tidak_berlaku">Tidak berlaku</label>
                                 </div>
                              </div>
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kartu_uji" value="tidak sesuai fisik" id="ku_tidak_sesuai" required>
                                    <label class="custom-control-label" for="ku_tidak_sesuai">Tidak sesuai fisik</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="kp_reguler" class="col-sm-3 col-form-label">KP. Reguler</label>
                           <div class="row col-sm-9">
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kp_reguler" value="ada" id="kr_ada" required>
                                    <label class="custom-control-label" for="kr_ada">Ada, berlaku</label>
                                 </div>
                              </div>
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kp_reguler" value="tidak ada" id="kr_tidak_ada" required>
                                    <label class="custom-control-label" for="kr_tidak_ada">Tidak ada</label>
                                 </div>
                              </div>
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kp_reguler" value="tidak berlaku" id="kr_tidak_berlaku" required>
                                    <label class="custom-control-label" for="kr_tidak_berlaku">Tidak berlaku</label>
                                 </div>
                              </div>
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kp_reguler" value="tidak sesuai fisik" id="kr_tidak_sesuai" required>
                                    <label class="custom-control-label" for="kr_tidak_sesuai">Tidak sesuai fisik</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="kp_cadangan" class="col-sm-3 col-form-label">KP. Cadangan <small class="form-text text-muted"><i>untuk kendaraan cadangan</i></small></label>
                           <div class="row col-sm-9">
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kp_cadangan" value="ada" id="kc_ada" required>
                                    <label class="custom-control-label" for="kc_ada">Ada, berlaku</label>
                                 </div>
                              </div>
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kp_cadangan" value="tidak ada" id="kc_tidak_ada" required>
                                    <label class="custom-control-label" for="kc_tidak_ada">Tidak ada</label>
                                 </div>
                              </div>
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kp_cadangan" value="tidak berlaku" id="kc_tidak_berlaku" required>
                                    <label class="custom-control-label" for="kc_tidak_berlaku">Tidak berlaku</label>
                                 </div>
                              </div>
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="kp_cadangan" value="tidak sesuai fisik" id="kc_tidak_sesuai" required>
                                    <label class="custom-control-label" for="kc_tidak_sesuai">Tidak sesuai fisik</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="sim_pengemudi" class="col-sm-3 col-form-label">SIM Pengemudi</label>
                           <div class="row col-sm-9">
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="sim_pengemudi" value="A Umum" id="sim_a" required>
                                    <label class="custom-control-label" for="sim_a">A Umum</label>
                                 </div>
                              </div>
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="sim_pengemudi" value="B1 Umum" id="sim_b1" required>
                                    <label class="custom-control-label" for="sim_b1">B1 Umum</label>
                                 </div>
                              </div>
                              <div class="form-group mx-auto">
                                 <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="sim_pengemudi" value="B2 Umum" id="sim_b2" required>
                                    <label class="custom-control-label" for="sim_b2">B2 Umum</label>
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
                        <strong class="cart-title">
                           Unsur Teknis Utama
                        </strong>
                     </div>
                     <div class="card-body">
                        <p>A. SISTEM PENERANGAN</p>
                        <ol>
                           <li>Lampu Utama
                              <ol style="list-style-type:lower-alpha">
                                 <li>
                                    <div class="form-group row">
                                       <label for="sim_pengemudi" class="col-sm-3 col-form-label">Dekat</label>
                                       <div class="row col-sm-9">
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="lu_dekat" value="semua menyala" id="lud_sm_nyala" required>
                                                <label class="custom-control-label" for="lud_sm_nyala">Semua Menyala</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="lu_dekat" value="tidak menyala kiri" id="lud_kr_mati" required>
                                                <label class="custom-control-label" for="lud_kr_mati">Tidak Menyala Kiri</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="lu_dekat" value="tidak menyala kanan" id="lud_kn_mati" required>
                                                <label class="custom-control-label" for="lud_kn_mati">Tidak Menyala Kanan</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="lu_dekat" value="semua tidak menyala" id="lud_sm_mati" required>
                                                <label class="custom-control-label" for="lud_sm_mati">Semua Tidak Menyala</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="form-group row">
                                       <label for="sim_pengemudi" class="col-sm-3 col-form-label">Jauh</label>
                                       <div class="row col-sm-9">
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="lu_jauh" value="semua menyala" id="luj_sm_nyala" required>
                                                <label class="custom-control-label" for="luj_sm_nyala">Semua Menyala</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="lu_jauh" value="tidak menyala kiri" id="luj_kr_mati" required>
                                                <label class="custom-control-label" for="luj_kr_mati">Tidak Menyala Kiri</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="lu_jauh" value="tidak menyala kanan" id="luj_kn_mati" required>
                                                <label class="custom-control-label" for="luj_kn_mati">Tidak Menyala Kanan</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="lu_jauh" value="semua tidak menyala" id="luj_sm_mati" required>
                                                <label class="custom-control-label" for="luj_sm_mati">Semua Tidak Menyala</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ol>
                           </li>
                           <li>Lampu Penunjuk Arah (SEIN)
                              <ol style="list-style-type:lower-alpha">
                                 <li>
                                    <div class="form-group row">
                                       <label for="sim_pengemudi" class="col-sm-3 col-form-label">Depan</label>
                                       <div class="row col-sm-9">
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="ls_depan" value="semua menyala" id="lsd_sm_nyala" required>
                                                <label class="custom-control-label" for="lsd_sm_nyala">Semua Menyala</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="ls_depan" value="tidak menyala kiri" id="lsd_kr_mati" required>
                                                <label class="custom-control-label" for="lsd_kr_mati">Tidak Menyala Kiri</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="ls_depan" value="tidak menyala kanan" id="lsd_kn_mati" required>
                                                <label class="custom-control-label" for="lsd_kn_mati">Tidak Menyala Kanan</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="ls_depan" value="semua tidak menyala" id="lsd_sm_mati" required>
                                                <label class="custom-control-label" for="lsd_sm_mati">Semua Tidak Menyala</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="form-group row">
                                       <label for="sim_pengemudi" class="col-sm-3 col-form-label">Belakang</label>
                                       <div class="row col-sm-9">
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="ls_belakang" value="semua menyala" id=lsb_sm_nyala" required>
                                                <label class="custom-control-label" for=lsb_sm_nyala">Semua Menyala</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="ls_belakang" value="tidak menyala kiri" id=lsb_kr_mati" required>
                                                <label class="custom-control-label" for=lsb_kr_mati">Tidak Menyala Kiri</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="ls_belakang" value="tidak menyala kanan" id=lsb_kn_mati" required>
                                                <label class="custom-control-label" for=lsb_kn_mati">Tidak Menyala Kanan</label>
                                             </div>
                                          </div>
                                          <div class="form-group mx-auto">
                                             <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="ls_belakang" value="semua tidak menyala" id=lsb_sm_mati" required>
                                                <label class="custom-control-label" for=lsb_sm_mati">Semua Tidak Menyala</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                              </ol>
                           </li>
                           <li>
                              <div class="form-group row">
                                 <label for="sim_pengemudi" class="col-sm-3 col-form-label">Lampu Rem</label>
                                 <div class="row col-sm-9">
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="lp_rem" value="semua menyala" id="lp_sm_nyala" required>
                                          <label class="custom-control-label" for="lp_sm_nyala">Semua Menyala</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="lp_rem" value="tidak menyala kiri" id="lp_kr_mati" required>
                                          <label class="custom-control-label" for="lp_kr_mati">Tidak Menyala Kiri</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="lp_rem" value="tidak menyala kanan" id="lp_kn_mati" required>
                                          <label class="custom-control-label" for="lp_kn_mati">Tidak Menyala Kanan</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="lp_rem" value="semua tidak menyala" id="lp_sm_mati" required>
                                          <label class="custom-control-label" for="lp_sm_mati">Semua Tidak Menyala</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="form-group row">
                                 <label for="sim_pengemudi" class="col-sm-3 col-form-label">Lampu Mundur</label>
                                 <div class="row col-sm-9">
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="lp_mundur" value="semua menyala" id="lm_sm_nyala" required>
                                          <label class="custom-control-label" for="lm_sm_nyala">Semua Menyala</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="lp_mundur" value="tidak menyala kiri" id="lm_kr_mati" required>
                                          <label class="custom-control-label" for="lm_kr_mati">Tidak Menyala Kiri</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="lp_mundur" value="tidak menyala kanan" id="lm_kn_mati" required>
                                          <label class="custom-control-label" for="lm_kn_mati">Tidak Menyala Kanan</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="lp_mundur" value="semua tidak menyala" id="lm_sm_mati" required>
                                          <label class="custom-control-label" for="lm_sm_mati">Semua Tidak Menyala</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ol>
                        <p>B. SISTEM PENGEREMEAN</p>
                        <ol>
                           <li>
                              <div class="form-group row">
                                 <label for="sim_pengemudi" class="col-sm-3 col-form-label">Kondisi Rem Utama</label>
                                 <div class="row col-sm-9">
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="rem_utama" value="berfungsi" id="ru_fungsi" required>
                                          <label class="custom-control-label" for="ru_fungsi">Berfungsi</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="rem_utama" value="tidak berfungsi" id="ru_tidak_fungsi" required>
                                          <label class="custom-control-label" for="ru_tidak_fungsi">Tidak Berfungsi</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="form-group row">
                                 <label for="sim_pengemudi" class="col-sm-3 col-form-label">Kondisi Rem Parkir</label>
                                 <div class="row col-sm-9">
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="rem_parkir" value="berfungsi" id="rp_fungsi" required>
                                          <label class="custom-control-label" for="rp_fungsi">Berfungsi</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="rem_parkir" value="tidak berfungsi" id="rp_tidak_fungsi" required>
                                          <label class="custom-control-label" for="rp_tidak_fungsi">Tidak Berfungsi</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ol>
                        <p>C. BADAN KENDARAAN</p>
                        <ol>
                           <li>
                              <div class="form-group row">
                                 <label for="sim_pengemudi" class="col-sm-3 col-form-label">Kondisi Kaca Depan</label>
                                 <div class="row col-sm-9">
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="kaca_depan" value="baik" id="kd_baik" required>
                                          <label class="custom-control-label" for="kd_baik">Baik</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="kaca_depan" value="buruk" id="kd_buruk" required>
                                          <label class="custom-control-label" for="kd_buruk">Buruk</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ol>
                        <p>D. BAN</p>
                        <ol>
                           <li>
                              <div class="form-group row">
                                 <label for="sim_pengemudi" class="col-sm-3 col-form-label">Kondisi Ban Depan</label>
                                 <div class="row col-sm-9">
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="ban_depan" value="semua layak" id="banD_sm_layak" required>
                                          <label class="custom-control-label" for="banD_sm_layak">Semua Layak</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="ban_depan" value="tidak layak kiri" id="ban_kr_rusak" required>
                                          <label class="custom-control-label" for="banD_kr_rusak">Tidak Layak Kiri</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="ban_depan" value="tidak layak kanan" id="banD_kn_rusak" required>
                                          <label class="custom-control-label" for="banD_kn_rusak">Tidak Layak Kanan</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="ban_depan" value="semua tidak layak" id="banD_sm_rusak" required>
                                          <label class="custom-control-label" for="banD_sm_rusak">Semua Tidak Layak</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                           <li>
                              <div class="form-group row">
                                 <label for="sim_pengemudi" class="col-sm-3 col-form-label">Kondisi Ban Belakang</label>
                                 <div class="row col-sm-9">
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="ban_belakang" value="semua layak" id="banB_sm_layak" required>
                                          <label class="custom-control-label" for="banB_sm_layak">Semua Layak</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="ban_belakang" value="tidak layak kiri" id="banB_kr_rusak" required>
                                          <label class="custom-control-label" for="banB_kr_rusak">Tidak Layak Kiri</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="ban_belakang" value="tidak layak kanan" id="banB_kn_rusak" required>
                                          <label class="custom-control-label" for="banB_kn_rusak">Tidak Layak Kanan</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="ban_belakang" value="semua tidak layak" id="banB_sm_rusak" required>
                                          <label class="custom-control-label" for="banB_sm_rusak">Semua Tidak Layak</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ol>
                        <p>E. PELENGKAPAN</p>
                        <ol>
                           <li>
                              <div class="form-group row">
                                 <label for="sim_pengemudi" class="col-sm-3 col-form-label">Sabuk Keselamatan Pengemudi</label>
                                 <div class="row col-sm-9">
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="sitbel" value="ada" id="st_ada" required>
                                          <label class="custom-control-label" for="st_ada">Ada, berfungsi</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="sitbel" value="tidak ada" id="st_tidak_ada" required>
                                          <label class="custom-control-label" for="st_tidak_ada">Tidak Ada</label>
                                       </div>
                                    </div>
                                    <div class="form-group mx-auto">
                                       <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" name="sitbel" value="tidak berfungsi" id="st_tidak_fungsi" required>
                                          <label class="custom-control-label" for="st_tidak_fungsi">Tidak Berfungsi</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ol>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="card shadow">
                     <div class="card-header">
                        <strong class="cart-title">
                           Unsur Teknis Penunjang
                        </strong>
                     </div>
                     <div class="card-body">
                        
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="card shadow">
                     <div class="card-header">
                        <strong class="cart-title">
                           Kesimpulan
                        </strong>
                     </div>
                     <div class="card-body">
                        
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>

   <form action="{{'/perawatan'}}" method="post">
   @csrf
    <div class="custom-control custom-checkbox mb-3">
      <input type="checkbox" class="custom-control-input" id="customControlValidation1" name="customControlValidation1">
      <label class="custom-control-label" for="customControlValidation1">Check this custom
        checkbox1</label>
    </div>
    <div class="custom-control custom-checkbox mb-3">
      <input type="checkbox" class="custom-control-input" id="customControlValidation2" name="customControlValidation2">
      <label class="custom-control-label" for="customControlValidation2">Check this custom
        checkbox2</label>
    </div>
    <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" id="customControlValidation22" name="radio-stacked" required="">
      <label class="custom-control-label" for="customControlValidation22">Card</label>
      <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
    </div>
   <button type="submit">check</button>
   </form>

  

@endsection

@section('script')
  
@endsection

