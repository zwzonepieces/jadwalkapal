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
          <p><?php echo $this->session->level ?></p>
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
 -->     
        <li class="treeview <?php if($this->uri->uri_string() == '#'){ echo 'active';}?>"> 
          <a href="#">
              <i class="fa fa-pencil-square"></i>
              <span>Data </span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>  
          <ul class="treeview-menu">
            <li li class="<?php if($this->uri->uri_string() == 'data/pelabuhan'){ echo 'active';}?>">
              <a href="<?php echo site_url('pelabuhan') ?>" class="cursor">
                <i class="fa fa-location-arrow"></i>
                <span>Pelabuhan</span>
              </a>
            </li>
            <li class=" <?php if($this->uri->uri_string() == 'data/kapal'){ echo 'active';}?>">
              <a href="<?php echo site_url('kapal') ?>" class="cursor">
                <i class="fa fa-anchor"></i>
                <span>Data Kapal</span>
              </a>
            </li>

            <li class=" <?php if($this->uri->uri_string() == 'data/#'){ echo 'active';}?>">
              <a href="<?php echo site_url('staf') ?>" class="cursor">
                <i class="fa fa-users"></i>
                <span>Staf</span>
              </a>
            </li>
          </ul>
        <li class="treeview <?php if($this->uri->uri_string() == '#'){ echo 'active';}?>"> 
          <a href="#">
            <i class="fa fa-calendar-o"></i>
            <span>Jadwal </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>  
          <ul class="treeview-menu">   
            <li>
              <a href="<?php echo site_url('jadwal') ?>">
                <i class="fa fa-calendar-check-o"></i>
                <span>Kedatangan</span>
              </a>
            </li>

            <li>
              <a href="<?php echo site_url('berangkat') ?>">
                <i class="fa fa-calendar-minus-o"></i>
                <span>Keberangkatan</span>
              </a>
            </li>
          </ul>
        <li class="treeview <?php if($this->uri->uri_string() == '#'){ echo 'active';}?>"> 
          <a href="#">
            <i class="fa fa-line-chart"></i>
            <span>Laporan </span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="<?php echo site_url('laporan') ?>">
                <i class="fa "></i>
                <span>Laporan Jadwal</span>
              </a>
            </li>
            <li>
              <a href="<?php echo site_url('laporandetail') ?>">
                <i class="fa "></i>
                <span>Laporan Detail</span>
              </a>
            </li>
          </ul>
         
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
