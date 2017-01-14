<?php
	$tip = $_REQUEST["tip"];
	
	// $veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
	$veza = new PDO("mysql:dbname=thisisanfield;host=mysql-57-centos7", "admin", "admin"));
	$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$data = $veza->query("select tekst from golmani where ime = '". $tip ."'");
	foreach ($data as $golman){
		echo $golman['tekst'];
	
	}
	$veza = null;
?>