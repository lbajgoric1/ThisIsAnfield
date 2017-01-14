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
		<?php 
			session_start();
			function validiraj($_unos) 
			{
				$_unos = trim($_unos);
				$_unos = stripslashes($_unos);
				$_unos = htmlspecialchars($_unos, ENT_QUOTES );
				return $_unos;
			}
			$_msg = '';
			$_OK = false;
	  
	        if (isset($_POST['prijava']) && empty($_POST['username']) && empty($_POST['password']))
			{
				$_msg = 'Popunite sva polja';
			}

			if (isset($_POST['prijava']) && !empty($_POST['username']) && !empty($_POST['password'])) 
			{
				validiraj($_POST['username']);
				validiraj($_POST['password']);
				
				try {
					$veza = new PDO("mysql:dbname=thisisanfield;host=localhost;charset=utf8", "admin", "admin");
					$veza->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					$data = $veza->query("select username, password from admin");
					
					if (!$data) {
						$greska = $veza->errorInfo();
						print "SQL greška: " . $greska[2];
						exit();
					}
					foreach ($data as $admin){
						if($_POST['username'] == $admin['username'] && $_POST['password'] == $admin['password']){
							$_SESSION['loginForma'] = true;
							$_OK = true;
						}
					
						if(!$_OK){	
							$_msg = 'Pogrešan username ili password';
							$_SESSION['loginForma'] = false;
						}
					}
				}
				catch(PDOException $e){
					echo $e->getMessage();
				}
				
				$veza = null;
			}

			if($_OK)
			{
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $_POST['username'];
				if ($_SESSION['username']=='admin') {
					header("Location: admin.php");
				}
				
			}
			
			if(isset($_POST['nazad'])){
				header ("Location: pocetna.php");
			}
		?>
		
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
			<form id="loginForma" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="loginForma" method="post">
				<fieldset>
					<legend> Login: </legend>
					Username
					<input id="username" type="text" name="username" placeholder="Username" class="loginInput" onkeyup="validirajLogin()">
					<br> <br>
					Password
					<input id="password" type="password" name="password" placeholder="Password" class="loginInput" onkeyup="validirajLogin()"> 
					<br> <br>
					<input id="nazadBtn" type="submit" value="Nazad" name="nazad" class="nazadBtn">
					<input id="prijava" type="submit" value="Prijava" name="prijava"> <br><br>
					<div id="greska"> <?php echo $_msg ?></div>
				</fieldset>
			</form>
		</div>
	</body>

</html>