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
		
		function validirajXSS($_unos) 
		{
			$_unos = trim($_unos);
			$_unos = stripslashes($_unos);
			$_unos = htmlspecialchars($_unos, ENT_QUOTES );
			return $_unos;
		}
		
		$_msg ="";
		$_msg2 ="";
		$_naslov ="";
		$_sadrzaj="";
		$_hidden = "hidden";
		
		if (isset($_POST['prikaziNovost'])){
			$_naslov = $_POST['novosti'];
			
			$_XML = simplexml_load_file('../Xml/novosti.xml');
			
			foreach($_XML->novost as $_n) {
				
				if (trim($_n->naslov)==trim($_naslov)){
					$_sadrzaj=trim($_n->sadrzaj);
					$_naslov=trim($_n->naslov);
				}
			}
		}
		
		if (isset($_POST['spasiNovost'])){
			if (empty($_POST['noviNaslov'])!=0 || empty($_POST['noviSadrzaj'])!=0){
				$_msg2 = "Prvo odaberite novost!";
			}
			else {
				validirajXSS($_POST['stariNaslov']);
				validirajXSS($_POST['noviNaslov']);
				validirajXSS($_POST['noviSadrzaj']);
				
				$_stariNaslov = $_POST['stariNaslov'];
				$_noviNaslov = $_POST['noviNaslov'];
				$_noviSadrzaj = $_POST['noviSadrzaj'];
				
				$_XML = simplexml_load_file('../Xml/novosti.xml');
				
				foreach($_XML->novost as $_n) {
					if (trim($_n->naslov)==trim($_stariNaslov)){
						$_n->naslov=trim($_noviNaslov);
						$_n->sadrzaj=trim($_noviSadrzaj);
					}
				}
				$_XML->asXML('../Xml/novosti.xml');
				
				$_hidden="hidden";
				$_msg ="Uspjesno ste izmjenili novost.";
				
			}
			
		}
		
		if (empty($_POST['stariNaslov'])){
			$_hidden="hidden";
		}
		else {
			$_hidden="";
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
				<li> <a id="pocetna.html" href="#" onclick="ucitajStranicu('pocetna.php', 'pocetna.html')"> Početna </a> </li>
				<li class="dropdown"> 
					<a id="takmicenja.html" href="#" class="dropbtn" onclick="prikaziPadajuci('ddContent')">Takmičenja</a>
					<div class="dropdown-content" id="ddContent">
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('takmicenja.php', 'takmicenja.html')">Osnovne informacije</a>
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('sezona1415.php', 'takmicenja.html')">2014/2015.</a>
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('sezona1314.php', 'takmicenja.html')">2013/2014.</a>
					</div>
				</li>
				<li> <a id="oKlubu.html" href="#" onclick="ucitajStranicu('oKlubu.php', 'oKlubu.html')"> O klubu </a> </li>
				<li class="dropdown"> 
					<a id="momcad.html" href="#" class="dropbtn" onclick="prikaziPadajuci('ddContent2')">Momčad</a>
					<div class="dropdown-content" id="ddContent2">
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('momcad.php', 'momcad.html')"> Svi igrači </a>	
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('../Html/golmani.html', 'momcad.html')">Golmani</a>
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('../Html/odbrambeni.html', 'momcad.html')">Odbrambeni </a>
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('../Html/vezni.html', 'momcad.html')">Vezni </a>
						<a class="dropdown-link" href="#" onclick="ucitajStranicu('../Html/napadaci.html', 'momcad.html')"> Napadači</a>					  					  
					</div>
				</li>
				<li> <a id="anfield.html" href="#" onclick="ucitajStranicu('anfield.php', 'anfield.html')"> Anfield </a> </li>
				<li> <a id="galerija.html" href="#" onclick="ucitajStranicu('../Html/galerija.html', 'galerija.html')"> Galerija slika </a> </li>
				<li> <a id="adminOpcije" href="../Php/validacijaAdmin.php">Admin opcije</a> <li>
			</ul>
		</div>
		
		<div class="sadrzaj" id="sadrzaj">
			<form id="izmjenaNovosti" action="izmjenaNovosti.php" method="post">
				<fieldset>
					<legend> Izmjeni novost: </legend>
					<div class="red">
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
					</div>
					<div class="red">
						<input id="nazadBtn" type="submit" value="Nazad" name="nazad" class="nazadBtn">
						<input type="submit" name="prikaziNovost" value="Prikazi novost" class="akcijaBtn">
					</div>
					
					<div class="red" <?php echo $_hidden; ?>>
						<form id="spasiNovost" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<div class="red">
								Naslov novosti 
								<textarea id="naslov" name="noviNaslov" cols="80" rows="2" class="textareaNovost"><?php echo $_naslov; ?></textarea>
								<br> <br>
							</div>
							<div class="red">
								Sadržaj novosti
								<textarea id="sadrzajOdabraneNovosti" name="noviSadrzaj" cols="80" rows="5" class="textareaNovost"><?php echo $_sadrzaj; ?></textarea> 
								<br> <br>
							</div>
							<input type="submit" name="spasiNovost" value="Spasi novost" class="akcijaBtn"> 
							<div id="uspjesno"><?php echo $_msg; ?> </div>
							<div id="greska"><?php echo $_msg2; ?> </div>
							
							<div class="red" hidden>
								Stari Naslov novosti 
								<textarea id="stariNaslov" name="stariNaslov" cols="80" rows="2">
									<?php echo $_naslov; ?>
								</textarea>
								<br> <br>
							</div>
							
						</form>
					</div>
				</fieldset>
			</form>
		</div>
	</body>
</html>