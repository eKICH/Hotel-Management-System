<?php
require('fpdf17/fpdf.php');

include 'includes/conn.inc.php';

// check GET request id param
if(isset($_GET['id'])){

	$id = Mysqli_real_escape_string($conn, $_GET['id']);

	$sql = "SELECT * FROM check_out WHERE id=$id";


	//get query results

	$result = Mysqli_query ($conn, $sql);

	//fetch result in array format
	$pizza = Mysqli_fetch_assoc($result);



	Mysqli_free_result($result);
	Mysqli_close($conn);
}
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'HOTEL MANAGEMENT SYSTEM',0,0);
$pdf->Cell(59	,5,'RECEIPT',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'Upperhill',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Nairobi, Kenya, 001000',0,0);
$pdf->Cell(25	,5,'Date',0,0);
$pdf->Cell(34	,5,$pizza['checkout'],0,1);//end of line

$pdf->Cell(130	,5,'Phone +254728567890',0,0);
$pdf->Cell(25	,5,'',0,0);
$pdf->Cell(34	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Fax +254728567890',0,0);
$pdf->Cell(25	,5,'',0,0);
$pdf->Cell(34	,5,'',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(25	,5,'Room No',0,0);
$pdf->Cell(90	,5, $pizza['rno'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(25	,5,'Room Type',0,0);
$pdf->Cell(90	,5,$pizza['rtype'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(25	,5,'Guest Name',0,0);
$pdf->Cell(90	,5,$pizza['fname'].' '.$pizza['lname'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(25	,5,'Country',0,0);
$pdf->Cell(90	,5,$pizza['nationality'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(25	,5,'Check In',0,0);
$pdf->Cell(90	,5,$pizza['checkin'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(25	,5,'Check Out',0,0);
$pdf->Cell(90	,5,$pizza['checkout'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(125	,5,'Description',1,0);
$pdf->Cell(25	,5,'',1,0);
$pdf->Cell(42	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(125	,5,'Reservation -'.' '.$pizza['ntype'],1,0);
$pdf->Cell(25	,5,'',1,0);
$pdf->Cell(42	,5,$pizza['totalamount'],1,1,'R');//end of line

// $pdf->Cell(130	,5,'Supaclean Diswasher',1,0);
// $pdf->Cell(25	,5,'',1,0);
// $pdf->Cell(34	,5,'1,200',1,1,'R');//end of line

// $pdf->Cell(130	,5,'Something Else',1,0);
// $pdf->Cell(25	,5,'',1,0);
// $pdf->Cell(34	,5,'1,000',1,1,'R');//end of line

//summary
$pdf->Cell(125	,5,'',0,0);
$pdf->Cell(25	,5,'Total Days',0,0);
$pdf->Cell(12	,5,'',1,0);
$pdf->Cell(30	,5,$pizza['tdays'],1,1,'R');//end of line

$pdf->Cell(125	,5,'',0,0);
$pdf->Cell(25	,5,'Amount/Day',0,0);
$pdf->Cell(12	,5,'KES',1,0);
$pdf->Cell(30	,5,$pizza['aday'],1,1,'R');//end of line

$pdf->Cell(125	,5,'',0,0);
$pdf->Cell(25	,5,'Total',0,0);
$pdf->Cell(12	,5,'KES',1,0);
$pdf->Cell(30	,5,$pizza['totalamount'],1,1,'R');//end of line


$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(25	,5,'',0,0);



$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(25	,5,'**** Thank you for staying with us ****',0,0);



$pdf->Output();
?>