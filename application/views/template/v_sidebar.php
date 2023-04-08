<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img style="background-color: white; padding: 5px 5px 5px 5px;" src="<?php echo base_url('assets/login/images/logopelindo.jpg')?>"" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->username ?></p>
          <a href="#"><i class="fa fa-circle"></i> Administrator</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"></li>
       <!--  <li>
          <a href="<?php echo site_url('ControllerDashboard') ?>">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
 -->        <li>
          <a href="<?php echo site_url('pelabuhan') ?>">
            <i class="fa fa-location-arrow"></i>
            <span>Tujuan Kapal</span>
          </a>
        </li>
	
        <li>
          <a href="<?php echo site_url('kapal') ?>">
            <i class="fa fa-anchor"></i>
            <span>Data Kapal</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('jadwal') ?>">
            <i class="fa fa-calendar"></i>
            <span>Jadwal</span>
          </a>
        </li>

        <li>
          <a href="<?php echo site_url('laporan') ?>">
            <i class="fa fa-line-chart"></i>
            <span>Laporan</span>
          </a>
        </li>
         
        <li>
          <a href="<?php echo site_url('user') ?>">
            <i class="fa fa-user"></i>
            <span>User</span>
          </a>
        </li>
        <li class="header"></li>
        <li>
          <a href="<?php echo site_url('login/logout') ?>">
            <i class="fa fa-sign-out"></i>
            <span>Keluar</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
