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
		$_idNovosti = 0;
		
		if (isset($_POST['prikaziNovost'])){
			$_naslov = $_POST['novosti'];
			
			try {
				// $veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
				$veza = new PDO("mysql:dbname=thisisanfield;host=mysql-55-centos7", "admin", "admin");
				$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$data = $veza->query("select id, naslov, sadrzaj from novosti where naslov = '". $_naslov ."'");
				if (!$data) {
					$greska = $veza->errorInfo();
					print "SQL greška: " . $greska[2];
					exit();
				}
				foreach ($data as $novost){
					$_sadrzaj = $novost['sadrzaj'];
					$_idNovosti = $novost['id'];
				}
			}
			catch(PDOException $e){
				echo $sql . "<br>" . $e->getMessage();
			}
			
			$veza = null;
		}
		
		if (isset($_POST['spasiNovost'])){
			if (empty($_POST['noviNaslov'])!=0 || empty($_POST['noviSadrzaj'])!=0){
				$_msg2 = "Prvo odaberite novost!";
			}
			else {
				validirajXSS($_POST['stariNaslov']);
				validirajXSS($_POST['noviNaslov']);
				validirajXSS($_POST['noviSadrzaj']);
				
				$_idStariNaslov = $_POST['stariNaslov']; 
				$_noviNaslov = $_POST['noviNaslov'];
				$_noviSadrzaj = $_POST['noviSadrzaj'];
				
				try {
					// $veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
					$veza = new PDO("mysql:dbname=thisisanfield;host=mysql-55-centos7", "admin", "admin");
					$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "UPDATE novosti SET naslov='". $_noviNaslov ."', sadrzaj='". $_noviSadrzaj ."' WHERE id='". $_idStariNaslov ."'";
					$stmt = $veza->prepare($sql);
					$stmt->execute();

					$_msg = "Azurirali ste novost.";
				}
				catch(PDOException $e){
					echo $sql . "<br>" . $e->getMessage();
				}
				
				$veza = null;
				
				
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
			<form id="izmjenaNovosti" action="izmjenaNovosti.php" method="post">
				<fieldset>
					<legend> Izmjeni novost: </legend>
					<div class="red">
						Naslov novosti 
						<select id="comboNovosti" class="comboBox" name="novosti">
						<?php
							try {
								// $veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
								$veza = new PDO("mysql:dbname=thisisanfield;host=mysql-55-centos7", "admin", "admin");
								$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								
								$sql = 'SELECT naslov FROM novosti';
								foreach ($veza->query($sql) as $row) {
						?>
									<option value="<?php echo $row['naslov']; ?>"> <?php echo $row['naslov']; ?> </option>
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
									<?php echo $_idNovosti; ?>
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