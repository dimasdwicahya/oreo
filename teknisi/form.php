<?php 
	include "../dbconfig.php";
	if (isset($_POST["kirim"])) {

		$jumlah = count($_FILES['gambar']['name']);

		if ($jumlah > 2) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) { 
				$file_name = $_FILES['gambar']['name'][$i];
				$tmp_name = $_FILES['gambar']['tmp_name'][$i];				
				move_uploaded_file($tmp_name, "../lampiran/".$file_name);
				$gambar[$i] = $file_name; 								
			}
			mysqli_query($db,"INSERT INTO tb_lampiran(ft_sebelum_1,ft_sebelum_2,ft_sebelum_3) VALUES('$gambar[0]','$gambar[1]','$gambar[2]')");
			echo "Berhasil Upload";			
		}else if ($jumlah = 1) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) { 
				$file_name = $_FILES['gambar']['name'][$i];
				$tmp_name = $_FILES['gambar']['tmp_name'][$i];				
				move_uploaded_file($tmp_name, "../lampiran/".$file_name);
				$gambar[$i] = $file_name; 								
			}
			mysqli_query($db,"INSERT INTO tb_lampiran(ft_sebelum_1,ft_sebelum_2,ft_sebelum_3) VALUES('$gambar[0]','','')");
			echo "Berhasil Upload";			
		}else if ($jumlah = 2) {
			$gambar = array();
			for ($i=0; $i < $jumlah; $i++) { 
				$file_name = $_FILES['gambar']['name'][$i];
				$tmp_name = $_FILES['gambar']['tmp_name'][$i];				
				move_uploaded_file($tmp_name, "../lampiran/".$file_name);
				$gambar[$i] = $file_name; 								
			}
			mysqli_query($db,"INSERT INTO tb_lampiran(ft_sebelum_1,ft_sebelum_2,ft_sebelum_3) VALUES('$gambar[0]','$gambar[1]','')");
			echo "Berhasil Upload";			
		}else if ($jumlah = 0) {
			echo 'Gagal';
		}

	}
?>