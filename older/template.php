<?php
require 'dbconfig.php';
require 'fpdf/fpdf.php';

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();




//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(189 ,10,'ORDER PEKERJAAN MAINTENANCE',0,0,'C');
 

//invoice contents
$pdf->SetFont('Arial','B',12);

 //$pdf->Image('img/' . 'logo_telkom.png', 10, 20, 20, 17);
		//$pdf->Cell(50,10, '', 0, 1, 'C');
		//$pdf->Ln();
		 

$pdf->Cell(47 ,10,'',0,0);
$pdf->Cell(47 ,10,'',0,0);


$pdf->SetFont('Arial','',10);

$pdf->Image('img/' . 'logo_telkom.png', 10, 20, 20, 17);
$pdf->Cell(50,10,'',0,0); //vertically merged cell, height=2x row height=2x5=10


$pdf->Cell(90,5,'Score',1,0); //normal height, but occupy 4 columns (horizontally merged)
$pdf->Image('img/' . 'logo_telak.png', 170, 23, 35, 17);
		$pdf->Cell(50,10, '', 0, 0, 'C');
		 $pdf->Ln();

//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 




//UNTUK DATABASENYA
/**
 * SQL : mengambil data dari database
 */
$sql = "SELECT * FROM tb_order";
# $db dari file config.php
$query = $db->query($sql);
 
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {




//second line(row)
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(43,5,'Tanggal',1,0);
$pdf->Cell(2,5,':',1,0,'C');
$pdf->Cell(43,5,$row['notiket'],1,0);

//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 

//second line(row)
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(43,5,'Nama Pekerjaan',1,0);
$pdf->Cell(2,5,':',1,0,'C');
$pdf->Cell(43,5,$row['namapekerjaan'],1,0);


//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 

//second line(row)
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(43,5,'Lokasi',1,0);
$pdf->Cell(2,5,':',1,0,'C');
$pdf->Cell(43,5,$row['lokasi'],1,0);


//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 

//second line(row)
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(43,5,'Penyebab',1,0);
$pdf->Cell(2,5,':',1,0,'C');
$pdf->Cell(43,5,$row['penyebab'],1,0);


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',10);

//unu
$pdf->Cell(80 ,5,'Material',1,0,'C');//end of line
$pdf->Cell(30 ,5,'',0,0);//end of line
$pdf->Cell(80 ,5,'Pekerjaan',1,1,'C');//end of line
$pdf->Cell(5 ,5,'No',1,0,'C');
$pdf->Cell(51 ,5,'Material',1,0,'L');
$pdf->Cell(12 ,5,'Unit',1,0,'C');
$pdf->Cell(12 ,5,'Vol',1,0,'C');//end of line

$pdf->Cell(30 ,5,'',0,0);//end of line

$pdf->Cell(5 ,5,'1.',1,0,'C');
$pdf->Cell(51 ,5,'Pekerjaan',1,0,'C');
$pdf->Cell(12 ,5,'Unit',1,0,'C');
$pdf->Cell(12 ,5,'Vol',1,1,'C');//end of line



$nomor = $row['notiket'];

 

$sql2 = "SELECT * FROM tb_material WHERE notiket='$nomor'";
# $db dari file config.php
$query2 = $db->query($sql2);
 

if ($query2->num_rows > 0) {
    while ($row2 = $query2->fetch_assoc()) {

$pdf->Cell(5 ,5,$row2['id'],1,0,'C');
$pdf->Cell(51 ,5,$row2['material'],1,0,'L');
$pdf->Cell(12 ,5,$row2['unit'],1,0,'C');
$pdf->Cell(12 ,5,$row2['volume'],1,0,'C');//end of line



$pdf->Cell(30 ,5,'',0,0);//end of line

$pdf->Cell(5 ,5,'1.',1,0,'C');
$pdf->Cell(51 ,5,'Pekerjaan',1,0,'C');
$pdf->Cell(12 ,5,'Unit',1,0,'C');
$pdf->Cell(12 ,5,'Vol',1,1,'C');//end of line

 

}
}



// JUDUL UNTUK FOTO PEKERJAAN

$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 
$pdf->Cell(189 ,5,'Foto Pekerjaan',1,1,'C');

//UNTUK FOTO SEBELUM
$pdf->Cell(189/2 ,5,'Foto Sebelum',1,0,'C');
$pdf->Cell(189/2 ,5,'Foto In Progress',1,1,'C');
//UNTUK ISIAN FOTO SEBELUM
$pdf->Cell(189/2 ,40,'',1,0,'C');
$pdf->Image('lampiran/' . $row['lampiran'], 12, 95, 30, 30);
$pdf->Image('lampiran/' . $row['lampiran'], 43, 95, 30, 30);
$pdf->Image('lampiran/' . $row['lampiran'], 73, 95, 30, 30);
		 
		 

//UNTUK ISIAN FOTO IN PROGRESS
$pdf->Cell(189/2 ,40,'',1,1,'C');
$pdf->Image('lampiran/' . $row['lampiran'], 108, 95, 30, 30);
$pdf->Image('lampiran/' . $row['lampiran'], 138, 95, 30, 30);
$pdf->Image('lampiran/' . $row['lampiran'], 167, 95, 30, 30);


$pdf->Cell(189 ,5,'Foto Sesudah',1,1,'C');

//UNTUK ISIAN FOTO SESUDAH
$pdf->Cell(189 ,40,'',1,1,'C');
$pdf->Image('lampiran/' . $row['lampiran'], 15, 140, 40, 25);
$pdf->Image('lampiran/' . $row['lampiran'], 85, 140, 40, 25);
$pdf->Image('lampiran/' . $row['lampiran'], 150, 140, 40, 25);


$pdf->Cell(189 ,5,'Foto Denah',1,1,'C');
//UNTUK ISIAN FOTO GEO DENAH
$pdf->Cell(189 ,40,'Isi Foto Denah',1,1,'C');


$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 


//untuk isian ttd
$pdf->Cell(189/4 ,10,'Mengetahui',0,0,'C');
$pdf->Cell(189/4 ,10,'',0,0,'C');
$pdf->Cell(189/4 ,10,'',0,0,'C');
$pdf->Cell(189/4 ,10,'Memerintahkan',0,1,'C');

//isian ttd
$pdf->Cell(189/4 ,10,'NAMA',0,0,'C');
$pdf->Cell(189/4 ,10,'',0,0,'C');
$pdf->Cell(189/4 ,10,'',0,0,'C');
$pdf->Cell(189/4 ,10,'NAMA',0,1,'C');

//isian ttd
$pdf->Cell(189/4 ,10,'NIK: :',0,0,'C');
$pdf->Cell(189/4 ,10,'',0,0,'C');
$pdf->Cell(189/4 ,10,'',0,0,'C');
$pdf->Cell(189/4 ,10,'NIK:',0,1,'C');

 
		 
    }
}







$pdf->Output('I');
?>