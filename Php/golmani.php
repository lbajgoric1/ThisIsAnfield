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
		$id = 0;
		$_msg = "";
		$_msg2 = "";
		$imeGolmana = "";

		function validirajXSS($_unos) 
		{
			$_unos = trim($_unos);
			$_unos = stripslashes($_unos);
			$_unos = htmlspecialchars($_unos, ENT_QUOTES );
			return $_unos;
		}
		
		if (isset($_POST["dugmeSubmit"])){
			if (empty($_POST["imeIPrezime"])){
				$_msg="Unesite ime i prezime";
			}
			else if (empty($_POST["telefon"])){
				$_msg="Unesite telefon";
			}
			else if (empty($_POST["email"])){
				$_msg="Unesite email adresu";
			}
			else if (empty($_POST["sadrzaj"])){
				$_msg="Unesite sadrzaj poruke";
			}
			else {
				validirajXSS($_POST["imeIPrezime"]);
				validirajXSS($_POST["telefon"]);
				validirajXSS($_POST["email"]);
				validirajXSS($_POST["sadrzaj"]);
				
				if (isset($_POST['golmanCombo'])){
					
					// $_XML = new SimpleXMLElement("../Xml/golmani.xml", null, true);
					// foreach($_XML->golman as $_g) {
						// if (trim($_g->ime)==trim($_POST['golmanCombo'])){
							// $id = $_g->id;
						// }
					// }
					
					// $_XML = new SimpleXMLElement("../Xml/poruke.xml", null, true);
					// $_data = $_XML->addChild('poruka');
					// $_data->addChild('imeiprezime', $_POST["imeIPrezime"]);
					// $_data->addChild('telefon', $_POST["telefon"]);
					// $_data->addChild('email', $_POST["email"]);
					// $_data->addChild('sadrzaj', $_POST["sadrzaj"]);
					// $_data->addChild('golman', $id);
					// $_XML->asXML('../Xml/poruke.xml');
					// $_msg2="Uspješno ste poslali poruku.";
					$_idGolmana = 0;
					try {
						// $veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
						$veza = new PDO("mysql:dbname=thisisanfield;host=mysql-55-centos7", "admin", "admin");
						$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$veza->exec("set names utf8");
						
						$data = $veza->query("select id, ime from golmani");
						
						if (!$data) {
							$greska = $veza->errorInfo();
							print "SQL greška: " . $greska[2];
							exit();
						}
						foreach ($data as $golman){
							if (trim($golman['ime'])==trim($_POST['golmanCombo'])){
								$_idGolmana = $golman['id'];
							}
						}
						
						$data = $veza->prepare("select * from poruke where imeiprezime= '". $_POST['imeIPrezime'] ."' and telefon = '". $_POST['telefon'] ."' and email = '". $_POST['email'] ."' and sadrzaj = '". $_POST['sadrzaj'] ."' and golman = '". $_idGolmana ."'");
						$data->execute();
					
						if ($row = $data->fetch()){
							$_msg = "Takva poruka vec postoje u bazi" . "<br>";
						}
						else {
							$unos = $veza->prepare("INSERT INTO poruke (imeiprezime, telefon, email, sadrzaj, golman) VALUES(?, ?, ?, ?, ?)");
							$unos->execute(array($_POST['imeIPrezime'], $_POST['telefon'], $_POST['email'], $_POST['sadrzaj'], $_idGolmana));	
							$_msg2 = "Uspjesno ste upisali poruku u bazu." . "<br>";
						}
						
						$veza = null;
					}
				
					catch(PDOException $e){
						echo $e->getMessage();
					}
				}
				
			}
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
			<div class="red">
				<form id="formaPoruka" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="posaljiPoruku">
					<div class="kolona dva">
						<div class="tekst">
							<fieldset>
								<legend> Golmani: </legend>
								<select id="comboGolmani" class="comboBox" onchange="golmani()" name="golmanCombo">
									<?php
										try {
											// $veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
											$veza = new PDO("mysql:dbname=thisisanfield;host=mysql-55-centos7", "admin", "admin");
											$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											
											$sql = 'SELECT ime FROM golmani';
											foreach ($veza->query($sql) as $row) {
									?>
												<option value="<?php echo $row['ime']; ?>"> <?php echo $row['ime']; ?> </option>
									<?php
											}
											
											// $veza = null;
									?>
									<?php
										}
										catch(PDOException $e){
											echo $e->getMessage();
										}
									?>
								</select>
							</fieldset>
						</div>
						<img id="slikaGolman" alt="golman" class="slika igrac" src="<?php 
																					$data = $veza->query("select tekst, slika from golmani where ime = '". 'Loris Karius' ."'");
																					foreach ($data as $golman){
																						echo $golman['slika'];
																					
																				?>"> 
						<div id="tekstGolman" class="oIgracu">
																					<?php 
																							echo $golman['tekst']; 
																						}
																						$veza = null;
																					?>
						</div>
					</div>
					
					<div class="kolona dva">
						<fieldset>
							<legend> Pošalji poruku golmanu: </legend>
							Ime i prezime:
							<input id="imeIPrezime" type="text" name="imeIPrezime" class="unos" required onkeyup="validirajUnos()">
							<br> <br>
							Telefon: 
							<input id="telefon" type="text" name="telefon" class="unos" required onkeyup="validirajUnos()"> 
							<br> <br>
							Email adresa: 
							<input id="email" type="text" name="email" class="unos" required onkeyup="validirajUnos()">
							<br> <br>
							Sadržaj poruke:
							<textarea id="poruka" name="sadrzaj" cols="40" rows="5" class="unos" required onkeyup="validirajUnos()"></textarea>
							<br> <br>
							<input type="reset" value="Reset" class="ponisti">
							<input id="posalji" name="dugmeSubmit" type="submit" value="Submit" class="potvrdi"> <br>
							<div id="greska"><?php echo $_msg; ?></div>
							<div id="uspjesno"><?php echo $_msg2 ?> </div>
						</fieldset>
					</div>
				</form>
				
			</div>	
		</div>
	</body>
</html>