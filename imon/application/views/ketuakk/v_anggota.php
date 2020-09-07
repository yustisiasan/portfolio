<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Daftar Anggota</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Cari">
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        
                      </div>

                      <div class="clearfix"></div>

                      <?php
                        foreach ($profil as $key) {
                          echo '
                              <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                              <div class="well profile_view" id="myProfil">
                                <div class="col-sm-12">
                                 
                                  <div class="left col-xs-7">
                                    <h2 id="idnama">'.$key['nama'].'</h2>
                                    <p><strong>NIP: </strong>'.$key['nip'].' </p>
                                    <p><strong>Status: </strong>'.$key['status'].' </p>
                                    <ul class="list-unstyled">
                                      <li><i class="fa fa-envelope-o"></i> Email: '.$key['email'].'</li>
                                      <li><i class="fa fa-phone"></i> No.Telp: '.$key['no_telp'].'</li>
                                    </ul>
                                  </div>
                                  <div class="right col-xs-5 text-center">
                                    <img src="'.base_url().'assets/images/'.$key['foto'].'" alt="" class="img-circle img-responsive">
                                  </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">

                                  <div class="col-xs-12 col-sm-6 emphasis">
                                    <a href="#modalUbah" data-toggle="modal" data-id="'.$key['id_dosen'].'" data-sts="'.$key['status'].'" class="btn btn-primary btn-xs">
                                      <i class="fa fa-pencil-square-o"> </i> Ubah Status
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          ';
                        }
                      ?>  

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <div class="modal fade" id="modalUbah" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method= "POST" action="<?php echo base_url();?>c_register/ubahStatus">
                    <div class="modal-header">
                        <center><h4>Ubah Status Dosen</h4></center>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" id="id_dosen" class="form-control" placeholder="Masukkan Data" name="id_dosen">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" id="status" >
                          <select class="form-control" id="id_sts" name="status" required>
                              $("#status").val("rowrprd").change();
                              <option value="Aktif">Aktif</option>
                              <option value="Tidak Aktif">Tidak Aktif</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" name="ubah" value="Ubah">
                    </div>
                </form>
                </div>
            </div>
        </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#modalUbah').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                var rowrsts = $(e.relatedTarget).data('sts');

                $("#id_dosen").val(rowid);
                $("#id_sts").val(rowrsts);
            });
        });
    </script>

    <script>
      function myFunction() {
          // Declare variables
          var input, filter, p, nm, a, i;
          input = document.getElementById('myInput');
          filter = input.value.toUpperCase();
          p = document.getElementById("myProfil");
          nm = p.getElementById('idnama');

          // Loop through all list items, and hide those who don't match the search query
          for (i = 0; i < nm.length; i++) {
              a = nm[i].getElementsByTagName("a")[0];
              if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                  nm[i].style.display = "";
              } else {
                  nm[i].style.display = "none";
              }
          }
      }
    </script>

    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>assets/vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/modals.js"></script>