<?php
	$naslov = $_REQUEST["naslov"];
	$_XML = simplexml_load_file('../Xml/novosti.xml');
	
	$_brojac=0;
	foreach($_XML->novost as $_n) {
		$_brojac=$_brojac+1;
		if (trim($_n->naslov)==trim($naslov)){
			echo $_brojac;
		}
	}
	
?>