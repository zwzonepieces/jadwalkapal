<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jadwal Kapal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap-4.1.3/dist/css/bootstrap.min.css')?>">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <!-- logo -->
  <link rel="SHORTCUT ICON" href="<?php echo base_url('assets/login/images/logopelindo.jpg')?>">
	<!-- style warna tulisan di dalam kolom atas -->
	<style>
		th{
      color: white;
    }	
	</style>
	<!-- menampilkan gambar kanan kiri di top -->
	<img src="<?php echo base_url('assets/login/images/pelindo.png')?>" width="170" height="40" align="left" alt="User Image" style="margin-left: 20px ;">
	<img src="<?php echo base_url('assets/login/images/bumn.png')?>" width="120" height="50" align="right" alt="User Image" style="margin-right: 20px;">
</head>


<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body>
	<div class="container" style="margin-top: 40px">
	<a>
    <h2><center><b>JADWAL KEDATANGAN DAN KEBERANGKATAN KAPAL</b></center></h2>
		<h4><center><b>PELABUHAN DWIKORA PONTIANAK</b></center></h4>
    <h5><center><b><?php echo longdate_indo(date("Y-m-d")); ?></b></center></h5>
	</a>
  </div> 
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <hr>
        <table class="table table-sm table-striped table-bordered table-responsive-sm ">
        <thead style="background-color: #0099FF ;">
          <tr>
            <th width="50px"><center>NO.</center> </th>
						<th width="250px"><center>NAMA KAPAL</center></th>            
            <th width="150px" ><center>KOTA ASAL</center></th>
						<th width="150px"><center>KOTA TUJUAN</center></th>            
            <th width="150px"><center>TANGGAL KEBERANGKATAN</center></th>
						<th width="150px"><center>TANGGAL KEDATANGAN</center></th>
          </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
				
        <?php foreach($jadwal as $jad)
				 { ?>
          <tr >
            <td align="center"><b><?php echo $no++."."; ?></b> </td>
						<td><b><?php echo $jad->nm_kapal ?></td>
            <td align="center"><b><?php echo strtoupper($jad->pelabuhan_asal) ?></b></td>
						<td align="center"><b><?php echo strtoupper($jad->pelabuhan_tujuan) ?></b></td>              
						<td align="center"><b><?php echo date ($jad->tgl_berangkat) ?></b></td>
						<td align="center"><b><?php echo date ($jad->tgl_datang) ?></td>		
          </tr>
        <?php } ?>
        </tbody>
        </table>
        <a href="<?php echo site_url('') ?>" class="btn btn-danger"><i></i> Kembali</a>
      </div>    
    </div>
  </div>
<!-- jQuery 3 -->
<script src="<?php echo site_url('assets/AdminLTE/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo site_url('assets/bootstrap-4.1.3/dist/js/bootstrap.min.js')?>"></script>
</body>
</html>

