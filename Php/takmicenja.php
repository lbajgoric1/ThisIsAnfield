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
		<SCRIPT src="../Javascript/pretraga.js"></SCRIPT>
	</head>
	


	<body>
		<div>
			<h1 class="naslov"> 
				THIS IS ANFIELD
			</h1>
		</div>
		<a id="linkLogin" href="login.php"> Login </a>
		<a id="linkLogout" href="logout.php"> Logout </a>
		<div>
			<ul class="meni">
				<li> <a id="pocetna.html" href="pocetna.php"> Početna </a> <li>
				<li class="dropdown"> 
					<a id="takmicenja.html" href="#" class="dropbtn" onclick="prikaziPadajuci('ddContent')">Takmičenja</a>
					<div class="dropdown-content" id="ddContent">
						<a class="dropdown-link" href="takmicenja.php">Osnovne informacije</a>
						<a class="dropdown-link" href="sezona1415.php">2014/2015.</a>
						<a class="dropdown-link" href="sezona1314.php">2013/2014.</a>
					</div>
				<li> <a id="oKlubu.html" href="oKlubu.php"> O klubu </a> <li>
				<li class="dropdown"> 
					<a id="momcad.html" href="#" class="dropbtn" onclick="prikaziPadajuci('ddContent2')">Momčad</a>
					<div class="dropdown-content" id="ddContent2">
						<a class="dropdown-link" href="momcad.php"> Svi igrači </a>	
						<a class="dropdown-link" href="golmani.php">Golmani</a>
						<a class="dropdown-link" href="../Html/odbrambeni.html">Odbrambeni </a>
						<a class="dropdown-link" href="../Html/vezni.html">Vezni </a>
						<a class="dropdown-link" href="../Html/napadaci.html"> Napadači</a>					  					  
					</div>
				<li>
				<li> <a id="anfield.html" href="anfield.php"> Anfield </a> <li>
				<li> <a id="galerija.html" href="../Html/galerija.html">Galerija slika</a> <li>
				<li> <a id="adminOpcije" href="validacijaAdmin.php">Admin opcije</a> <li>
			</ul>
		</div>
		
		<div class="sadrzaj" id="sadrzaj">
			<div class="red">
				<div class="kolona dva">
					<div class="red poravnat takmicenje">
						
						<form action="action_page.php"  id="radioDugmad">
						<fieldset>
							<legend> Liverpool u takmičenjima: </legend>
							<input type="radio" name="tip" value="premiership" checked onclick="prikazi('premiership')"> Premiership <br>
							<input type="radio" name="tip" value="ligaSampiona" onclick="prikazi('ligaSampiona')"> Liga šampiona<br>
							<input type="radio" name="tip" value="ligaEvrope" onclick="prikazi('ligaEvrope')"> Liga Evrope <br>
							<input type="radio" name="tip" value="ostalaTakmicenja" onclick="prikazi('ostala')"> Ostala takmičenja
						</fieldset>
						</form>
					</div>
					
					<div id="info" class="red poravnat takmicenje">
						<?php
							$_XML = simplexml_load_file("../Xml/takmicenja.xml");
							echo $_XML->premiership->tekst;
						?>
						<!-- Prvak: 1901., 1906., 1922., 1923., 1947., 1964., 1966., 1973., 1976., 1977., 1979., 1980., 1982., 1983., 1984., 1986., 1988., 1990. -->
					</div>
				</div>
				<div class="kolona dva">
					<img  id="slika1" alt="takmicenje" class="slika" src="<?php echo $_XML->premiership->slike->slika1; ?>">
				</div>
			</div>
			
			<div class="red">
				<div class="kolona dva">
					<img id="slika2" alt="takmicenje" class="slika" src="<?php echo $_XML->premiership->slike->slika2; ?>">
				</div>
				<div class="kolona dva">
					<img id="slika3" alt="takmicenje" class="slika" src="<?php echo $_XML->premiership->slike->slika3; ?>">
				</div>
			</div>	
		</div>
	</body>
</html>