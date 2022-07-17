  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
              <div class="pull-left image">
                  <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle"
                      alt="User Image">
              </div>
              <div class="pull-left info">
                  <p><?php echo $this->session->userdata('salesname'); ?></p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>
              <li class="active treview">
                  <a href="<?php echo base_url('admin/Dashboard') ?>"> <i class="fa fa-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="active treeview">
                  <a href="#">
                      <i class="fa fa-database"></i>
                      <span>Master Data</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="<?php echo base_url('admin/Datacustomer'); ?>"><i class="fa fa-archive"></i> Data
                              Customer</a></li>
                      <li><a href="<?php echo base_url('admin/Dataservice'); ?>"><i class="fa fa-archive"></i> Data
                              Service</a></li>
                      <li><a href="<?php echo base_url('admin/Datavendor'); ?>"><i class="fa fa-archive"></i> Data
                              Vendor</a></li>
                      <li><a href="<?php echo base_url('admin/Datasales');?>"><i class="fa fa-archive"></i> Data
                              Sales</a></li>
                      <li><a href="<?php echo base_url('admin/Datadept');?>"><i class="fa fa-archive"></i> Data
                              Department
                          </a></li>
                      <li><a href="<?php echo base_url('admin/Datanode');?>"><i class="fa fa-archive"></i> Data
                              Node
                          </a></li>
                  </ul>
              </li>
              </li>
              <li class="active treeview">
                  <a href="#">
                      <i class="fa fa-users"></i>
                      <span>VNP</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href="<?php echo base_url('admin/Margin');?>"><i class="fa fa-folder-open"></i> Data
                              Margin Check</a></li>
                      <li><a href="<?php echo base_url('admin/Dataprogpo');?>"><i class="fa fa-folder-open"></i> Data
                              Progress PO</a></li>
                      <li><a href="<?php echo base_url('admin/Databast');?>"><i class="fa fa-folder-open"></i> Data BAST
                              Vendor</a></li>
                      <li><a href=""><i class="fa fa-folder-open"></i> Data Evaluasi Vendor</a></li>
                  </ul>
              </li>

              <li class="treeview">
                  <a href="#">
                      <i class="fa fa-users"></i>
                      <span>Reports</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li><a href=""><i class="fa fa-folder-open"></i> Margin Report</a></li>
                      <li><a href="<?php echo base_url('admin/Reportpo');?>"><i class="fa fa-folder-open"></i>
                              Progress PO Report
                          </a></li>
                      <li><a href=""><i class="fa fa-folder-open"></i> Invoice Report</a></li>
                      <li><a href=""><i class="fa fa-folder-open"></i> Vendor Evaluation Report</a></li>
                  </ul>
              </li>









          </ul>
      </section>
      <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <h1>
              Dashboard
              <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
          </ol>
      </section>