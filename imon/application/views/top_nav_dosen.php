<!-- top navigation 
</div>-->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url().'assets/images/'.$this->session->userdata('foto');?>" alt=""><?php echo $this->session->userdata('nama');?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!--<li><a href="<?php echo base_url();?>c_register/v_profile"> Profile</a></li>-->
                    <li><a href="#modalProfil" data-toggle='modal' data-id="<?php echo $this->session->userdata('username');?>"> Pengaturan</a></li>
                    <li><a href="<?php echo base_url().'c_login/logout';?>"><i class="fa fa-sign-out pull-right"></i> Keluar</a></li>
                  </ul>
                </li>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span class="badge bg-green" id="jumlahNotif"><?=count($notif)?></span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <?php
                      foreach ($notif as $key) {
                        echo '
                          <li>
                            <a href='.$key["url"].'>
                              <span>
                                <span class="message">'.$key["judul"].' '.$key["keterangan"].'</span>
                              </span>
                            </a>
                          </li>
                        ';
                      }
                    ?>
                    
                  </ul>
                </li>
                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!--modal-->
        <div class="modal fade" id="modalProfil" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method= "POST" action="<?php echo base_url();?>c_register/ubahDosen" enctype="multipart/form-data">
                    <div class="modal-header">
                        <center><h4>Pengaturan Profil</h4></center>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success" name="ubah" value="Ubah">
                    </div>
                </form>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#modalProfil').on('show.bs.modal', function (e) {
                var rowid = $(e.relatedTarget).data('id');
                //window.alert(rowid);
                $.ajax({
                    type : 'post',
                    url : '<?=base_url(); ?>c_register/settingDosen',
                    data :  'rowid='+ rowid,
                    success : function(data){
                    $('.fetched-data').html(data);//menampilkan data ke dalam modal
                    }
                });
            });
        });
        </script>
        <script src="<?php echo base_url();?>assets/modals.js"></script>