<?php

include("../dbConfig.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

	// ambil data dari formulir
	$namapekerjaan = $_POST['namapekerjaan'];
	$notiket = $_POST['notiket'];
	$lokasi = $_POST['lokasi'];
	$sto = $_POST['sto'];
	$witel = $_POST['witel'];
	$penyebab = $_POST['penyebab']; 
  $nip_pembuat = $_POST['nip_pembuat'];


    $jumlah_ft_sebelum = count($_FILES['gambar_ft_sebelum']['name']);
    $jumlah_ft_progress = count($_FILES['gambar_ft_progress']['name']);
    $jumlah_ft_sesudah = count($_FILES['gambar_ft_sesudah']['name']);

    if (($jumlah_ft_sebelum == 3)||($jumlah_ft_progress == 3)||($jumlah_ft_sesudah == 3)) {
      $gambar_ft_sebelum = array();
      $gambar_ft_progress = array();
      $gambar_ft_sesudah = array();

      for ($i=0; $i < $jumlah_ft_sebelum; $i++) { 
        $file_name = $_FILES['gambar_ft_sebelum']['name'][$i];
        $tmp_name = $_FILES['gambar_ft_sebelum']['tmp_name'][$i];        
        move_uploaded_file($tmp_name, "../lampiran/".$file_name);
        $gambar_ft_sebelum[$i] = $file_name;                 
      }

      for ($i=0; $i < $jumlah_ft_progress; $i++) { 
        $file_name = $_FILES['gambar_ft_progress']['name'][$i];
        $tmp_name = $_FILES['gambar_ft_progress']['tmp_name'][$i];        
        move_uploaded_file($tmp_name, "../lampiran/".$file_name);
        $gambar_ft_progress[$i] = $file_name;                 
      }

      for ($i=0; $i < $jumlah_ft_sesudah; $i++) { 
        $file_name = $_FILES['gambar_ft_sesudah']['name'][$i];
        $tmp_name = $_FILES['gambar_ft_sesudah']['tmp_name'][$i];        
        move_uploaded_file($tmp_name, "../lampiran/".$file_name);
        $gambar_ft_sesudah[$i] = $file_name;                 
      }

      //FOTO UNTUK DENAH
      $file_name = $_FILES['gambar_ft_denah']['name'];
      $tmp_name = $_FILES['gambar_ft_denah']['tmp_name'];        
      move_uploaded_file($tmp_name, "../lampiran/".$file_name);
      $gambar_ft_denah= $file_name;   

      mysqli_query($db,"INSERT INTO tb_lampiran(notiket,ft_sebelum_1,ft_sebelum_2,ft_sebelum_3,ft_progress_1,ft_progress_2,ft_progress_3,ft_sesudah_1,ft_sesudah_2,ft_sesudah_3,ft_denah) 
        VALUES('$notiket',
        '$gambar_ft_sebelum[0]','$gambar_ft_sebelum[1]','$gambar_ft_sebelum[2]',
        '$gambar_ft_progress[0]','$gambar_ft_progress[1]','$gambar_ft_progress[2]',
        '$gambar_ft_sesudah[0]','$gambar_ft_sesudah[1]','$gambar_ft_sesudah[2]',
        '$gambar_ft_denah'
        )"
      );

       //insert ke tabel tb_tiket
      mysqli_query($db,"INSERT INTO tb_tiket(notiket,nip_pembuat) VALUES ('$notiket','$nip_pembuat')");


      //insert ke tabel tb_order
       mysqli_query($db,"INSERT INTO tb_order (namapekerjaan, notiket, lokasi, kd_sto, kd_witel,penyebab)
                             VALUES ('$namapekerjaan',
                                     '$notiket',
                                     '$lokasi',
                                     '$sto',
                                     '$witel',
                                     '$penyebab')"
                                   );
      echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('index.php?page=input_order')</script>";
        
    }else if (($jumlah_ft_sebelum == 1)||($jumlah_ft_progress == 1)||($jumlah_ft_sesudah == 1)) {
      $gambar_ft_sebelum = array();
      $gambar_ft_progress = array();
      $gambar_ft_sesudah = array();

      for ($i=0; $i < $jumlah_ft_sebelum; $i++) { 
        $file_name = $_FILES['gambar_ft_sebelum']['name'][$i];
        $tmp_name = $_FILES['gambar_ft_sebelum']['tmp_name'][$i];        
        move_uploaded_file($tmp_name, "../lampiran/".$file_name);
        $gambar_ft_sebelum[$i] = $file_name;                 
      }

      for ($i=0; $i < $jumlah_ft_progress; $i++) { 
        $file_name = $_FILES['gambar_ft_progress']['name'][$i];
        $tmp_name = $_FILES['gambar_ft_progress']['tmp_name'][$i];        
        move_uploaded_file($tmp_name, "../lampiran/".$file_name);
        $gambar_ft_progress[$i] = $file_name;                 
      }

      for ($i=0; $i < $jumlah_ft_sesudah; $i++) { 
        $file_name = $_FILES['gambar_ft_sesudah']['name'][$i];
        $tmp_name = $_FILES['gambar_ft_sesudah']['tmp_name'][$i];        
        move_uploaded_file($tmp_name, "../lampiran/".$file_name);
        $gambar_ft_sesudah[$i] = $file_name;                 
      }

      //FOTO UNTUK DENAH
      $file_name = $_FILES['gambar_ft_denah']['name'];
      $tmp_name = $_FILES['gambar_ft_denah']['tmp_name'];        
      move_uploaded_file($tmp_name, "../lampiran/".$file_name);
      $gambar_ft_denah= $file_name;  

      
  
      //insert ke tabel tb_lampiran
      mysqli_query($db,"INSERT INTO tb_lampiran(notiket,ft_sebelum_1,ft_sebelum_2,ft_sebelum_3,ft_progress_1,ft_progress_2,ft_progress_3,ft_sesudah_1,ft_sesudah_2,ft_sesudah_3,ft_denah) 
        VALUES('$notiket',
        '$gambar_ft_sebelum[0]','','',
        '$gambar_ft_progress[0]','','',
        '$gambar_ft_sesudah[0]','','',
        '$gambar_ft_denah'
        )"
      );

      //insert ke tabel tb_tiket
      mysqli_query($db,"INSERT INTO tb_tiket(notiket,nip_pembuat) VALUES ('$notiket','$nip_pembuat')");


      //insert ke tabel tb_order
       mysqli_query($db,"INSERT INTO tb_order (namapekerjaan, notiket, lokasi, kd_sto, kd_witel,penyebab)
                             VALUES ('$namapekerjaan',
                                     '$notiket',
                                     '$lokasi',
                                     '$sto',
                                     '$witel',
                                     '$penyebab')"
                                   );
       echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('index.php?page=input_order')</script>";
     


      

    }else if (($jumlah_ft_sebelum == 2)||($jumlah_ft_progress == 2)||($jumlah_ft_sesudah == 2)) {
      $gambar_ft_sebelum = array();
      $gambar_ft_progress = array();
      $gambar_ft_sesudah = array();

      for ($i=0; $i < $jumlah_ft_sebelum; $i++) { 
        $file_name = $_FILES['gambar_ft_sebelum']['name'][$i];
        $tmp_name = $_FILES['gambar_ft_sebelum']['tmp_name'][$i];        
        move_uploaded_file($tmp_name, "../lampiran/".$file_name);
        $gambar_ft_sebelum[$i] = $file_name;                 
      }

      for ($i=0; $i < $jumlah_ft_progress; $i++) { 
        $file_name = $_FILES['gambar_ft_progress']['name'][$i];
        $tmp_name = $_FILES['gambar_ft_progress']['tmp_name'][$i];        
        move_uploaded_file($tmp_name, "../lampiran/".$file_name);
        $gambar_ft_progress[$i] = $file_name;                 
      }

      for ($i=0; $i < $jumlah_ft_sesudah; $i++) { 
        $file_name = $_FILES['gambar_ft_sesudah']['name'][$i];
        $tmp_name = $_FILES['gambar_ft_sesudah']['tmp_name'][$i];        
        move_uploaded_file($tmp_name, "../lampiran/".$file_name);
        $gambar_ft_sesudah[$i] = $file_name;                 
      }

      //FOTO UNTUK DENAH
      $file_name = $_FILES['gambar_ft_denah']['name'];
      $tmp_name = $_FILES['gambar_ft_denah']['tmp_name'];        
      move_uploaded_file($tmp_name, "../lampiran/".$file_name);
      $gambar_ft_denah= $file_name;        

      mysqli_query($db,"INSERT INTO tb_lampiran(notiket,ft_sebelum_1,ft_sebelum_2,ft_sebelum_3,ft_progress_1,ft_progress_2,ft_progress_3,ft_sesudah_1,ft_sesudah_2,ft_sesudah_3,ft_denah) 
        VALUES('$notiket',
        '$gambar_ft_sebelum[0]','$gambar_ft_sebelum[1]','',
        '$gambar_ft_progress[0]','$gambar_ft_progress[1]','',
        '$gambar_ft_sesudah[0]','$gambar_ft_sesudah[1]','',
        'gambar_ft_denah'
        )"
      );

      //insert ke tabel tb_tiket
      mysqli_query($db,"INSERT INTO tb_tiket(notiket,nip_pembuat) VALUES ('$notiket','$nip_pembuat')");


      //insert ke tabel tb_order
       mysqli_query($db,"INSERT INTO tb_order (namapekerjaan, notiket, lokasi, kd_sto, kd_witel,penyebab)
                             VALUES ('$namapekerjaan',
                                     '$notiket',
                                     '$lokasi',
                                     '$sto',
                                     '$witel',
                                     '$penyebab')"
                                   );

       echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('index.php?page=input_order')</script>";

       
    }else if (($jumlah_ft_sebelum == 0)||($jumlah_ft_progress == 0)||($jumlah_ft_sesudah == 0)) {
      echo 'Minimal 1 File, Maksimal 3';
    }else{
       echo 'Maksimal 3 file, Minimal 1';
    }




	    // $allowed_ext  = array('jpg', 'jpeg', 'png', 'gif'); // Jenis file yang diperbolehkan untuk diupload
     //  $file_name    = $_FILES['foto_lampiran']['name']; // img adalah name dari tombol input pada form
     //  $file_ext     = strtolower(end(explode('.', $file_name))); // Membuat
     //  $file_size    = $_FILES['foto_lampiran']['size']; // Mengambil info size file
     //  $file_tmp     = $_FILES['foto_lampiran']['tmp_name']; // Membuat file upload temporary/ sementara
     //  $location       = '../lampiran/'.$notiket.'.'.$file_ext; // Menentukan lokasi upload dan menggabungkan dengan judul_seo dan ekstensi file yang diu
     //  $img          = $notiket.'.'.$file_ext; // Membuat nama file dengan judul_seo dan ekstensi filenya



     //  if(in_array($file_ext, $allowed_ext) === true) // Pengecekan tipe file yang diperbolehkan
     //  {
     //    move_uploaded_file($file_tmp, $location); // Proses pengkopian foto ke loksi upload
     //    // Proses insert data dari form ke db
     //    $sql_tiket = "INSERT INTO tb_tiket(notiket) VALUES ('$notiket')";

     //    $sql_order = "INSERT INTO tb_order (namapekerjaan, notiket, lokasi, kd_sto, kd_witel,penyebab,lampiran)
     //                        VALUES ('$namapekerjaan',
     //                                '$notiket',
     //                                '$lokasi',
     //                                '$sto',
     //                                '$witel',
     //                                '$penyebab',
     //                                '$img')";

     //    $sql_order = "INSERT INTO tb_order (namapekerjaan, notiket, lokasi, kd_sto, kd_witel,penyebab,lampiran)
     //                        VALUES ('$namapekerjaan',
     //                                '$notiket',
     //                                '$lokasi',
     //                                '$sto',
     //                                '$witel',
     //                                '$penyebab',
     //                                '$img')";

     //    if(mysqli_query($db, $sql_tiket) && mysqli_query($db, $sql_order))
     //    {
     //      echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('index.php?page=dashboard')</script>";
     //    }
     //      else
     //      {
     //        echo "Error updating record: " . mysqli_error($db);
     //      }
     //  }
	
} 
else {
	die("Akses dilarang...");
  header('location:../logout.php');
}

?>