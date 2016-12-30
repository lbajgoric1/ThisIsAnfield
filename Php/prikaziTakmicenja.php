<?php
	$tip = $_REQUEST["tip"];
	$_XML = simplexml_load_file('../Xml/takmicenja.xml');
	
	echo $_XML->$tip->tekst;
?>