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





	    $allowed_ext  = array('jpg', 'jpeg', 'png', 'gif'); // Jenis file yang diperbolehkan untuk diupload
      $file_name    = $_FILES['foto_lampiran']['name']; // img adalah name dari tombol input pada form
      $file_ext     = strtolower(end(explode('.', $file_name))); // Membuat
      $file_size    = $_FILES['foto_lampiran']['size']; // Mengambil info size file
      $file_tmp     = $_FILES['foto_lampiran']['tmp_name']; // Membuat file upload temporary/ sementara
      $location       = '../lampiran/'.$notiket.'.'.$file_ext; // Menentukan lokasi upload dan menggabungkan dengan judul_seo dan ekstensi file yang diu
      $img          = $notiket.'.'.$file_ext; // Membuat nama file dengan judul_seo dan ekstensi filenya



      if(in_array($file_ext, $allowed_ext) === true) // Pengecekan tipe file yang diperbolehkan
      {
        move_uploaded_file($file_tmp, $location); // Proses pengkopian foto ke loksi upload
        // Proses insert data dari form ke db
        $sql_tiket = "INSERT INTO tb_tiket(notiket) VALUES ('$notiket')";

        $sql_order = "INSERT INTO tb_order (namapekerjaan, notiket, lokasi, kd_sto, kd_witel,penyebab,lampiran)
                            VALUES ('$namapekerjaan',
                                    '$notiket',
                                    '$lokasi',
                                    '$sto',
                                    '$witel',
                                    '$penyebab',
                                    '$img')";

        $sql_order = "INSERT INTO tb_order (namapekerjaan, notiket, lokasi, kd_sto, kd_witel,penyebab,lampiran)
                            VALUES ('$namapekerjaan',
                                    '$notiket',
                                    '$lokasi',
                                    '$sto',
                                    '$witel',
                                    '$penyebab',
                                    '$img')";

        if(mysqli_query($db, $sql_tiket) && mysqli_query($db, $sql_order))
        {
          echo "<script>alert('Insert data berhasil! Klik ok untuk melanjutkan');location.replace('index.php?page=dashboard')</script>";
        }
          else
          {
            echo "Error updating record: " . mysqli_error($db);
          }
      }
	
} 
else {
	die("Akses dilarang...");
}

?>