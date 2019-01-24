<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?PHP $a=$this->db->query('select * from mst_mainapp')->result_array();?>
  <title><?php echo $a[0]['nama_mainapp'];?> | MODUL PEMBANGUNAN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link href="<?php echo base_url();?>/assets/fa/css/all.css" rel="stylesheet">

  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/css/skins/skin-red.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-red fixed">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="<?php echo base_url();?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>PP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><?php echo $a[0]['nama_mainapp'];?></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <?php
                $a=$this->db->query("select * from mst_organisasi where id_organisasi='".$this->session->id_organisasi."'")->result_array();
                
                if($a[0]['foto_organisasi']=="")
                {
                    echo '<img src="'.base_url().'assets/dist/img/avatar.png" class="user-image" alt="User Image">';
                }
                else
                {
                  echo '<img src="'.base_url().'assets/upload/'.$a[0]['foto_organisasi'].'" class="user-image" alt="User Image">';
                }
              ?>

                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">
                  <?php echo $this->session->id_user;?>&nbsp;(
                  <?php $a=$this->db->query("select nama_group_user from group_user where id_group_user='".$this->session->group_user."'")->result_array(); echo $a[0]['nama_group_user'];?>)</span>
              </a>
            </li>

            <li>
              <a href="<?php echo base_url();?>index.php/auth/logout"><i class="fa fa-power-off"></i></a>
            </li>
            <!-- Control Sidebar Toggle Button -->

          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel" style="height:80px;">
          <div class="pull-left image">
            <?php
                $a=$this->db->query("select * from mst_organisasi where id_organisasi='".$this->session->id_organisasi."'")->result_array();
                
                if($a[0]['foto_organisasi']=="")
                {
                    echo '<img src="'.base_url().'assets/dist/img/avatar.png" class="img-circle" alt="User Image" >';
                }
                else
                {
                  echo '<img src="'.base_url().'assets/upload/'.$a[0]['foto_organisasi'].'" class="img-circle" alt="User Image" style="">';
                }
          ?>

          </div>
          <div class="pull-left info">
            <p>
              <?php echo $this->session->id_user;?>&nbsp;</p>
            <p>(
              <?php $a=$this->db->query("select nama_group_user from group_user where id_group_user='".$this->session->group_user."'")->result_array(); echo $a[0]['nama_group_user'];?>)</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li><a href="<?php echo base_url();?>index.php/modul_list"><i class="fas fa-arrow-alt-circle-left"></i> <span>
                Kembali ke Menu Modul</span></a></li>
          <li class=""><a href="<?php echo base_url();?>index.php/modul_pembangunan/beranda"><i class="fa fa-home"></i>
              <span>Beranda</span></a></li>
          <li class="header">LIST MENU</li>
          <!-- Optionally, you can add icons to the links -->

          <?php
            $dummy_gu=$this->session->group_user;
            $data_group_priv=$this->db->query("SELECT gp.*, (SELECT nama_submenu FROM submenu WHERE id=gp.id_submenu) AS nama_submenu, (SELECT link_submenu FROM submenu WHERE id=gp.id_submenu) AS link_submenu, (SELECT id_menu FROM submenu WHERE id=gp.id_submenu) AS id_menu, (SELECT order_submenu FROM submenu WHERE id=gp.id_submenu) AS order_submenu FROM group_priv gp WHERE id_group_user='".$dummy_gu."' AND is_priv='1' ORDER BY order_submenu ASC")->result_array();
            $data_menu=$this->db->query("select * from menu where id_modul='17' order by order_menu asc" )->result_array();
            // $data_submenu=$this->db->query("select * from submenu " )->result_array();
            if(count($data_menu))
            {
                foreach($data_menu as $ls)
                {
                      echo '<li class="treeview">';
                      echo '        <a href="#"><i class="'.$ls['icon_menu'].'"></i> <span>&nbsp;'.$ls['nama_menu'].'</span>';
                      echo '          <span class="pull-right-container">';
                      echo '              <i class="fa fa-angle-left pull-right"></i>';
                      echo '            </span>';
                      echo '        </a>';
                      echo '        <ul class="treeview-menu" style="display: none;">';
                      foreach($data_group_priv as $d)
                      {
                          if($d['id_menu']==$ls['id'])
                          {
                            echo '<li><a disabled href="'.base_url().''.$d['link_submenu'].'"><i class="far fa-dot-circle"></i> '.$d['nama_submenu'].'</a></li>';
                          }
                      }
                      echo '        </ul>';
                      echo '</li>';
                }
            }
        ?>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php $this->load->view($page);?>
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
      <?PHP $a=$this->db->query('select * from mst_mainapp')->result_array();?>
    <?php echo $a[0]['nama_mainapp'];?> rev 1.0
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; <?php echo $a[0]['tahun_mainapp'];?> <a href="#"><?php echo $a[0]['instansi_mainapp'];?></a>.</strong> All rights reserved.
    </footer>


  </div>

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->



  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>