<?php 
	header('Content-Type: text/html; charset=utf-8');
	require('fpdf181/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Times','B',18);
	$pdf->SetTitle('Novosti');
	$pdf->SetTextColor(128, 0, 0);
	$pdf->MultiCell(120,20,'Novosti na This Is Anfield:');
		
	$_XML = simplexml_load_file("../Xml/novosti.xml");
	foreach($_XML->novost as $_n)
	{
		$_ispis1 ="Naslov: ".$_n->naslov;
		$_ispis2 =" - ".$_n->sadrzaj;
		$pdf->SetFont('Times','I',16);
		$pdf->SetTextColor(128, 0, 0);
		$pdf->MultiCell(150,10,$_ispis1);	
		$pdf->SetTextColor(0, 0, 102);
		$pdf->MultiCell(150,10,$_ispis2);
	}

	ob_end_clean();
	$pdf->Output();
?>