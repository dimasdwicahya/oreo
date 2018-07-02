<?php
require 'dbconfig.php';
require 'fpdf/fpdf.php';
$pdf = new FPDF();
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

//second line(row)
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(43,5,'Tanggal',1,0);
$pdf->Cell(2,5,':',1,0,'C');
$pdf->Cell(43,5,'q3',1,0);

//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 

//second line(row)
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(43,5,'Nama Pekerjaan',1,0);
$pdf->Cell(2,5,':',1,0,'C');
$pdf->Cell(43,5,'q3',1,0);


//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 

//second line(row)
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(43,5,'Lokasi',1,0);
$pdf->Cell(2,5,':',1,0,'C');
$pdf->Cell(43,5,'q3',1,0);


//$pdf->Cell(50,10,'Passing',1,0); //vertically merged cell
$pdf->Cell(0,5,'',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 

//second line(row)
$pdf->Cell(50,5,'',0,0); //dummy cell to align next cell, should be invisible
$pdf->Cell(43,5,'Penyebab',1,0);
$pdf->Cell(2,5,':',1,0,'C');
$pdf->Cell(43,5,'q3',1,0);





 


// $pdf->Cell(20 ,5,'',0,0);
// $pdf->Cell(50 ,5,'Tanggal',1,0);
// $pdf->Cell(4 ,5,':',1,0);
// $pdf->Cell(100 ,5,'isian tanggal',1,0);
// $pdf->Cell(20 ,5,'',0,1);//end of line

// $pdf->Cell(20 ,5,'',0,0);
// $pdf->Cell(50 ,5,'Nama Pekerjaan',1,0);
// $pdf->Cell(4 ,5,':',1,0);
// $pdf->Cell(100 ,5,'isian nama pekerjaan',1,0);
// $pdf->Cell(20 ,5,'',0,1);//end of line

// $pdf->Cell(20 ,5,'',0,0);
// $pdf->Cell(50 ,5,'Lokasi',1,0);
// $pdf->Cell(4 ,5,':',1,0);
// $pdf->Cell(100 ,5,'isian lokasi',1,0);
// $pdf->Cell(20 ,5,'',0,1);//end of line

// $pdf->Cell(20 ,5,'',0,0);
// $pdf->Cell(50 ,5,'Penyebab',1,0);
// $pdf->Cell(4 ,5,':',1,0);
// $pdf->Cell(100 ,5,'isian lokasi',1,0);
// $pdf->Cell(20 ,5,'',0,1);//end of line





//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',1,1);//end of line

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