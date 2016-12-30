<?php
	$tip = $_REQUEST["tip"];
	$_XML = simplexml_load_file('../Xml/takmicenja.xml');
	
	$dom = new DOMDocument();
	$dom->loadHTML(file_get_contents('http://localhost/ThisIsAnfield/Php/takmicenja.php'));
	
	$brojac = 1;
	
	foreach ($dom->getElementsByClass('slika') as $item) {
		$slika = 'slika'.$brojac;
		$item->setAttribute('src', echo $_XML->$tip->slike->$slika;);
		$brojac = $brojac + 1;
		echo $dom->saveHTML();
		exit;
	}
?>