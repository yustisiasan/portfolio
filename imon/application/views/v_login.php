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
    <link href="<?php echo base_url();?>assets/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <!--<a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>-->

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo base_url() ?>c_login/login_proses" method="post">
              <h1>Form Masuk</h1>
              <?php echo $this->session->flashdata('msg'); ?>
              <div>
                <input type="text" class="form-control" placeholder="Nama Pengguna" required="" name="username"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Kata Sandi" required="" name="password"/>
              </div>
              <div>
                <input type="submit" name="btnMasuk" value="Masuk" class="btn btn-default submit" />  
				        <!-- <a class="reset_pass" href= "<?php echo base_url();?>c_login/lupaPassword">Lupa Kata Sandi?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Pengguna Baru?
                  <a href="<?php echo base_url();?>c_register" class="to_register"> Buat Akun </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-area-chart"></i> ImOn!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
