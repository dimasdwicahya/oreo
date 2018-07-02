<?php
require 'dbconfig.php';
require 'fpdf/fpdf.php';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);
$pdf->SetFillColor(39,40,34);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(30,10,'Kode Mobil', 0, 0, 'C', true);
$pdf->Cell(30,10,'Merk', 0, 0, 'C', true);
$pdf->Cell(30,10,'Type', 0, 0, 'C', true);
$pdf->Cell(30,10,'Warna', 0, 0, 'C', true);
$pdf->Cell(30,10,'Harga Mobil', 0, 0, 'C', true);
$pdf->Cell(40,10,'Gambar', 0, 0, 'C', true);
$pdf->Ln(10);
$pdf->SetFillColor(255,255,255);
$pdf->SetTextColor(0,0,0);
/**
 * SQL : mengambil data dari database
 */
$sql = "SELECT * FROM tb_order";
# $db dari file config.php
$query = $db->query($sql);
$n = 22;
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
    	$pdf->Cell(30,10, $row['id'], 1, 0, 'C');
    	$pdf->Cell(30,10, $row['notiket'], 1, 0, 'C');
		$pdf->Cell(30,10, $row['lokasi'], 1, 0, 'C');
		$pdf->Cell(30,10, $row['penyebab'], 1, 0, 'C');
		$pdf->Cell(30,10, $row['kd_sto'], 1, 0, 'C');
		/**
		 * ABSPATH . $row['gambar'] // c:/xampp/htdocs/laporan-fpdf/uploads/namagambar.jpg
		 */
		
		/**
		 * penampilan gambar dimanipulasi dengan $n sebagai poros Y dengan nilai default 22 
		 * dan akan bertambah 10 setiap kali loop
		 */
		$pdf->Image('lampiran/' . $row['lampiran'], 170, $n, 18, 8);
		$pdf->Cell(40,10, '', 1, 0, 'C');
		$pdf->Ln();
		$n = $n+10;
    }
}


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'PT.TELKOM INDONESIA',0,0);
$pdf->Cell(59 ,5,'ORDER PERINTAH KERJA',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'[Street Address]',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'[City, Country, ZIP]',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,'[dd/mm/yyyy]',0,1);//end of line

$pdf->Cell(130 ,5,'Phone [+12345678]',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Name]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Company Name]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Address]',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'[Phone]',0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Description',1,0);
$pdf->Cell(25 ,5,'Taxable',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130 ,5,'UltraCool Fridge',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'3,250',1,1,'R');//end of line

$pdf->Cell(130 ,5,'Supaclean Diswasher',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'1,200',1,1,'R');//end of line

$pdf->Cell(130 ,5,'Something Else',1,0);
$pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(34 ,5,'1,000',1,1,'R');//end of line

//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Tax Rate',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'10%',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

$pdf->Output('I');
?>