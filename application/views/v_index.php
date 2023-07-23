<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jadwal Kapal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE/dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo site_url('assets/AdminLTE/dist/css/skins/_all-skins.min.css')?>">
  <!-- logo -->
  <link rel="SHORTCUT ICON" href="<?php echo base_url('assets/login/images/logopelindo.jpg')?>">

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

  
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="http://wa.me/6285787926068/" target="_blank" class="navbar-brand"><b>PELABUHAN DWIKORA PONTIANAK</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <label class="pull-right" style="color: white; font-size: 16px; margin-top: 15px; margin-right: 15px;"><?php echo longdate_indo(date("Y-m-d")); ?></label>
          </li>  
        </ul>
      </div>


      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
        <div class="box box-default">
          <div class="box-body">
            <h3><center>Silahkan Pilih Menu Berikut : </center></h3>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                  <div class="inner" style="padding-bottom: 45px">
                    <h4 align='center'><b>Jadwal Kapal</b></h4>
                  </div>
                  <div class="icon">
                    <i class="fa fa-anchor fa-fw"></i>
                  </div>
                  <a href="<?php echo site_url('daftarjadwal') ?>" class="small-box-footer">Lihat  Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-md-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner" style="padding-bottom: 45px">
                    <h4 align='center'><b>Login Admin</b></h4>
                  </div>
                  <div class="icon">
                    <i class="fa fa-user"></i>
                  </div>
                  <a href="<?php echo site_url('login') ?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
                </div>
</div>
              <!-- ./col -->
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo site_url('assets/AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url('assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- SlimScroll -->
<script src="<?php echo site_url('assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo site_url('assets/AdminLTE/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo site_url('assets/AdminLTE/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo site_url('assets/AdminLTE/dist/js/demo.js')?>"></script>
</body>
</html>
