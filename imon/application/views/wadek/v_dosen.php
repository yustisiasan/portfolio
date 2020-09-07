<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
               <div class="title_left">
                <h3>Daftar Dosen</h3>
               </div>
            </div>

            <div class="clearfix"></div>
            <style type="text/css">
             .dropdown{
                font-weight: bold;
              }
            </style>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NIP</th>
                          <th>Nama Lengkap</th>
                          <th>Kelompok Keahlian</th>
                          <th>Email</th>
                          <th>No. Telepon</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no=1;
                          foreach ($dosen as $key) {
                              echo '
                                <tr>
                                  <td>'.$no.'</td>
                                  <td>'.$key["nip"].'</td>
                                  <td>'.$key["nama"].'</td>
                                  <td>'.$key["namaKK"].'</td>
                                  <td>'.$key["email"].'</td>
                                  <td>'.$key["no_telp"].'</td>
                                  <td>'.$key["status"].'</td>
                                </tr>
                              ';

                              $no++;
                          }
                          if($no==1){
                            echo'
                            <tr>
                              <td colspan="6" align="center">Data Kosong</td>
                            </tr>
                            ';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- Modal Dialog -->
        <div class="modal fade" id="modalApprove" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Konfirmasi Dialog</h4>
                    </div>
                    <div class="konfHapus"></div>
                </div>
            </div>
        </div>
        

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#modalApprove').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                var nama = $(e.relatedTarget).data('nama');
                //window.alert(rowid);
                $.ajax({
                    type : 'post',
                    url : '<?=base_url(); ?>c_perencanaan/vApprove',
                    data :  'rowid='+ rowid+'&nama='+nama,
                    success : function(data){
                    $('.konfHapus').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url();?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url();?>assets/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url();?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="<?php echo base_url();?>assets/vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?php echo base_url();?>assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>

    <script src="<?php echo base_url();?>assets/modals.js"></script>