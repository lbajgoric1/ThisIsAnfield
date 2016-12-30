<?php
	$tip = $_REQUEST["tip"];
	$_XML = simplexml_load_file('../Xml/momcad.xml');
	
	foreach($_XML->golmani->golman as $_g) {
		if (trim($_g->ime)==trim($tip)){
			echo $_g->tekst;
		}
	}
	
?>