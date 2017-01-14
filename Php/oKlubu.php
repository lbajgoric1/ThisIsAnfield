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
				<div class="kolona jedan centriran">
					<img alt="grb" class="slika" src="<?php
						$_XML = simplexml_load_file("../Xml/oKlubu.xml");
						echo $_XML->slika;
					?>"> 
				</div>
				
				<div class="kolona dva poravnat takmicenje">
					<?php echo $_XML->tekst;?>
				</div>
					
					
				<div class="kolona jedan oklubu">
					<table class="tabela">
						<tr>
							<th colspan="2" class="info"> Osnovne informacije </th>
						</tr>
						<tr>
							<th> Puno ime: </th>
							<td> <?php echo $_XML->podaci->ime; ?> </td> 
							
						</tr>	
						<tr>
							<th> Nadimak: </th>
							<td> <?php echo $_XML->podaci->nadimak; ?> </td> 
							
						</tr>
						<tr>
							<th> Osnovan: </th>
							<td> <?php echo $_XML->podaci->datumOsnivanja; ?> </td> 
							
						</tr>	
						<tr>	
							<th> Igralište: </th>
							<td> <?php echo $_XML->podaci->igraliste; ?> </td>
							
						</tr>	
						<tr>
							<th> Kapacitet: </th>
							<td> <?php echo $_XML->podaci->kapacitet; ?> </td> 
							
						</tr>	
						<tr>
							<th> Trener: </th>
							<td> <?php echo $_XML->podaci->trener; ?> </td>
						</tr>	
					</table>
				</div>
			</div>	
		</div>
	</body>
</html>