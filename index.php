<?php
//inisialisasi session
session_start();
 
//mengecek username pada session
if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login.php');
}
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/images/favicon.png" type="image/ico" />

    <title> Manajemen Informatika STIKI </title>
    <link rel="shortcut icon" href="assets/images/toga.png">

    <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <center>
            &nbsp; <a href="index.php" class="fa fa-mortar-board fa-2x" style="color:#fff;"><span><font size="4.95" color="white" face="Helvetica Neue">APLIKASI MAHASISWA</font></span></a>
            </center>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              
              
              
              
            </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Sendra Rozin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                  </li>
                  <li><a href="#"><i class="fa fa-desktop"></i> Data Mahasiswa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil_mhs">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah_mhs">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-desktop"></i> Data Dosen <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil_dosen">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah_dosen">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-desktop"></i> Data Prodi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil_prodi">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah_prodi">Tambah Data</a></li>
                    </ul>
                  </li>
                                
              </div>
            </div>
           

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" >
                  <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src= alt="">Sendra Rozin
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                   
                    <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log In</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content - HALAMAN UTAMA ISI DISINI -->
        <div class="right_col" role="main">
      <?php
      $queries = array();
      parse_str($_SERVER['QUERY_STRING'], $queries);
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      switch ($queries['page']) {
      	case 'tampil_mhs':
      		# code...
      		include 'tampil.php';
      		break;
        case 'tampil_dosen':
          # code...
          include 'tampil_dosen.php';
          break;
        case 'tampil_prodi':
          # code...
          include 'tampil_prodi.php';
          break;
      	case 'tambah_mhs':
      		# code...
      		include 'tambah_mahsiswa.php';
      		break;
        case 'tambah_dosen':
          # code...
          include 'tambah_dosen.php';
          break;
        case 'tambah_prodi':
          # code...
          include 'tambah_prodi.php';
          break;  
        case 'edit_mhs':
        		# code...
        	include 'edit.php';
        	break;
        case 'edit_dosen':
        	# code...
        	include 'edit_dosen.php';
        	break;
        case 'edit_prodi':
          # code...
          include 'edit_prodi.php';
          break;
        case 'edit_mhs_save':
            # code...
            include 'edit.php';
            break;
        case 'edit_dosen_save':
          	# code...
            include 'edit_dosen.php';
            break;
        case 'edit_prodi_save':
            # code...
            include 'edit_prodi.php';
            break;
        default:
		        #code...
		        include 'home.php';
		        break;
  
         
        }
        ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          Copyright @ 2021 Aplikasi Mahasiswa : Sendra Rozin
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/skycons/skycons.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="assets/js/custom.min.js"></script>

  </body>
</html>
