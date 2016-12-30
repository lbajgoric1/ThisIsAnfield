<?php
	$_sadrzaj[] = "";
	
	$_XML = simplexml_load_file("../Xml/novosti.xml");
	
	foreach($_XML->novost as $n){
		$_sadrzaj[] = $n->naslov;
		
	}


	$xmlDoc=new DOMDocument();
	$xmlDoc->load("../Xml/novosti.xml");

	$x=$xmlDoc->getElementsByTagName('novost');

	//get the q parameter from URL
	$q=$_GET["q"];

	//lookup all links from the xml file if length of q>0
	if (strlen($q)>0) {
	  $hint="";
	  for($i=0; $i<($x->length); $i++) {
		$y=$x->item($i)->getElementsByTagName('naslov');
		$z=$x->item($i)->getElementsByTagName('sadrzaj');
		if ($y->item(0)->nodeType==1 || $z->item(0)->nodeType==1) {
		  //find a link matching the search text
		  if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q) || stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
			// if ($hint=="") {
			  // $hint="<a href='" . 
			  // $z->item(0)->childNodes->item(0)->nodeValue . 
			  // "' target='_blank'>" . 
			  // $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
			// } else {
			  // $hint=$hint . "<br /><a href='" . 
			  // $z->item(0)->childNodes->item(0)->nodeValue . 
			  // "' target='_blank'>" . 
			  // $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
			// }
			
			if ($hint=="") {
			  $hint= "<b>Naslov: </b>" . $y->item(0)->childNodes->item(0)->nodeValue . "<br />" . 
			  "<b>Sadrzaj: </b>" . $z->item(0)->childNodes->item(0)->nodeValue;
			} else {
			  $hint=$hint . "<br />". 
			  "<b>Naslov: </b>" . $y->item(0)->childNodes->item(0)->nodeValue . "<br />" .
			  "<b>Sadrzaj: </b>" . $z->item(0)->childNodes->item(0)->nodeValue;
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