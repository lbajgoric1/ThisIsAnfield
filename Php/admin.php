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
		$_msg="";
		$_msg2="";
	
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
			
			try {
				$veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
				$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$data = $veza->query("select naslov, sadrzaj, golman from novosti");
						
				if (!$data) {
					$greska = $veza->errorInfo();
					print "SQL greška: " . $greska[2];
					exit();
				}
				foreach ($data as $novost){
					$golman = $veza->query("select ime from golmani where id = '". $novost['golman'] ."'");
					if (!$golman) {
						$greska = $veza->errorInfo();
						print "SQL greška: " . $greska[2];
						exit();
					}
					foreach ($golman as $_g){
						$_podaci = $novost['naslov'] . " - " . $novost['sadrzaj'] . " - " . $_g['ime'];
						fputcsv($_fajl, explode(',', $_podaci));
					}
					
				}
				
				fclose($_fajl);
				$_msg = "CSV file je spasen u Php folderu.";
			}
			catch(PDOException $e){
				echo $sql . "<br>" . $e->getMessage();
			}
			
			$veza = null;
		}
		
		if (isset($_POST['unosUBazu'])){
			header("Location: unosUBazu.php");
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
			<form action="admin.php" method="post">
				<fieldset>
					<legend> Opcije: </legend>
					<div class="red">
						<input type="submit" value="Unos novosti" name="unosNovosti" class="input">
						<input type="submit" value="Izmjena novosti" name="izmjenaNovosti" class="input">
						<input type="submit" value="Brisanje novosti" name="brisanjeNovosti" class="input">
					</div>
					<div class="red">
						<input type="submit" value="Download novosti obliku csv fajla." name="csvFajl" class="input">
					</div>
					<div class="red">
						<input type="submit" value="Učitaj podatke iz xml-a u bazu" name="unosUBazu" class="input">
					</div>
					<div class="red">
						<div id="uspjesno"><?php echo $_msg; ?> </div>
					</div>
				</fieldset>
			</form>
			
		</div>
	</body>
</html>