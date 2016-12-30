<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> This is Anfield </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="../Css/meni.css">
		<link rel="stylesheet" type="text/css" href="../Css/sadrzaj.css">
		
		<SCRIPT src="../Javascript/takmicenja.js"></SCRIPT>
	</head>
	


	<body>
		<div class="red">
			<div class="kolona dva">
				<div class="red poravnat takmicenje">
					
					<form action="action_page.php"  id="radioDugmad">
					<fieldset>
						<legend> Liverpool u takmičenjima: </legend>
						<input type="radio" name="tip" value="premiership" checked onclick="prikazi('premiership')"> Premiership <br>
						<input type="radio" name="tip" value="ligaSampiona" onclick="prikazi('ligaSampiona')"> Liga šampiona<br>
						<input type="radio" name="tip" value="ligaEvrope" onclick="prikazi('ligaEvrope')"> Liga Evrope <br>
						<input type="radio" name="tip" value="ostalaTakmicenja" onclick="prikazi('ostala')"> Ostala takmičenja
					</fieldset>
					</form>
				</div>
				
				<div id="info" class="red poravnat takmicenje">
					<?php
						$_XML = simplexml_load_file("../Xml/takmicenja.xml");
						echo $_XML->premiership->tekst;
					?>
					<!-- Prvak: 1901., 1906., 1922., 1923., 1947., 1964., 1966., 1973., 1976., 1977., 1979., 1980., 1982., 1983., 1984., 1986., 1988., 1990. -->
				</div>
			</div>
			<div class="kolona dva">
				<img  id="slika1" alt="takmicenje" class="slika" src="<?php echo $_XML->premiership->slike->slika1; ?>">
			</div>
		</div>
		
		<div class="red">
			<div class="kolona dva">
				<img id="slika2" alt="takmicenje" class="slika" src="<?php echo $_XML->premiership->slike->slika2; ?>">
			</div>
			<div class="kolona dva">
				<img id="slika3" alt="takmicenje" class="slika" src="<?php echo $_XML->premiership->slike->slika3; ?>">
			</div>
		</div>
	</body>
</html>