<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> This is Anfield </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="../Css/meni.css">
		<link rel="stylesheet" type="text/css" href="../Css/sadrzaj.css">
		
		<SCRIPT src="../Javascript/momcad.js"></SCRIPT>
	</head>
	


	<body>
		<div class="red">
			<div class="kolona dva">
				<div class="tekst">
					<form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<fieldset>
							<legend> Golmani: </legend>
							<select id="comboGolmani" class="comboBox" onchange="golmani()">
								<?php 
									$_XML = simplexml_load_file("../Xml/momcad.xml");
									$_brojac = 1;
									foreach($_XML->golmani->golman as $_g){
								?>
									<option value="<?php echo $_g->ime; ?>"> <?php echo $_g->ime; ?> </option>
								<?php
									}
								?>
								
							</select>
						</fieldset>
					</form>
				</div>
				<img id="slikaGolman" alt="golman" class="slika igrac" src="<?php echo $_XML->golmani[0]->golman->slika; ?>"> 
				<div id="tekstGolman" class="oIgracu">
					<?php echo $_XML->golmani[0]->golman->tekst; ?>
				</div>
			</div>
			
			
		</div>
	</body>

</html>