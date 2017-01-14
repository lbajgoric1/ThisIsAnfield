<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> This is Anfield </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="../Css/meni.css">
		<link rel="stylesheet" type="text/css" href="../Css/sadrzaj.css">
		
		<SCRIPT src="../Javascript/unosNovosti.js"></SCRIPT>
		
	</head>
	
	<?php
		function validirajXSS($_unos) 
		{
			$_unos = trim($_unos);
			$_unos = stripslashes($_unos);
			$_unos = htmlspecialchars($_unos, ENT_QUOTES );
			return $_unos;
		}
		
		$_msg = "";
		$_msg2 = "";
		$_idGolmana = 0;
		
		if(isset($_POST['unesiNovost'])){
			if (empty($_POST['naslov'])){
				$_msg = "Unesite naslov";
			}
			else if (empty($_POST['sadrzaj'])){
				$_msg = "Unesite sadrzaj";
			}
			else {
				validirajXSS($_POST['naslov']);
				validirajXSS($_POST['sadrzaj']);
				
				$_imeGolmana = trim($_POST['golman']);
				
				
				try {
					$veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
					$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$veza->exec("set names utf8");
					
					$data = $veza->query("select id, ime from golmani");
					
					if (!$data) {
						$greska = $veza->errorInfo();
						print "SQL greška: " . $greska[2];
						exit();
					}
					foreach ($data as $golman){
						if (trim($golman['ime'])==$_imeGolmana){
							$_idGolmana = $golman['id'];
						}
					}
					
					$data = $veza->prepare("select * from novosti where naslov = '". $_POST['naslov'] ."' and sadrzaj = '". $_POST['sadrzaj'] ."' and golman = '". $_idGolmana ."'");
					$data->execute();
				
					if ($row = $data->fetch()){
						$_msg = "Podaci o unesenoj novosti vec postoje u bazi" . "<br>";
					}
					else {
						$unos = $veza->prepare("INSERT INTO novosti (naslov, sadrzaj, golman) VALUES(?, ?, ?)");
						$unos->execute(array($_POST['naslov'], $_POST['sadrzaj'], $_idGolmana));	
						$_msg2 = "Uspjesno ste upisali novost "  . $_POST['naslov'] . " u bazu." . "<br>";
					}
					
					$veza = null;
				}
				
				catch(PDOException $e){
					echo $e->getMessage();
				}
			}
		}
		
		if (isset($_POST['nazad'])){
			header("Location: admin.php");
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
			<form id="unosNovosti" action="unosNovosti.php" method="post">
				<fieldset>
					<legend> Unesi novost: </legend>
					Naslov novosti 
					<textarea id="naslov" name="naslov" cols="40" rows="1" class="unos" onkeyup="validirajUnos()"></textarea>
					<br> <br>
					Sadržaj novosti
					<textarea id="sadrzaj" name="sadrzaj" cols="40" rows="5" class="unos" onkeyup="validirajUnos()"></textarea>
					<br> <br>
					Novost o igraču: 
					<select id="comboGolmani" class="comboBox" name="golman">
						<?php
							try {
								$veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
								$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								
								$sql = 'SELECT ime FROM golmani';
								foreach ($veza->query($sql) as $row) {
						?>
									<option value="<?php echo $row['ime']; ?>"> <?php echo $row['ime']; ?> </option>
						<?php
								}
								
								$veza = null;
						?>
						<?php
							}
							catch(PDOException $e){
								echo $e->getMessage();
							}
						?>
					</select>
					
					<div class="red">
						<input id="nazadBtn" type="submit" value="Nazad" name="nazad" class="nazadBtn">
						<input id="unosBtn" type="submit" value="Unesi novost" name="unesiNovost" class="akcijaBtn"> <br><br>
						<div id="greska"><?php echo $_msg ?> </div>
						<div id="uspjesno"><?php echo $_msg2 ?> </div>
					</div>
					
				</fieldset>
			</form>
		</div>
	</body>
</html>