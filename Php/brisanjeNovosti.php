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
		$_idNovosti = 0;
		if (isset($_POST['obrisiNovost'])){
			$_odabranaNovost = trim($_POST['novosti']);
			
			try {
				// $veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
				$veza = new PDO("mysql:dbname=thisisanfield;host=mysql-57-centos7", "admin", "admin"));
				$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$data = $veza->query("select id, naslov from novosti");
						
				if (!$data) {
					$greska = $veza->errorInfo();
					print "SQL greška: " . $greska[2];
					exit();
				}
				foreach ($data as $novost){
					if (trim($novost['naslov'])==$_odabranaNovost){
						$sql = "DELETE FROM novosti WHERE id='". $novost['id'] ."'";
						$veza->exec($sql);
						
						$_msg2 = "Novost uspjesno obrisana";		
					}
				}
			}
			catch(PDOException $e){
				echo $sql . "<br>" . $e->getMessage();
			}
			
			$veza = null;
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
			<form id="unosNovosti" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<fieldset>
					<legend> Obrisi novost: </legend>
					Naslov novosti 
					<select id="comboNovosti" class="comboBox" name="novosti">
						<?php
							try {
								// $veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
								$veza = new PDO("mysql:dbname=thisisanfield;host=mysql-57-centos7", "admin", "admin"));
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