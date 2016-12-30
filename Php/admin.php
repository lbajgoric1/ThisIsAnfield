<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> This is Anfield </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="../Css/meni.css">
		<link rel="stylesheet" type="text/css" href="../Css/sadrzaj.css">
		
		<SCRIPT src="../Javascript/index.js"></SCRIPT>
		<SCRIPT src="../Javascript/pretraga.js"></SCRIPT>
	</head>
	
	<?php
		$_msg="";
	
		if(isset($_POST['unosNovosti']))
		{
			header("Location: unosNovosti.php");
		}
		
		if(isset($_POST['brisanjeNovosti']))
		{
			header("Location: brisanjeNovosti.php");
		}
		
		if(isset($_POST['izmjenaNovosti']))
		{
			header("Location: izmjenaNovosti.php");
		}
		
		if(isset($_POST['csvFajl']))
		{
			$_fajl = fopen("Novosti.csv","w");
	
			$_XML = simplexml_load_file("../Xml/novosti.xml");
			foreach($_XML->novost as $_n){
				$_podaci = $_n->naslov . " - " . $_n->sadrzaj;
				fputcsv($_fajl, explode(',', $_podaci));
			}
			
			fclose($_fajl);
			$_msg = "CSV file je spasen u Php folderu.";
		}
	
	?>

	<body>
		<div>
			<h1 class="naslov"> 
				THIS IS ANFIELD
			</h1>
		</div>
		<a id="linkLogin" href="#" onclick="ucitajStranicu('login.php', 'linkLogin')"> Login </a>
		<a id="linkLogout" href="../Php/logout.php"> Logout </a>
		<div>
			<ul class="meni">
				<li> <a id="pocetna.html" href="#" onclick="ucitajStranicu('pocetna.php', 'pocetna.html')"> Početna </a> <li>
				<li class="dropdown"> 
					<a id="takmicenja.html" href="#" class="dropbtn" onclick="prikaziPadajuci('ddContent')">Takmičenja</a>
					<div class="dropdown-content" id="ddContent">
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('takmicenja.php', 'takmicenja.html')">Osnovne informacije</a>
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('sezona1415.php', 'takmicenja.html')">2014/2015.</a>
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('sezona1314.php', 'takmicenja.html')">2013/2014.</a>
					</div>
				<li> <a id="oKlubu.html" href="#" onclick="ucitajStranicu('oKlubu.php', 'oKlubu.html')"> O klubu </a> <li>
				<li class="dropdown"> 
					<a id="momcad.html" href="#" class="dropbtn" onclick="prikaziPadajuci('ddContent2')">Momčad</a>
					<div class="dropdown-content" id="ddContent2">
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('momcad.php', 'momcad.html')"> Svi igrači </a>	
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('../Html/golmani.html', 'momcad.html')">Golmani</a>
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('../Html/odbrambeni.html', 'momcad.html')">Odbrambeni </a>
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('../Html/vezni.html', 'momcad.html')">Vezni </a>
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('../Html/napadaci.html', 'momcad.html')"> Napadači</a>					  					  
					</div>
				<li>
				<li> <a id="anfield.html" href="#" onclick="ucitajStranicu('anfield.php', 'anfield.html')"> Anfield </a> <li>
				<li> <a id="galerija.html" href="#" onclick="ucitajStranicu('../Html/galerija.html', 'galerija.html')"> Galerija slika </a> <li>
				<li> <a id="adminOpcije" href="../Php/validacijaAdmin.php">Admin opcije</a> <li>
			</ul>
		</div>
		
		<div class="sadrzaj" id="sadrzaj">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<fieldset>
					<legend> Opcije: </legend>
					<div class="red">
						<input type="submit" value="Unos novosti" name="unosNovosti" class="input">
						<input type="submit" value="Izmjena novosti" name="izmjenaNovosti" class="input">
						<input type="submit" value="Brisanje novosti" name="brisanjeNovosti" class="input">
					</div>
					<div class="red">
						<input type="submit" value="Download novosti obliku csv fajla." name="csvFajl" class="input">
						<div id="uspjesno"><?php echo $_msg; ?> </div>
					</div>
				</fieldset>
			</form>
			
		</div>
	</body>
</html>