<!DOCTYPE html>
                <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              
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
                    <h2>Pencapaian Kinerja Dosen</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <a href="<?php echo base_url();?>c_pencapaian"><i class="fa fa-plus-circle"></i> Tambah Pencapaian</a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          <b>NIP</b>
                          <br>
                          <br>
                          <b>Nama</b>
                          <br>
                          <br>
                          <b>Kelompok Keahlian</b>
                          <br>
                          <br>
                          <b>Periode</b>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                          <b>: <?=$profil['nip']?></b>
                          <br>
                          <br>
                          <b>: <?=$profil['nama']?></b>
                          <br>
                          <br>
                          <b>: <?=$profil['namaKK']?></b>
                          <br>
                          <br>
                          <b> 
                            <select id="heard" class="form-control" required>
                              <option value="Semua">Semua</option>
                              <option value="Triwulan1">Triwulan 1</option>
                              <option value="Triwulan2">Triwulan 2</option>
                              <option value="Triwulan3">Triwulan 3</option>
                              <option value="Triwulan4">Triwulan 4</option>
                            </select>
                          </b>
                        </div>
                      </div>
                      <br>
                      <br>
                    <!-- start project list -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Publikasi</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Penelitian</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Abdimas</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">HAKI</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content5" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Buku Ajar</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content6" role="tab" id="profile-tab5" data-toggle="tab" aria-expanded="false">Sertifikasi</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content7" role="tab" id="profile-tab6" data-toggle="tab" aria-expanded="false">Blog</a>
                            </li>
                          </ul>
                          <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                 <tr>
                                    <th style="width: 1%">No</th>
                                    <th style="width: 20%">Judul</th>
                                    <th>Jenis</th>
                                    <th>Tempat, Tanggal Terbit</th>
                                    <th>Periode</th>
                                    <th>Kemajuan Pencapaian</th>
                                    <th>Status</th>
                                    <th style="width: 5%">Aksi</th>
                                 </tr>
                                </thead>

                                <tbody id="tabelPencapaian">
                                  <?php
                                    $no=1;
                                    foreach ($ppublikasi as $key) {
                                      echo'
                                        <tr>
                                          <td>'.$no.'</td>
                                          <td>
                                            <a>'.$key["judul"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["jenis_publikasi"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["tempat_terbit"].', '.$key["tgl_terbit"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["periode"].'</a>
                                          </td>
                                          <td class="project_progress">
                                            <div class="progress progress_sm">
                                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="'.($key["progress"]/$jum_indikator[$no-1]*100).'"></div>
                                            </div>
                                            <small>'.($key["progress"]/$jum_indikator[$no-1]*100).'% </small>
                                          </td>';
                                          if (($key['status'])=='Menunggu'){
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-clock-o"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }else{
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-check-square"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }
                                      echo'    
                                          <td>
                                            <a href="#ubahPublikasi" data-toggle="modal" data-id="'.$key['id_pencapaian'].'" data-ta="'.$key['tgl_awal'].'" data-tak="'.$key['tgl_akhir'].'" data-th="'.$key['tahun'].'" data-prd="'.$key['periode'].'" data-jp="'.$key['jenis_publikasi'].'" data-jdl="'.$key['judul'].'" data-tmpt="'.$key['tempat_terbit'].'" data-ket="'.$key['keterangan'].'" data-tgt="'.$key['tgl_terbit'].'" data-jenis="publikasi" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah </a>
                                          </td>
                                        </tr>
                                      ';
                                      $no++;
                                    }
                                    if($no==1){
                                      echo'
                                        <tr>
                                          <td colspan="8" align="center">Data Kosong</td>
                                        </tr>
                                      ';
                                    }
                                  ?>      
                                </tbody>
                              </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                 <tr>
                                    <th style="width: 1%">No</th>
                                    <th style="width: 20%">Judul</th>
                                    <th>Jenis</th>
                                    <th>Ketua</th>
                                    <th>Periode</th>
                                    <th>Kemajuan Pencapaian</th>
                                    <th>Status</th>
                                    <th style="width: 5%">Aksi</th>
                                 </tr>
                                </thead>

                                <tbody id="tabelPencapaian">
                                  <?php
                                    $no=1;
                                    foreach ($ppenelitian as $key) {
                                      echo'
                                        <tr>
                                          <td>'.$no.'</td>
                                          <td>
                                            <a>'.$key["judul"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["jenis_penelitian"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["ketua"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["periode"].'</a>
                                          </td>
                                          <td class="project_progress">
                                            <div class="progress progress_sm">
                                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="'.($key["progress"]/$jml_ipen[$no-1]*100).'"></div>
                                            </div>
                                            <small>'.($key["progress"]/$jml_ipen[$no-1]*100).'% </small>
                                          </td>';
                                          if (($key['status'])=='Menunggu'){
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-clock-o"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }else{
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-check-square"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }
                                      echo'    
                                          <td>
                                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah </a>
                                          </td>
                                        </tr>
                                      ';
                                      $no++;
                                    }
                                    if($no==1){
                                      echo'
                                        <tr>
                                          <td colspan="8" align="center">Data Kosong</td>
                                        </tr>
                                      ';
                                    }
                                  ?>      
                                </tbody>
                              </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                 <tr>
                                    <th style="width: 1%">No</th>
                                    <th style="width: 20%">Judul</th>
                                    <th>Ketua</th>
                                    <th>Anggota</th>
                                    <th>Periode</th>
                                    <th>Kemajuan Pencapaian</th>
                                    <th>Status</th>
                                    <th style="width: 5%">Aksi</th>
                                 </tr>
                                </thead>

                                <tbody id="tabelPencapaian">
                                  <?php
                                    $no=1;
                                    foreach ($ppengmas as $key) {
                                      echo'
                                        <tr>
                                          <td>'.$no.'</td>
                                          <td>
                                            <a>'.$key["judul"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["ketua"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["anggota"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["periode"].'</a>
                                          </td>
                                          <td class="project_progress">
                                            <div class="progress progress_sm">
                                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="'.($key["progress"]/$jml_ipeng[$no-1]*100).'"></div>
                                            </div>
                                            <small>'.($key["progress"]/$jml_ipeng[$no-1]*100).'% </small>
                                          </td>';
                                          if (($key['status'])=='Menunggu'){
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-clock-o"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }else{
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-check-square"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }
                                      echo'    
                                          <td>
                                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah </a>
                                          </td>
                                        </tr>
                                      ';
                                      $no++;
                                    }
                                    if($no==1){
                                      echo'
                                        <tr>
                                          <td colspan="8" align="center">Data Kosong</td>
                                        </tr>
                                      ';
                                    }
                                  ?>      
                                </tbody>
                              </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                 <tr>
                                    <th style="width: 1%">No</th>
                                    <th style="width: 20%">Judul</th>
                                    <th>Nama Pemegang</th>
                                    <th>Tanggal</th>
                                    <th>Periode</th>
                                    <th>Kemajuan Pencapaian</th>
                                    <th>Status</th>
                                    <th style="width: 5%">Aksi</th>
                                 </tr>
                                </thead>

                                <tbody id="tabelPencapaian">
                                  <?php
                                    $no=1;
                                    foreach ($phaki as $key) {
                                      echo'
                                        <tr>
                                          <td>'.$no.'</td>
                                          <td>
                                            <a>'.$key["judul"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["nama"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["tanggal"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["periode"].'</a>
                                          </td>
                                          <td class="project_progress">
                                            <div class="progress progress_sm">
                                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="'.($key["progress"]/$jml_ihak[$no-1]*100).'"></div>
                                            </div>
                                            <small>'.($key["progress"]/$jml_ihak[$no-1]*100).'% </small>
                                          </td>';
                                          if (($key['status'])=='Menunggu'){
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-clock-o"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }else{
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-check-square"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }
                                      echo'    
                                          <td>
                                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah </a>
                                          </td>
                                        </tr>
                                      ';
                                      $no++;
                                    }
                                    if($no==1){
                                      echo'
                                        <tr>
                                          <td colspan="8" align="center">Data Kosong</td>
                                        </tr>
                                      ';
                                    }
                                  ?>      
                                </tbody>
                              </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                 <tr>
                                    <th style="width: 1%">No</th>
                                    <th style="width: 20%">Judul</th>
                                    <th>Nama Penulis</th>
                                    <th>Nama Penerbit</th>
                                    <th>Periode</th>
                                    <th>Kemajuan Pencapaian</th>
                                    <th>Status</th>
                                    <th style="width: 5%">Aksi</th>
                                 </tr>
                                </thead>

                                <tbody id="tabelPencapaian">
                                  <?php
                                    $no=1;
                                    foreach ($pbukuajar as $key) {
                                      echo'
                                        <tr>
                                          <td>'.$no.'</td>
                                          <td>
                                            <a>'.$key["judul"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["nama_penulis"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["nama_penerbit"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["periode"].'</a>
                                          </td>
                                          <td class="project_progress">
                                            <div class="progress progress_sm">
                                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="'.($key["progress"]/$jml_iba[$no-1]*100).'"></div>
                                            </div>
                                            <small>'.($key["progress"]/$jml_iba[$no-1]*100).'% </small>
                                          </td>';
                                          if (($key['status'])=='Menunggu'){
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-clock-o"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }else{
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-check-square"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }
                                      echo'    
                                          <td>
                                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah </a>
                                          </td>
                                        </tr>
                                      ';
                                      $no++;
                                    }
                                    if($no==1){
                                      echo'
                                        <tr>
                                          <td colspan="8" align="center">Data Kosong</td>
                                        </tr>
                                      ';
                                    }
                                  ?>      
                                </tbody>
                              </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content6" aria-labelledby="profile-tab">
                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                 <tr>
                                    <th style="width: 1%">No</th>
                                    <th style="width: 20%">No. Sertifikat</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Periode</th>
                                    <th>Kemajuan Pencapaian</th>
                                    <th>Status</th>
                                    <th style="width: 5%">Aksi</th>
                                 </tr>
                                </thead>

                                <tbody id="tabelPencapaian">
                                  <?php
                                    $no=1;
                                    foreach ($psertifikasi as $key) {
                                      echo'
                                        <tr>
                                          <td>'.$no.'</td>
                                          <td>
                                            <a>'.$key["no_sertifikat"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["nama"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["tanggal"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["periode"].'</a>
                                          </td>
                                          <td class="project_progress">
                                            <div class="progress progress_sm">
                                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="'.($key["progress"]/$jml_iser[$no-1]*100).'"></div>
                                            </div>
                                            <small>'.($key["progress"]/$jml_iser[$no-1]*100).'% </small>
                                          </td>';
                                          if (($key['status'])=='Menunggu'){
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-clock-o"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }else{
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-check-square"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }
                                      echo'    
                                          <td>
                                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah </a>
                                          </td>
                                        </tr>
                                      ';
                                      $no++;
                                    }
                                    if($no==1){
                                      echo'
                                        <tr>
                                          <td colspan="8" align="center">Data Kosong</td>
                                        </tr>
                                      ';
                                    }
                                  ?>      
                                </tbody>
                              </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content7" aria-labelledby="profile-tab">
                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                 <tr>
                                    <th style="width: 1%">No</th>
                                    <th style="width: 20%">judul</th>
                                    <th>Tanggal Posting</th>
                                    <th>Link</th>
                                    <th>Periode</th>
                                    <th>Kemajuan Pencapaian</th>
                                    <th>Status</th>
                                    <th style="width: 5%">Aksi</th>
                                 </tr>
                                </thead>

                                <tbody id="tabelPencapaian">
                                  <?php
                                    $no=1;
                                    foreach ($pblog as $key) {
                                      echo'
                                        <tr>
                                          <td>'.$no.'</td>
                                          <td>
                                            <a>'.$key["judul"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["tgl_posting"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["link"].'</a>
                                          </td>
                                          <td>
                                            <a>'.$key["periode"].'</a>
                                          </td>
                                          <td class="project_progress">
                                            <div class="progress progress_sm">
                                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="'.($key["progress"]/$jml_iblog[$no-1]*100).'"></div>
                                            </div>
                                            <small>'.($key["progress"]/$jml_iblog[$no-1]*100).'% </small>
                                          </td>';
                                          if (($key['status'])=='Menunggu'){
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-clock-o"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }else{
                                              echo'
                                                <td>
                                                  <a><i class="fa fa-check-square"></i>  '.$key["status"].'</a> 
                                                </td>
                                              ';
                                          }
                                      echo'    
                                          <td>
                                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ubah </a>
                                          </td>
                                        </tr>
                                      ';
                                      $no++;
                                    }
                                    if($no==1){
                                      echo'
                                        <tr>
                                          <td colspan="8" align="center">Data Kosong</td>
                                        </tr>
                                      ';
                                    }
                                  ?>      
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  </div>
                </div>
              </div>
       
            </div>
          </div>
        </div>
        <!-- /page content -->


        <div class="modal fade" id="ubahPublikasi" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method= "POST" action="<?php echo base_url();?>c_perencanaan/ubahRencana">
                    <div class="modal-header">
                        <center><h4>Ubah Publikasi</h4></center>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" id="id_pencapaian" class="form-control" placeholder="Masukkan Data" name="id_pencapaian">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Awal</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="id_ta" class="form-control" placeholder="Masukkan Data" name="tgl_awal">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Akhir</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="id_tak" class="form-control" placeholder="Masukkan Data" name="tgl_akhir">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="id_th" class="form-control" placeholder="Masukkan Data" name="tahun">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Periode</label>
                        <div class="col-md-9 col-sm-9 col-xs-12" id="periode" >
                          <select class="form-control" id="id_prd" name="periode" required>
                              <option value="Triwulan1">Triwulan 1</option>
                              <option value="Triwulan2">Triwulan 2</option>
                              <option value="Triwulan3">Triwulan 3</option>
                              <option value="Triwulan4">Triwulan 4</option>
                          </select>
                        </div>
                      </div>
                      <div id="dataubah"></div>
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
          function hasilPencapaian(a) {
            var jenis=$('#jenis').val();
            //window.alert(jenis);
            if(jenis!=''){
              $.ajax({
                  type : 'post',
                  url : '<?=base_url();?>c_pencapaian/daftarIndikator',
                  data :  'jenis='+ jenis,
                  success : function(data){
                    $('#tabelPencapaian').html(data);//menampilkan data ke dalam modal
                    //window.alert(data);
                  }
              });
            }
            
            /*$.ajax({
                type : 'post',
                url : '<?=base_url();?>c_pencapaian/getForm',
                data :  'jenis='+ jenis,
                success : function(data){
                  $('#step2').html(data);//menampilkan data ke dalam modal
                }
            });*/
          }
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#ubahPublikasi').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                var tgl_awal= $(e.relatedTarget).data('ta');
                var tgl_akhir = $(e.relatedTarget).data('tak');
                var tahun = $(e.relatedTarget).data('th');
                var periode = $(e.relatedTarget).data('prd');
                var jenis = $(e.relatedTarget).data('jenis');
                /*var jenis = $(e.relatedTarget).data('jp');
                var judul = $(e.relatedTarget).data('jdl');
                var tempat = $(e.relatedTarget).data('tmt');
                var ket = $(e.relatedTarget).data('ket');
                var tanggal = $(e.relatedTarget).data('tgt');*/
              //nampung var buat buktinya
                //window.alert(jenis);
                $("#periode").val(periode).change();
                $("#id_pencapaian").val(rowid);
                $("#id_ta").val(tgl_awal);
                $("#id_tak").val(tgl_akhir);
                $("#id_th").val(tahun);
                $("#id_prd").val(tahun);
                $("#id_jp").val(periode);
                /*$("#id_jdl").val(rowrhak);
                $("#id_tmt").val(rowrser);
                $("#id_ket").val(rowrpbl);
                $("#id_tgt").val(rowrprd);*/

                $.ajax({
                  type : 'post',
                  url : '<?=base_url();?>c_pencapaian/getFormUbah',
                  data :  'jenis='+ jenis+'&id='+rowid'&periode='+periode,
                  success : function(data){
                    $('#dataubah').html(data);
                    //window.alert(data);
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
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url();?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
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
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>
