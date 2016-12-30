<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> This is Anfield </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="../Css/meni.css">
		<link rel="stylesheet" type="text/css" href="../Css/sadrzaj.css">
	</head>
	
	<?php
		if (isset($_POST['skiniPdf'])){
			header("Location: downloadPDF.php");
		}
	
	?>
	
	<body>
		<div class="red naslovNovosti pocetna">
			<div class="kolona cetri pocetna">
				Novosti
			</div>
		</div>
	
		<?php 
            $_XML = simplexml_load_file("../Xml/novosti.xml");
			$brojac = 2;
			foreach($_XML->novost as $n)
			{
		?>
			<div class="kolona cetri">
				<div class="red naslovNovosti">
					<?php echo $n->naslov; ?>
				</div>
						
				<div class="red poravnat">
					<?php echo $n->sadrzaj;?>
				</div>
			</div>
		<?php 
			}
		?>
		
		<div class="red">
			<form action="pocetna.php" method="post">
				<input type="submit" name="skiniPdf" value="Preuzmi novosti u obliku pdf fajla">
			</form>
		</div>
		
		<div class="red">
			Pretrazi novosti:
			<input id="pretraga" type="text" name="pretraga" onkeyup="showResult(this.value)">
			<input type="submit" name="pretrazi" value="Pretrazi" onclick="prikaziRezultate()">
			<div id="livesearch"></div>
		</div>
	</body>

</html>