<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> This is Anfield </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="../Css/meni.css">
		<link rel="stylesheet" type="text/css" href="../Css/sadrzaj.css">
		
		<SCRIPT src="../Javascript/login.js"></SCRIPT>
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
				
				$_XML = simplexml_load_file("../Xml/admin.xml");
				if($_POST['username'] == $_XML->username && $_POST['password'] == $_XML->password)
				{
					$_SESSION['loginForma'] = true;
					$_OK = true;
				}
			
				if(!$_OK)
				{	
					$_msg = 'Pogrešan username ili password';
					$_SESSION['loginForma'] = false;
				}
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
				header ("Location: index.php");
			}
		?>
		
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
	</body>

</html>