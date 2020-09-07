<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Informasi</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <style type="text/css">
             .dropdown{
                font-weight: bold;
              }
           </style>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
                      <!-- <select class="form-control">
                            <option value="">Pilih</option>
                            <option value="publikasi">Seminar</option>
                            <option value="penelitian">Kegiatan</option>
                        </select> -->
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <a href="<?php echo base_url();?>c_informasi/tambahInfo"><i class="fa fa-plus-circle"></i> Tambah Informasi</a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <div class="row">
                  <?php
                    foreach ($informasi as $info) {
                      echo '
                        <div class="col-md-55">
                          <div class="thumbnail">
                            <div class="image view view-first">
                              <img style="width: 100%; display: block;" src="'.base_url().'assets/images/informasi/'.$info['poster'].'" alt="image" />
                              <div class="mask no-caption">
                                <div class="tools tools-bottom">
                                  <a href="#largeModal" data-toggle="modal" data-gambar="'.base_url().'assets/images/informasi/'.$info['poster'].'"><i class="fa fa-eye"></i></a>
                                  <a href="#modalUbah" data-toggle="modal" data-id="'.$info['id_informasi'].'" data-jenis="'.$info['jenis'].'" data-judul="'.$info['judul'].'" data-link="'.$info['link'].'" data-poster="'.$info['poster'].'" ><i class="fa fa-pencil"></i></a>
                                  <a href="#modalHapus" data-toggle="modal" data-id="'.$info['id_informasi'].'"><i class="fa fa-times"></i></a>
                                </div>
                              </div>
                            </div>
                            <div class="caption">
                              <p><strong>'.$info['judul'].'</strong>
                              </p>
                              <p><a href="'.$info['link'].'">Link Info</a></p>
                            </div>
                          </div>
                        </div> ';

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

        <!--modal-->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="fetched-data"></div>
                    </div>  
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalUbah" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method= "POST" action="<?php echo base_url();?>c_informasi/ubahInformasiDosen" enctype="multipart/form-data">
                    <div class="modal-header">
                        <center><h4>Ubah Informasi</h4></center>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" id="id_informasi" class="form-control" placeholder="Masukkan Data" name="id_informasi">
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" id="jenis">
                          <input type="hidden" name="username" value="<?php echo $this->session->userdata('username');?>">
                          <select class="form-control" id="id_jenis" name="jenis" required>
                              $("#periode").val("rowrprd").change();
                              <option value="" >Pilih</option>
                              <option value="Seminar">Seminar</option>
                              <option value="Kegiatan">Kegiatan</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" id="id_judul" placeholder="" name="judul" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Link</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="url" class="form-control"  id="id_link" name="link" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Poster</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="file" class="form-control" id="id_poster" name="poster">
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

        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog">
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
          $('#largeModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('gambar');
            var poster = "<img src='"+rowid+"' width='100%' height='100%'>";
            //menggunakan fungsi ajax untuk pengambilan data
            $('.fetched-data').html(poster);
           });
        });
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
            $('#modalUbah').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                var rowjenis = $(e.relatedTarget).data('jenis');
                var rowjudul = $(e.relatedTarget).data('judul');
                var rowlink = $(e.relatedTarget).data('link');
                var rowposter = $(e.relatedTarget).data('poster');
                //window.alert(rowid+' '+rowjenis+' '+rowjudul+' '+rowlink+' '+rowposter);
                $("#id_informasi").val(rowid);
                $("#id_jenis").val(rowjenis).change();
                $("#id_judul").val(rowjudul);
                $("#id_link").val(rowlink);
                $("#id_poster").value=rowposter;
                
            });
        });
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
            $('#modalHapus').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //window.alert(rowid);
                $.ajax({
                    type : 'post',
                    url : '<?=base_url(); ?>c_informasi/vkonfHapus',
                    data :  'rowid='+ rowid,
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

        <!-- Custom Theme Scripts -->
        <script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>

        <script src="<?php echo base_url();?>assets/modals.js"></script>
