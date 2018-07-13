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

<?php
require '../dbconfig.php';
require '../fpdf/fpdf.php';


$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);
//Cell(width , height , text , border , end line , [align] )
$pdf->Cell(189 ,10,'ORDER PEKERJAAN',0,0,'C');
 
//invoice contents
$pdf->SetFont('Arial','B',12);
 //$pdf->Image('img/' . 'logo_telkom.png', 10, 20, 20, 17);
		//$pdf->Cell(50,10, '', 0, 1, 'C');
		//$pdf->Ln();
		 
$pdf->Cell(47 ,10,'',0,0);
$pdf->Cell(47 ,10,'',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Image('../img/' . 'logo_telkom.png', 5, 10, 40, 20);
$pdf->Cell(50,10,'',0,0); //vertically merged cell, height=2x row height=2x5=10
$pdf->Cell(90,5,'Score',1,0); //normal height, but occupy 4 columns (horizontally merged)
$pdf->Image('../img/' . 'logo_telak.png', 165, 10, 38, 22);
		$pdf->Cell(50,10, '', 0, 0, 'C');
		 $pdf->Ln();
//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
//UNTUK DATABASENYA
/**
 * SQL : mengambil data dari database
 */
$nmrtiket = $_GET['notiket'];
$sql = "SELECT tb_order.id,tb_order.namapekerjaan,tb_order.notiket,tb_order.lokasi,tb_order.kd_witel,tb_order.kd_sto,tb_order.penyebab,tb_order.lampiran, tb_witel.witel, tb_tiket.tanggal_buat,tb_tiket.status
        FROM ((tb_order
        INNER JOIN tb_witel ON tb_order.kd_witel = tb_witel.kd_witel)
        INNER JOIN tb_tiket ON tb_order.notiket = tb_tiket.notiket)
        WHERE tb_tiket.notiket='$nmrtiket'";
# $db dari file config.php
$query = $db->query($sql);
 
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
//second line(row)
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(30,5,'Tanggal',0,0);
$pdf->Cell(2,5,':',0,0,'C');
$pdf->Cell(43,5,$row['tanggal_buat'],0,0);
//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
//second line(row)
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(30,5,'Nama Pekerjaan',0,0);
$pdf->Cell(2,5,':',0,0,'C');
$pdf->Cell(30,5,$row['namapekerjaan'],0,0);




//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(30,5,'Lokasi',0,0);
$pdf->Cell(2,5,':',0,0,'C');
$pdf->Cell(30,5,$row['lokasi'],0,0);



//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(30,5,'Witel',0,0);
$pdf->Cell(2,5,':',0,0,'C');
//UNTUK WITEL
$sql_witel = "SELECT * FROM tb_witel WHERE kd_witel='$row[kd_witel]'";
$query_witel = $db->query($sql_witel);
 
if ($query_witel->num_rows > 0) {
    while ($row_witel = $query_witel->fetch_assoc()) {
	$pdf->Cell(30,5,$row_witel['witel'],0,0);
	}
} //END UNTUK WITEL


//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(30,5,'STO',0,0);
$pdf->Cell(2,5,':',0,0,'C');
//UNTUK WITEL
$sql_sto = "SELECT * FROM tb_sto WHERE kd_sto='$row[kd_sto]'";
$query_sto = $db->query($sql_sto);
 
if ($query_sto->num_rows > 0) {
    while ($row_sto = $query_sto->fetch_assoc()) {
	$pdf->Cell(30,5,$row_sto['sto'],0,0);
	}
}//END UNTUK STO


//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
//second line(row)
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(30,5,'Penyebab',0,0);
$pdf->Cell(2,5,':',0,0,'C');
$pdf->Cell(70,5,$row['penyebab'],0,0);
//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
//invoice contents
$pdf->SetFont('Arial','B',10);
//unu
$pdf->Cell(80 ,5,'Material',1,0,'C');//end of line
$pdf->Cell(30 ,5,'',0,0);//end of line
$pdf->Cell(80 ,5,'Pekerjaan',1,1,'C');//end of line
$pdf->Cell(5 ,5,'No',1,0,'C');
$pdf->Cell(51 ,5,'Material',1,0,'C');
$pdf->Cell(12 ,5,'Unit',1,0,'C');
$pdf->Cell(12 ,5,'Vol',1,0,'C');//end of line
$pdf->Cell(30 ,5,'',0,0);//end of line
$pdf->Cell(5 ,5,'No.',1,0,'C');
$pdf->Cell(51 ,5,'Pekerjaan',1,0,'C');
$pdf->Cell(12 ,5,'Unit',1,0,'C');
$pdf->Cell(12 ,5,'Vol',1,1,'C');//end of line
 
 
$sql2 = "SELECT * FROM tb_material WHERE notiket='$nmrtiket'";
$query2 = $db->query($sql2);

$sql3 = "SELECT * FROM tb_pekerjaan WHERE notiket='$nmrtiket'";
$query3 = $db->query($sql3);
 
//MULAI UNTUK DATA MATERIAL DAN PEKERJAAN
if (($query2->num_rows > 0)||($query3->num_rows > 0)) { 
	//KALO JUMLAH RECORDNYA SAMA
	if($query2->num_rows == $query3->num_rows){
		
		$no_material=1;
		$no_pekerjaan=1;
	    
	    while (($row2 = $query2->fetch_assoc())&&($row3 = $query3->fetch_assoc())&&($no_material<=$query2->num_rows)&&($no_pekerjaan<=$query3->num_rows)) {
			$pdf->Cell(5 ,5,$no_material,1,0,'C');
			$pdf->Cell(51 ,5,$row2['material'],1,0,'L');
			$pdf->Cell(12 ,5,$row2['unit'],1,0,'C');
			$pdf->Cell(12 ,5,$row2['volume'],1,0,'C');//end of line
			$pdf->Cell(30 ,5,'',0,0);//end of line
			$pdf->Cell(5 ,5,$no_pekerjaan,1,0,'C');
			$pdf->Cell(51 ,5,$row3['namapekerjaan'],1,0);
			$pdf->Cell(12 ,5,$row3['unit'],1,0,'C');
			$pdf->Cell(12 ,5,$row3['volume'],1,1,'C');//end of line
			$no_material++;
			$no_pekerjaan++;
	 	}
	}else if($query2->num_rows > $query3->num_rows){
		$no_material=1;
		$no_pekerjaan=1;
	    
	    while (($row2 = $query2->fetch_assoc())&&($no_material<=$query2->num_rows)) {
			$pdf->Cell(5 ,5,$no_material,1,0,'C');
			$pdf->Cell(51 ,5,$row2['material'],1,0,'L');
			$pdf->Cell(12 ,5,$row2['unit'],1,0,'C');
			$pdf->Cell(12 ,5,$row2['volume'],1,0,'C');//end of line
		  	while (($row3 = $query3->fetch_assoc())&&($no_pekerjaan<=$query3->num_rows)) {
			$pdf->Cell(50 ,5,'',0,0);//end of line
			$pdf->Cell(5 ,5,$no_pekerjaan,1,0,'C');
			$pdf->Cell(51 ,5,$row3['namapekerjaan'],1,0);
			$pdf->Cell(12 ,5,$row3['unit'],1,0,'C');
			$pdf->Cell(12 ,5,$row3['volume'],1,1,'C');//end of line
			
			}$no_pekerjaan++;
			$no_material++;
			
	 	}
	}
	else{
 		while (($row2 = $query2->fetch_assoc())) {
				$pdf->Cell(5 ,5,$row2['id'],1,0,'C');
				$pdf->Cell(51 ,5,$row2['material'],1,0,'L');
				$pdf->Cell(12 ,5,$row2['unit'],1,0,'C');
				$pdf->Cell(12 ,5,$row2['volume'],1,1,'C');//end of line
		}
 
 		$no_pekerjaan=1;
  		while ($row3 = $query3->fetch_assoc()) {
  			if($no_pekerjaan>0){
	  	 		$pdf->Cell(110 ,5,'',0,0);//end of line
				$pdf->Cell(5 ,5,$no_pekerjaan,1,0,'C');
				$pdf->Cell(51 ,5,$row3['namapekerjaan'],1,0);
				$pdf->Cell(12 ,5,$row3['unit'],1,0,'C');
				$pdf->Cell(12 ,5,$row3['volume'],1,1,'C');//end of line
  			}else{
	  			$pdf->Cell(50 ,5,'',0,0);//end of line
				$pdf->Cell(5 ,5,$no_pekerjaan,1,0,'C');
				$pdf->Cell(51 ,5,$row3['namapekerjaan'],1,0);
				$pdf->Cell(12 ,5,$row3['unit'],1,0,'C');
				$pdf->Cell(12 ,5,$row3['volume'],1,1,'C');//end of line
				$pdf->Ln();
			}
				$no_pekerjaan++;
		}
	}
 		
}


$result = $db->query("SELECT notiket FROM tb_pekerjaan WHERE notiket='$nmrtiket' ORDER BY notiket");

    /* determine number of rows result set */
$row_cnt = $result->num_rows;

if($row_cnt ==1){

// JUDUL UNTUK FOTO PEKERJAAN
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
$pdf->Cell(190 ,5,'Foto Pekerjaan',1,1,'C');
//UNTUK FOTO SEBELUM
$pdf->Cell(190/2 ,5,'Foto Sebelum',1,0,'C');
$pdf->Cell(190/2 ,5,'Foto In Progress',1,1,'C');

//UNTUK TABEL LAMPIRAN
$sql5 = "SELECT * FROM tb_lampiran WHERE notiket='$nmrtiket'";
$query5 = $db->query($sql5);
 
//UNTUK TABEL PEKERJAAN
$sql10 = "SELECT * FROM tb_pekerjaan WHERE notiket='$nmrtiket'";
$query10 = $db->query($sql10);


	//MENGAMBIL DATA FOTO FOTO
	if ($query5->num_rows > 0) {
    	while ($row5 = $query5->fetch_assoc()) {
 
			$pdf->Cell(190/2 ,35,'',1,0,'C');
			if(($row5['ft_sebelum_2']==null)&&($row5['ft_sebelum_3']==null)){
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_1'], 12, 92, 90, 30);	
			}else if($row5['ft_sebelum_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_1'], 11, 92, 45, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_2'], 58, 92, 45, 30);	
			}else if($row5['ft_sebelum_3']!=null){
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_1'], 11, 92, 30, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_2'], 42, 92, 30, 30);
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_3'], 73, 92, 30, 30);	
			}else if(($row5['ft_sebelum_1']==null)&&($row5['ft_sebelum_2']==null)&&($row5['ft_progress_3']==null)){
				$pdf->Cell(190 ,5,'Tidak ada Foto Sesudah',1,1,'C');
			}
			
			
			
			//UNTUK ISIAN FOTO IN PROGRESS
			$pdf->Cell(190/2 ,35,'',1,1,'C');
			if(($row5['ft_progress_2']==null)&&$row5['ft_progress_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_progress_1'], 107, 92, 90, 30);
			}else if($row5['ft_progress_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_progress_1'], 106, 92, 45, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_progress_2'], 152, 92, 45, 30);
			}else if($row5['ft_progress_3']!=null){
				$pdf->Image('../lampiran/' . $row5['ft_progress_1'], 106, 92, 30, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_progress_2'], 137, 92, 30, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_progress_3'], 168, 92, 30, 30);
			}else if(($row5['ft_progress_1']==null)&&($row5['ft_progress_2']==null)&&($row5['ft_progress_3']==null)){
				$pdf->Cell(190 ,5,'Tidak ada Foto In Progress',1,0,'C');
			}
			
			
			//UNTUK FOTO SESUDAH
			$pdf->Cell(190 ,5,'Foto Sesudah',1,1,'C');
			$pdf->Cell(190 ,35,'',1,1,'C');

			if(($row5['ft_sesudah_2']==null)&&($row5['ft_sesudah_3']==null)){
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_1'], 65, 134, 80, 30);
			}
			else if($row5['ft_sesudah_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_1'], 30, 134, 70, 30);
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_2'], 110, 134, 70, 30);
			}
			else if($row5['ft_sesudah_3']!=null){
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_1'], 15, 134, 40, 25);
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_2'], 85, 134, 40, 25);
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_3'], 150, 134, 40, 25);
			}else if(($row5['ft_sesudah_1']==null)&&($row5['ft_sesudah_2']==null)&&($row5['ft_sesudah_3']==null)){
				$pdf->Cell(190 ,35,'Tidak ada Foto Sesudah',1,1,'C');
			}

			//UNTUK FOTO DENAH
			$pdf->Cell(190 ,5,'Foto Denah',1,1,'C');
			if($row5['ft_denah']!=null){
				$pdf->Image('../lampiran/' . $row5['ft_denah'], 25, 175, 160, 50);
				$pdf->Cell(190 ,60,'',1,1,'C');
				 
			}else{
				$pdf->Cell(190 ,60,'Tidak ada Foto Denah',1,1,'C');
			}
	 


    	}
	}
	//END MENGAMBIL FOTO 
	// START UNTUK TANDATANGAN
	$pdf->Cell(0,15,'',0,1); 
	//untuk isian ttd
	$pdf->Cell(190/4 ,5,'Mengetahui',0,0,'C');
	$pdf->Cell(190/4 ,5,'',0,0,'C');
	$pdf->Cell(190/4 ,5,'',0,0,'C');
	$pdf->Cell(190/4 ,5,'Memerintahkan',0,1,'C');
	//isian ttd
	$sql15 = "SELECT tb_user.nip,tb_user.nama, tb_tiket.notiket, tb_user.foto_ttd
	FROM tb_user
	INNER JOIN tb_tiket ON tb_user.nip = tb_tiket.nip_pembuat WHERE notiket='$nmrtiket'";

	$sql16 = "SELECT tb_user.nip,tb_user.nama, tb_tiket.notiket, tb_user.foto_ttd
	FROM tb_user
	INNER JOIN tb_tiket ON tb_user.nip = tb_tiket.nip_penyetuju WHERE notiket='$nmrtiket'";

	$query15 = $db->query($sql15);
	$query16 = $db->query($sql16);


		//MENGAMBIL DATA FOTO FOTO
		if (($query15->num_rows > 0)&&(($query16->num_rows > 0) )) {
	    	while (($row15 = $query15->fetch_assoc())&&($row16 = $query16->fetch_assoc())) {

			$pdf->Image('../lampiran/' . $row16['foto_ttd'], 25, 252, 20, 10);
			$pdf->Cell(190/4 ,20,'',0,0,'C');
			$pdf->Cell(190/4 ,20,'',0,0,'C');
			$pdf->Image('../lampiran/' . $row15['foto_ttd'], 170, 252, 20, 10);

			$pdf->Cell(0 ,15,'',0,1);



			$pdf->Cell(190/4 ,5,$row16['nama'],0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,$row15['nama'],0,1,'C');
			//isian ttd
			$pdf->Cell(190/4 ,5,'NIK:'.$row16['nip'],0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,'NIK:'.$row15['nip'],0,1,'C');

			}
		}
	//END UNTUK TANDATANGAN


}else if($row_cnt ==2){
	

// JUDUL UNTUK FOTO PEKERJAAN
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
$pdf->Cell(190 ,5,'Foto Pekerjaan',1,1,'C');
//UNTUK FOTO SEBELUM
$pdf->Cell(190/2 ,5,'Foto Sebelum',1,0,'C');
$pdf->Cell(190/2 ,5,'Foto In Progress',1,1,'C');

//UNTUK TABEL LAMPIRAN
$sql5 = "SELECT * FROM tb_lampiran WHERE notiket='$nmrtiket'";
$query5 = $db->query($sql5);
 
//UNTUK TABEL PEKERJAAN
$sql10 = "SELECT * FROM tb_pekerjaan WHERE notiket='$nmrtiket'";
$query10 = $db->query($sql10);


	//MENGAMBIL DATA FOTO FOTO
	if ($query5->num_rows > 0) {
    	while ($row5 = $query5->fetch_assoc()) {
 
			$pdf->Cell(190/2 ,35,'',1,0,'C');
			if(($row5['ft_sebelum_2']==null)&&($row5['ft_sebelum_3']==null)){
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_1'], 12, 97, 90, 30);	
			}else if($row5['ft_sebelum_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_1'], 11, 97, 45, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_2'], 58, 97, 45, 30);	
			}else if($row5['ft_sebelum_3']!=null){
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_1'], 11, 97, 30, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_2'], 42, 97, 30, 30);
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_3'], 73, 97, 30, 30);	
			}else if(($row5['ft_sebelum_1']==null)&&($row5['ft_sebelum_2']==null)&&($row5['ft_progress_3']==null)){
				$pdf->Cell(190 ,5,'Tidak ada Foto Sesudah',1,1,'C');
			}
			
			
			
			//UNTUK ISIAN FOTO IN PROGRESS
			$pdf->Cell(190/2 ,35,'',1,1,'C');
			if(($row5['ft_progress_2']==null)&&$row5['ft_progress_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_progress_1'], 107, 97, 90, 30);
			}else if($row5['ft_progress_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_progress_1'], 106, 97, 45, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_progress_2'], 152, 97, 45, 30);
			}else if($row5['ft_progress_3']!=null){
				$pdf->Image('../lampiran/' . $row5['ft_progress_1'], 106, 97, 30, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_progress_2'], 137, 97, 30, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_progress_3'], 168, 97, 30, 30);
			}else if(($row5['ft_progress_1']==null)&&($row5['ft_progress_2']==null)&&($row5['ft_progress_3']==null)){
				$pdf->Cell(190 ,5,'Tidak ada Foto In Progress',1,0,'C');
			}
			
			
			//UNTUK FOTO SESUDAH
			$pdf->Cell(190 ,5,'Foto Sesudah',1,1,'C');
			$pdf->Cell(190 ,35,'',1,1,'C');

			if(($row5['ft_sesudah_2']==null)&&($row5['ft_sesudah_3']==null)){
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_1'], 65, 140, 80, 30);
			}
			else if($row5['ft_sesudah_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_1'], 30, 140, 70, 30);
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_2'], 110, 140, 70, 30);
			}
			else if($row5['ft_sesudah_3']!=null){
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_1'], 15, 140, 40, 25);
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_2'], 85, 140, 40, 25);
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_3'], 150, 140, 40, 25);
			}else if(($row5['ft_sesudah_1']==null)&&($row5['ft_sesudah_2']==null)&&($row5['ft_sesudah_3']==null)){
				$pdf->Cell(190 ,40,'Tidak ada Foto Sesudah',1,1,'C');
			}

			//UNTUK FOTO DENAH
			$pdf->Cell(190 ,5,'Foto Denah',1,1,'C');
			if($row5['ft_denah']!=null){
				
				$pdf->Image('../lampiran/' . $row5['ft_denah'], 25, 180, 160, 50);
				$pdf->Cell(190 ,60,'',1,1,'C');
				 
			}else{
				$pdf->Cell(190 ,40,'Tidak ada Foto Denah',1,1,'C');
			}
	 


    	}
	}
	//END MENGAMBIL FOTO 

	// START UNTUK TANDATANGAN
	$pdf->Cell(0,5,'',0,1); 
	//untuk isian ttd
	$pdf->Cell(190/4 ,5,'Mengetahui',0,0,'C');
	$pdf->Cell(190/4 ,5,'',0,0,'C');
	$pdf->Cell(190/4 ,5,'',0,0,'C');
	$pdf->Cell(190/4 ,5,'Memerintahkan',0,1,'C');
	//isian ttd
	$sql15 = "SELECT tb_user.nip,tb_user.nama, tb_tiket.notiket, tb_user.foto_ttd
	FROM tb_user
	INNER JOIN tb_tiket ON tb_user.nip = tb_tiket.nip_pembuat WHERE notiket='$nmrtiket'";

	$sql16 = "SELECT tb_user.nip,tb_user.nama, tb_tiket.notiket, tb_user.foto_ttd
	FROM tb_user
	INNER JOIN tb_tiket ON tb_user.nip = tb_tiket.nip_penyetuju WHERE notiket='$nmrtiket'";

	$query15 = $db->query($sql15);
	$query16 = $db->query($sql16);


		//MENGAMBIL DATA FOTO FOTO
		if (($query15->num_rows > 0)&&(($query16->num_rows > 0) )) {
	    	while (($row15 = $query15->fetch_assoc())&&($row16 = $query16->fetch_assoc())) {

			$pdf->Image('../lampiran/' . $row16['foto_ttd'], 25, 252, 20, 10);
			$pdf->Cell(190/4 ,20,'',0,0,'C');
			$pdf->Cell(190/4 ,20,'',0,0,'C');
			$pdf->Image('../lampiran/' . $row15['foto_ttd'], 170, 252, 20, 10);

			$pdf->Cell(0 ,20,'',0,1);



			$pdf->Cell(190/4 ,5,$row16['nama'],0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,$row15['nama'],0,1,'C');
			//isian ttd
			$pdf->Cell(190/4 ,5,'NIK:'.$row16['nip'],0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,'NIK:'.$row15['nip'],0,1,'C');

			}
		}
	//END UNTUK TANDATANGAN	

}else if($row_cnt ==3){

// JUDUL UNTUK FOTO PEKERJAAN
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
$pdf->Cell(190 ,5,'Foto Pekerjaan',1,1,'C');
//UNTUK FOTO SEBELUM
$pdf->Cell(190/2 ,5,'Foto Sebelum',1,0,'C');
$pdf->Cell(190/2 ,5,'Foto In Progress',1,1,'C');

//UNTUK TABEL LAMPIRAN
$sql5 = "SELECT * FROM tb_lampiran WHERE notiket='$nmrtiket'";
$query5 = $db->query($sql5);
 
//UNTUK TABEL PEKERJAAN
$sql10 = "SELECT * FROM tb_pekerjaan WHERE notiket='$nmrtiket'";
$query10 = $db->query($sql10);


	//MENGAMBIL DATA FOTO FOTO
	if ($query5->num_rows > 0) {
    	while ($row5 = $query5->fetch_assoc()) {
 
			$pdf->Cell(189/2 ,35,'',1,0,'C');
			if(($row5['ft_sebelum_2']==null)&&($row5['ft_sebelum_3']==null)){
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_1'], 12, 102, 90, 30);	
			}else if($row5['ft_sebelum_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_1'], 11, 102, 45, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_2'], 58, 102, 45, 30);	
			}else if($row5['ft_sebelum_3']!=null){
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_1'], 11, 102, 30, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_2'], 42, 102, 30, 30);
				$pdf->Image('../lampiran/' . $row5['ft_sebelum_3'], 73, 102, 30, 30);	
			}else if(($row5['ft_sebelum_1']==null)&&($row5['ft_sebelum_2']==null)&&($row5['ft_progress_3']==null)){
				$pdf->Cell(190 ,5,'Tidak ada Foto Sesudah',1,1,'C');
			}
			
			
			
			//UNTUK ISIAN FOTO IN PROGRESS
			$pdf->Cell(190/2 ,35,'',1,1,'C');
			if(($row5['ft_progress_2']==null)&&$row5['ft_progress_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_progress_1'], 107, 102, 90, 30);
			}else if($row5['ft_progress_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_progress_1'], 106, 102, 45, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_progress_2'], 152, 105, 45, 30);
			}else if($row5['ft_progress_3']!=null){
				$pdf->Image('../lampiran/' . $row5['ft_progress_1'], 106, 102, 30, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_progress_2'], 137, 102, 30, 30);	
				$pdf->Image('../lampiran/' . $row5['ft_progress_3'], 168, 102, 30, 30);
			}else if(($row5['ft_progress_1']==null)&&($row5['ft_progress_2']==null)&&($row5['ft_progress_3']==null)){
				$pdf->Cell(190 ,5,'Tidak ada Foto In Progress',1,0,'C');
			}
			
			
			//UNTUK FOTO SESUDAH
			$pdf->Cell(190 ,5,'Foto Sesudah',1,1,'C');
			$pdf->Cell(190 ,35,'',1,1,'C');

			if(($row5['ft_sesudah_2']==null)&&($row5['ft_sesudah_3']==null)){
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_1'], 65, 142, 80, 30);
			}
			else if($row5['ft_sesudah_3']==null){
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_1'], 30, 142, 70, 30);
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_2'], 110, 142, 70, 30);
			}
			else if($row5['ft_sesudah_3']!=null){
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_1'], 15, 142, 40, 25);
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_2'], 85, 142, 40, 25);
				$pdf->Image('../lampiran/' . $row5['ft_sesudah_3'], 150, 142, 40, 25);
			}else if(($row5['ft_sesudah_1']==null)&&($row5['ft_sesudah_2']==null)&&($row5['ft_sesudah_3']==null)){
				$pdf->Cell(190 ,30,'Tidak ada Foto Sesudah',1,1,'C');
			}

			//UNTUK FOTO DENAH
			$pdf->Cell(190 ,5,'Foto Denah',1,1,'C');
			if($row5['ft_denah']!=null){
				 
				$pdf->Image('../lampiran/' . $row5['ft_denah'], 25, 185	, 160, 50);
				$pdf->Cell(190 ,60,'',1,1,'C');

				 
			}else{
				$pdf->Cell(190 ,30,'Tidak ada Foto Denah',1,1,'C');
			}
	 


    	}
	}
	//END MENGAMBIL FOTO 

	// START UNTUK TANDATANGAN
	$pdf->Cell(0,5,'',0,1); 
	//untuk isian ttd
	$pdf->Cell(190/4 ,5,'Mengetahui',0,0,'C');
	$pdf->Cell(190/4 ,5,'',0,0,'C');
	$pdf->Cell(190/4 ,5,'',0,0,'C');
	$pdf->Cell(190/4 ,5,'Memerintahkan',0,1,'C');
	//isian ttd
	$sql15 = "SELECT tb_user.nip,tb_user.nama, tb_tiket.notiket, tb_user.foto_ttd
	FROM tb_user
	INNER JOIN tb_tiket ON tb_user.nip = tb_tiket.nip_pembuat WHERE notiket='$nmrtiket'";

	$sql16 = "SELECT tb_user.nip,tb_user.nama, tb_tiket.notiket, tb_user.foto_ttd
	FROM tb_user
	INNER JOIN tb_tiket ON tb_user.nip = tb_tiket.nip_penyetuju WHERE notiket='$nmrtiket'";

	$query15 = $db->query($sql15);
	$query16 = $db->query($sql16);


		//MENGAMBIL DATA FOTO FOTO
		if (($query15->num_rows > 0)&&(($query16->num_rows > 0) )) {
	    	while (($row15 = $query15->fetch_assoc())&&($row16 = $query16->fetch_assoc())) {

			$pdf->Image('../lampiran/' . $row15['foto_ttd'], 25, 252, 20, 10);
			$pdf->Cell(190/4 ,20,'',0,0,'C');
			$pdf->Cell(190/4 ,20,'',0,0,'C');
			$pdf->Image('../lampiran/' . $row16['foto_ttd'], 170, 252, 20, 10);

			$pdf->Cell(0 ,15,'',0,1);



			$pdf->Cell(190/4 ,5,$row15['nama'],0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,$row16['nama'],0,1,'C');
			//isian ttd
			$pdf->Cell(190/4 ,5,'NIK:'.$row15['nip'],0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,'',0,0,'C');
			$pdf->Cell(190/4 ,5,'NIK:'.$row16['nip'],0,1,'C');

			}
		}
	//END UNTUK TANDATANGAN
 


}

    }
}
$pdf->Output('I');
?>