<?php
	$naslov = $_REQUEST["naslov"];
	$_XML = simplexml_load_file('../Xml/novosti.xml');
	
	foreach($_XML->novost as $_n) {
		if (trim($_n->naslov)==trim($naslov)){
			echo trim($_n->sadrzaj);
		}
	}
	
?>