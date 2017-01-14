<?php 
	header('Content-Type: text/html; charset=utf-8');
	require('fpdf181/fpdf.php');
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Times','B',18);
	$pdf->SetTitle('Novosti');
	$pdf->SetTextColor(128, 0, 0);
	$pdf->MultiCell(120,20,'Novosti na This Is Anfield:');
		
	try {
		// $veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
		$veza = new PDO("mysql:dbname=thisisanfield;host=mysql-57-centos7", "admin", "admin"));
		$veza->exec("set names utf8");
		$rezultat = $veza->query("select naslov, sadrzaj, golman from Novosti");
		if (!$rezultat) {
			$greska = $veza->errorInfo();
			print "SQL greška: " . $greska[2];
			exit();
		}

		foreach($rezultat as $novost){
			$_ispis1 ="Naslov: ".$novost['naslov'];
			$_ispis2 =" - ".$novost['sadrzaj'];
			$pdf->SetFont('Times','I',16);
			$pdf->SetTextColor(128, 0, 0);
			$pdf->MultiCell(150,10,$_ispis1);	
			$pdf->SetTextColor(0, 0, 102);
			$pdf->MultiCell(150,10,$_ispis2);
		}
		ob_end_clean();
		$pdf->Output();
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	
?>