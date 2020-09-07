<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ImOn! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/build/css/custom.min.css?<?php echo time(); ?>" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <!--<a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>-->

      <div class="login_wrapper">

        <div id="register" class="form registration_form">
          <section class="login_content">
            <?php echo $this->session->flashdata('msg'); ?>
            <?php echo form_open('c_register/addPengguna'); ?>
              <h1>Buat Akun</h1>
              <div>
                <input type="text" class="form-control" placeholder="NIP" required="" name="nip"/>
                <span class="error"><?php echo form_error('nip'); ?></span>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Nama Lengkap" required="" name="nama"/>
                <span class="error"><?php echo form_error('nama'); ?></span>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Nama Pengguna" required="" name="username"/>
                <span class="error"><?php echo form_error('username'); ?></span>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Kata Sandi" required="" name="password"/>
                <span class="error"><?php echo form_error('password'); ?></span>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" required="" name="cpassword"/>
                <span class="error"><?php echo form_error('cpassword'); ?></span>
              </div>
              <div>
                <input type="text" class="form-control" placeholder="No. Telp" required="" name="no_telp"/>
                <span class="error"><?php echo form_error('no_telp'); ?></span>
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" name="email"/>
                <span class="error"><?php echo form_error('email'); ?></span>
              </div>
              
              <div>
                <input type="submit" name="btnKirim" value="Kirim"  class="btn btn-default pull-right" />
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah menjadi anggota?
                  <a href="<?php echo base_url();?>c_login" class="to_register"> Masuk </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-area-chart"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            <?php echo form_close(); ?>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
