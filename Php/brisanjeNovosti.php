<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> This is Anfield </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="../Css/meni.css">
		<link rel="stylesheet" type="text/css" href="../Css/sadrzaj.css">
		
		<SCRIPT src="../Javascript/index.js"></SCRIPT>
		<SCRIPT src="../Javascript/momcad.js"></SCRIPT>
		<SCRIPT src="../Javascript/galerija.js"></SCRIPT>
		<SCRIPT src="../Javascript/anfield.js"></SCRIPT>
		<SCRIPT src="../Javascript/takmicenja.js"></SCRIPT>
		<SCRIPT src="../Javascript/momcad.js"></SCRIPT>
		<SCRIPT src="../Javascript/login.js"></SCRIPT>
	</head>
	
	<?php 
		session_start();
		$_msg2 = "";
		if (isset($_POST['obrisiNovost'])){
			$_odabranaNovost = $_POST['novosti'];
			
			$_XML = simplexml_load_file("../Xml/novosti.xml");
			foreach($_XML->novost as $_n){
				if (trim($_n->naslov)==trim($_odabranaNovost)){
					$tmp = dom_import_simplexml($_n);
                    $tmp->parentNode->removeChild($tmp);
					$_msg2="Uspješno ste obrisali novost.";
					$_XML->asXML('../Xml/novosti.xml');
				}
			}
		}
		
		if(isset($_POST['nazad'])){
			header ("Location: admin.php");
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
			<form id="unosNovosti" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<fieldset>
					<legend> Obrisi novost: </legend>
					Naslov novosti 
					<select id="comboNovosti" class="comboBox" name="novosti">
							<?php 
								$_XML = simplexml_load_file("../Xml/novosti.xml");
								foreach($_XML->novost as $_n){
							?>
								<option value="<?php echo $_n->naslov; ?>"> <?php echo $_n->naslov; ?> </option>
							<?php
								}
							?>
							
						</select>
					
					<div class="red">
						<input id="nazadBtn" type="submit" value="Nazad" name="nazad" class="nazadBtn">
						<input id="obrisiBtn" type="submit" value="Obrisi novost" name="obrisiNovost" class="akcijaBtn"> 
						<div id="greska"> </div>
						<div id="uspjesno"> <?php echo $_msg2 ?></div>
					</div>
					
				</fieldset>
			</form>
		</div>
	</body>
</html>