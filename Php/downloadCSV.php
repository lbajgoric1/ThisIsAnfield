<?php
	
	
	$_fajl = fopen("Novosti.csv","w");
	
	$_XML = simplexml_load_file("../Xml/novosti.xml");
	foreach($_XML->novost as $_n){
		$_podaci = $_n->naslov . " - " . $_n->sadrzaj;
		fputcsv($_fajl, explode(',', $_podaci));
	}
	
	fclose($_fajl);
	
	// header('Content-Type: application/csv; charset=UTF-8');
    // header('Content-Disposition: attachment;filename=Novosti.csv');
?>