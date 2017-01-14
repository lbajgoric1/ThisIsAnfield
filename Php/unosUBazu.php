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
	
	<?php
		$msg = "";
		$msg2 = "";
		
		try {
			// $veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
			$veza = new PDO("mysql:dbname=thisisanfield;host=mysql-57-centos7", "admin", "admin"));
			$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$_XML = simplexml_load_file("../Xml/golmani.xml");
			foreach($_XML->golman as $_g){
				$data = $veza->prepare("select * from golmani where ime = '". trim($_g->ime) ."' and tekst = '". trim($_g->tekst) ."' and slika = '". $_g->slika ."'");
				$data->execute();
				
				if ($row = $data->fetch()){
					// throw new Exception("Podaci vec postoje u bazi");
					echo "Podaci o golmanu" . $_g->ime . " vec postoje u bazi" . "<br>";
					
				}
				else {
					$data = $veza->prepare("INSERT INTO golmani (ime, tekst, slika) VALUES(?, ?, ?)");
					$data->execute(array($_g->ime, $_g->tekst, $_g->slika));
					echo "Uspjesno ste upisali golmana " . $_g->ime . " u bazu." . "<br>";
				}
			}
			
			$_XML = simplexml_load_file("../Xml/novosti.xml");
			foreach($_XML->novost as $_n){
				$data = $veza->prepare("select * from novosti where naslov = '". $_n->naslov ."' and sadrzaj = '". $_n->sadrzaj ."' and golman = '". $_n->golman ."'");
				$data->execute();
				
				if ($row = $data->fetch()){
					// throw new Exception("Podaci vec postoje u bazi");
					echo "Podaci o novosti " . $_n->naslov . " vec postoje u bazi" . "<br>";
				}
				else {
					$data = $veza->prepare("INSERT INTO novosti (naslov, sadrzaj, golman) VALUES(?, ?, ?)");
					$data->execute(array($_n->naslov, $_n->sadrzaj, $_n->golman));	
					echo "Uspjesno ste upisali novost "  . $_n->naslov . " u bazu." . "<br>";
				}
				
			}
			
			$_XML = simplexml_load_file("../Xml/poruke.xml");
			foreach($_XML->poruka as $_p){
				$data = $veza->prepare("select * from poruke where imeiprezime= '". $_p->imeiprezime ."' and telefon = '". $_p->telefon ."' and email = '". $_p->email ."' and sadrzaj = '". $_p->sadrzaj ."' and golman = '". $_p->golman ."'");
				$data->execute();
				
				if ($row = $data->fetch()){
					// throw new Exception("Podaci vec postoje u bazi");
					echo "Podaci o poruci korisnika " . $_p->imeiprezime . " vec postoji u bazi" . "<br>";
				}
				else {
					$data = $veza->prepare("INSERT INTO poruke (imeiprezime, telefon, email, sadrzaj, golman) VALUES(?, ?, ?, ?, ?)");
					$data->execute(array($_p->imeiprezime, $_p->telefon, $_p->email, $_p->sadrzaj, $_p->golman));
					echo "Uspjesno ste upisali poruku korisnika " . $_p->imeiprezime . " u bazu." . "<br>";
				}
				
			}
			
			$_XML = simplexml_load_file("../Xml/admin.xml");
			foreach($_XML->admin as $_a){
				$data = $veza->prepare("select * from admin where username= '". $_a->username ."' and password = '". $_a->password . "'");
				$data->execute();
				
				if ($row = $data->fetch()){
					// throw new Exception("Podaci vec postoje u bazi");
					echo "Podaci o adminu vec postoje u bazi" . "<br>";
				}
				else {
					$data = $veza->prepare("INSERT INTO admin (username, password) VALUES(?, ?)");
					$data->execute(array($_a->username, $_a->password));
					echo "Uspjesno ste upisali admina";
				}
			}
			
			$veza = null;
		}
		
		catch(PDOException $e){
			echo $e->getMessage();
		}
		
		
		if (isset($_POST['nazad'])){
			header("Location: admin.php");
		}
	?>
		<form method="post">
			<input id="nazadBtn" type="submit" value="Nazad" name="nazad" class="nazadBtn">
		</form>
	</div>
	
</body>


