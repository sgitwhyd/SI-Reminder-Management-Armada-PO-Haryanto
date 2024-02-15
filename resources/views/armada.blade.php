@extends('layouts.main')

@section('content')
           
   <div class="row justify-content-center">
      <div class="col-12">
         <h2 class="mb-2 page-title">Data Armada</h2>
         <p class="card-text">Mencakup data surat kendaraan dan kesedian armada</p>
         <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#addModal"><i class="fe fe-plus"></i> Tambah</button>
         {{-- modal add --}}
         <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="addModalTitle">Tambah Armada</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
                  </div>
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
                        <div class="form-group col-md-6">
                           <label for="jenis_trayek">Jenis Trayek</label>
                           <select class="form-control select-trayek" id="jenis_trayek" name="jenis_trayek" tabindex="-1">
                               @foreach ($jenis_trayek as $key => $value)
                                   <option value="{{ $value }}">{{$value}}</option>
                               @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                     <button type="button" class="btn mb-2 btn-primary">Save changes</button>
                  </div>
               </div>
            </div>
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
                           <th></th>
                           <th>#</th>
                           <th>Name</th>
                           <th>Phone</th>
                           <th>Department</th>
                           <th>Company</th>
                           <th>Address</th>
                           <th>City</th>
                           <th>Date</th>
                           <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                           <td>
                              <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <label class="custom-control-label"></label>
                              </div>
                           </td>
                           <td>368</td>
                           <td>Imani Lara</td>
                           <td>(478) 446-9234</td>
                           <td>Asset Management</td>
                           <td>Borland</td>
                           <td>9022 Suspendisse Rd.</td>
                           <td>High Wycombe</td>
                           <td>Jun 8, 2019</td>
                           <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Remove</a>
                              <a class="dropdown-item" href="#">Assign</a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <label class="custom-control-label"></label>
                              </div>
                           </td>
                           <td>323</td>
                           <td>Walter Sawyer</td>
                           <td>(671) 969-1704</td>
                           <td>Tech Support</td>
                           <td>Macromedia</td>
                           <td>Ap #708-5152 Cursus. Ave</td>
                           <td>Bath</td>
                           <td>May 8, 2020</td>
                           <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Remove</a>
                              <a class="dropdown-item" href="#">Assign</a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <label class="custom-control-label"></label>
                              </div>
                           </td>
                           <td>371</td>
                           <td>Noelle Ray</td>
                           <td>(803) 792-2559</td>
                           <td>Human Resources</td>
                           <td>Sibelius</td>
                           <td>Ap #992-8933 Sagittis Street</td>
                           <td>Ivanteyevka</td>
                           <td>Apr 2, 2021</td>
                           <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Remove</a>
                              <a class="dropdown-item" href="#">Assign</a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <label class="custom-control-label"></label>
                              </div>
                           </td>
                           <td>302</td>
                           <td>Portia Nolan</td>
                           <td>(216) 946-1119</td>
                           <td>Payroll</td>
                           <td>Microsoft</td>
                           <td>Ap #461-4415 Enim Rd.</td>
                           <td>Kanpur Cantonment</td>
                           <td>Dec 4, 2019</td>
                           <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Remove</a>
                              <a class="dropdown-item" href="#">Assign</a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <label class="custom-control-label"></label>
                              </div>
                           </td>
                           <td>443</td>
                           <td>Scarlett Anderson</td>
                           <td>(486) 309-3564</td>
                           <td>Tech Support</td>
                           <td>Yahoo</td>
                           <td>P.O. Box 988, 7282 Lobortis Avenue</td>
                           <td>Lot</td>
                           <td>Dec 27, 2019</td>
                           <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Remove</a>
                              <a class="dropdown-item" href="#">Assign</a>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td>
                              <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input">
                              <label class="custom-control-label"></label>
                              </div>
                           </td>
                           <td>427</td>
                           <td>Clark Dennis</td>
                           <td>(239) 172-7907</td>
                           <td>Human Resources</td>
                           <td>Finale</td>
                           <td>Ap #978-3375 Adipiscing Av.</td>
                           <td>High Level</td>
                           <td>Sep 16, 2020</td>
                           <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#">Edit</a>
                              <a class="dropdown-item" href="#">Remove</a>
                              <a class="dropdown-item" href="#">Assign</a>
                              </div>
                           </td>
                        </tr>
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

  </script>
   

@endsection

