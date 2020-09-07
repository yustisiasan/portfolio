<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Roadmap Penelitian</h3>
              </div>

              <div class="title_right">
                
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          <b>Penelitian Unggulan</b>
                          <br>
                          <br>
                          <b>Bidang Penelitian</b>
                          <br>
                          <br>
                          <b>Produk</b>
                          <br>
                          <br>
                          <b>Alat</b>
                          <br>
                          <br>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-8 invoice-col">
                        <?php
                        if($rm['id_roadmap']!=''){
                            echo'
                            <b>: '.$rm['penelitian_unggulan'].'</b>
                            <br>
                            <br>
                            <b>: '.$rm['bidang_penelitian'].' </b>
                            <br>
                            <br>
                            <b>: '.$rm['produk'].'</b>
                            <br>
                            <br>
                            <b>: '.$rm['alat'].'</b>
                            <br>
                            <br>
                            <a href="#modalUbah" class="btn btn-info" data-toggle="modal" data-id="'.$rm['id_roadmap'].'" data-pu="'.$rm['penelitian_unggulan'].'" data-bp="'.$rm['bidang_penelitian'].'" data-prod="'.$rm['produk'].'" data-alat="'.$rm['alat'].'"> Ubah Data</a>

                        ';
                        }else{
                            echo'
                            <b>: Data belum diisi</b>
                            <br>
                            <br>
                            <b>: Data belum diisi </b>
                            <br>
                            <br>
                            <b>: Data belum diisi</b>
                            <br>
                            <br>
                            <b>: Data belum diisi</b>
                            <br>
                            <br>
                            <a href="#modalTambah" class="btn btn-info" data-toggle="modal" > Tambah Data</a>

                        ';
                        }
                        
                        ?>
                          
                        </div>
                      </div>
                      <div class="ln_solid"></div>

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Tahun</th>
                          <th>Penelitian dan Pengembangan</th>
                          <th>Sub Bidang</th>
                          <th>Luaran Penelitian</th>
                          <th>Target Hibah Penelitian</th>
                          <th>Judul/Topik PA Mahasiswa</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no=1;
                          foreach ($tabelrm as $key) {
                            echo '
                            <tr>
                              <td>'.$key['tahun'].'</td>
                              <td>'.$key['kegiatan'].'</td>
                              <td>'.$key['sub_bidang'].'</td>
                              <td>'.$key['luaran'].'</td>
                              <td>'.$key['target_hibah'].'</td>
                              <td>'.$key['judul'].'</td>
                              <td><a href="#tabelUbah" data-toggle="modal"  data-id="'.$key['id_roadmap'].'" data-th="'.$key['tahun'].'" data-kg="'.$key['kegiatan'].'" data-sb="'.$key['sub_bidang'].'" data-luar="'.$key['luaran'].'" data-trg="'.$key['target_hibah'].'" data-jdl="'.$key['judul'].'"><i class="fa fa-edit"></i> Ubah</a></td>
                            </tr>';
                            $no++;
                          }
                          if($no==1){
                              echo'
                              <tr>
                                <td colspan="7" align="center">Data Kosong</td>
                              </tr>
                              ';
                            }
                        ?>
                      </tbody>
                    </table>
                  <div class="fa-hover col-md-3 col-sm-4 col-xs-12"><a href="<?php echo base_url();?>c_roadmap/tambah/<?=$rm['id_roadmap']?>"><i class="fa fa-plus-circle"></i> Tambah Roadmap</a>
                        </div>
                  </div>
                </div>
            

              <div class="clearfix"></div>

            </div>
          </div>
        </div>
        <!-- /page content -->

    <!--modal-->
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method= "POST" action="<?php echo base_url();?>c_roadmap/tambahHead">
                    <div class="modal-header">
                        <center><h4>Tambah Data Roadmap</h4></center>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Penelitian Unggulan</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" placeholder="Masukkan Data" name="penelitian_unggulan">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Bidang Penelitian</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" class="form-control" placeholder="Masukkan Data" name="bidang_penelitian">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Produk</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea class="form-control" rows="3" placeholder='' name="produk"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Alat</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea class="form-control" rows="3" placeholder='' name="alat"></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!--<button type="submit" class="btn btn-success" name="ubah">Ubah</button>-->
                        <input type="submit" class="btn btn-success" name="kirim" value="Kirim">
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalUbah" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method= "POST" action="<?php echo base_url();?>c_roadmap/ubahHead">
                    <div class="modal-header">
                        <center><h4>Ubah Data Roadmap</h4></center>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_roadmap" class="form-control" placeholder="Masukkan Data" name="id_roadmap">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Penelitian Unggulan</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="id_pu" class="form-control" placeholder="Masukkan Data" name="penelitian_unggulan">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Bidang Penelitian</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="id_bp" class="form-control" placeholder="Masukkan Data" name="bidang_penelitian">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Produk</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea class="form-control" id="id_prod" rows="3" placeholder='' name="produk"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Alat</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <textarea class="form-control" id="id_alat" rows="3" placeholder='' name="alat"></textarea>
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

        <div class="modal fade" id="tabelUbah" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method= "POST" action="<?php echo base_url();?>c_roadmap/ubahRoadmap">
                    <div class="modal-header">
                        <center><h4>Ubah Tabel Roadmap</h4></center>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="tbid_roadmap" class="form-control" placeholder="Masukkan Data" name="id_roadmap">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="number" id="id_th" class="form-control" placeholder="Masukkan Data" name="tahun">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Kegiatan</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="id_kg" class="form-control" placeholder="Masukkan Data" name="kegiatan">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Bidang</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="id_sb" class="form-control" placeholder="Masukkan Data" name="sub_bidang">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Luaran</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="id_luar" class="form-control" placeholder="Masukkan Data" name="luaran">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Target Hibah</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="id_trg" class="form-control" placeholder="Masukkan Data" name="target_hibah">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul/Topik PA Mahasiswa</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <input type="text" id="id_jdl" class="form-control" placeholder="Masukkan Data" name="judul">
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
                var rowpu = $(e.relatedTarget).data('pu');
                var rowbp = $(e.relatedTarget).data('bp');
                var rowprod = $(e.relatedTarget).data('prod');
                var rowalat = $(e.relatedTarget).data('alat');

                $("#id_roadmap").val(rowid);
                $("#id_pu").val(rowpu);
                $("#id_bp").val(rowbp);
                $("#id_prod").val(rowprod);
                $("#id_alat").val(rowalat);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#tabelUbah').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                var rowth = $(e.relatedTarget).data('th');
                var rowkg = $(e.relatedTarget).data('kg');
                var rowsb = $(e.relatedTarget).data('sb');
                var rowluar = $(e.relatedTarget).data('luar');
                var rowtrg = $(e.relatedTarget).data('trg');
                var rowjdl = $(e.relatedTarget).data('jdl');

                $("#tbid_roadmap").val(rowid);
                $("#id_th").val(rowth);
                $("#id_kg").val(rowkg);
                $("#id_sb").val(rowsb);
                $("#id_luar").val(rowluar);
                $("#id_trg").val(rowtrg);
                $("#id_jdl").val(rowjdl);
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

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>

    <script src="<?php echo base_url();?>assets/modals.js"></script>