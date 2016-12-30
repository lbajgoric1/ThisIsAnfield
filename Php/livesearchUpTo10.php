<?php
	$_XML = simplexml_load_file("../Xml/novosti.xml");

	$xmlDoc=new DOMDocument();
	$xmlDoc->load("../Xml/novosti.xml");

	$x=$xmlDoc->getElementsByTagName('novost');

	//get the q parameter from URL
	$q=$_GET["q"];
	$brojac = 0;

	//lookup all links from the xml file if length of q>0
	if (strlen($q)>0) {
		$hint="";
		for($i=0; $i<($x->length); $i++) {
			$y=$x->item($i)->getElementsByTagName('naslov');
			$z=$x->item($i)->getElementsByTagName('sadrzaj');
			if ($y->item(0)->nodeType==1 || $z->item(0)->nodeType==1) {
			  //find a link matching the search text
				if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q) || stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
					if ($hint=="") {
						$hint= "<b>Naslov: </b>" . $y->item(0)->childNodes->item(0)->nodeValue . "<br />" . 
						"<b>Sadrzaj: </b>" . $z->item(0)->childNodes->item(0)->nodeValue. "<br />";
						$brojac++;
						if ($brojac>=10){
							return;
						}
					} else {
						$hint=$hint . "<br />". 
						"<b>Naslov: </b>" . $y->item(0)->childNodes->item(0)->nodeValue . "<br />" .
						"<b>Sadrzaj: </b>" . $z->item(0)->childNodes->item(0)->nodeValue. "<br />";
						$brojac++;
						if ($brojac>=10){
							return;
						}
					}
				}
			}
		}
	}

	// Set output to "no suggestion" if no hint was found
	// or to the correct values
	if ($hint=="") {
		$response="no suggestion";
	} else {
		$response=$hint;
	}

	//output the response
	echo $response;
?>