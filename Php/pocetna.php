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
	
	<?php
		if (isset($_POST['skiniPdf'])){
			header("Location: downloadPDF.php");
		}
	?>
	
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
			<div class="red naslovNovosti pocetna">
				<div class="kolona cetri pocetna">
					Novosti
				</div>
			</div>
	
			<?php 
				
				$veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
				$veza->exec("set names utf8");
				$rezultat = $veza->query("select naslov, sadrzaj, golman from Novosti");
				if (!$rezultat) {
					$greska = $veza->errorInfo();
					print "SQL greška: " . $greska[2];
					exit();
				}

				
				foreach($rezultat as $novost)
				{
			?>
				<div class="kolona cetri">
					<div class="red naslovNovosti">
						<?php echo $novost['naslov']; ?>
					</div>
					<div class="red poravnat">
						<?php echo $novost['sadrzaj'];?>
					</div>
					<div  class="red poravnat">
						<b>Novost o golmanu:</b>
						<?php 
							$id = $novost['golman'];
							$golmaniSQL = $veza->query("select id, ime from golmani");
							if (!$golmaniSQL) {
								$greska = $veza->errorInfo();
								print "SQL greška: " . $greska[2];
								exit();
							}
							foreach ($golmaniSQL as $golman){
								if ($golman['id']==$id){
									echo $golman['ime'];
								}
							}
						?>
					</div>
				</div>
			<?php 
				}
			?>
		
		
			<div class="red">
				<form action="pocetna.php" method="post">
					<input type="submit" name="skiniPdf" value="Preuzmi novosti u obliku pdf fajla">
				</form>
			</div>
			
			<div class="red">
				Pretrazi novosti:
				<input id="pretraga" type="text" name="pretraga" onkeyup="showResult(this.value)">
				<input type="submit" name="pretrazi" value="Pretrazi" onclick="prikaziRezultate()">
				<div id="livesearch"></div>
			</div>
		</div>
	</body>
</html>