<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> This is Anfield </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" type="text/css" href="../Css/meni.css">
		<link rel="stylesheet" type="text/css" href="../Css/sadrzaj.css">
		
	</head>
	


	<body>
		<div class="red">
			<div class="kolona jedan centriran">
				<img alt="grb" class="slika" src="<?php
					$_XML = simplexml_load_file("../Xml/oKlubu.xml");
					echo $_XML->slika;
				?>"> 
			</div>
			
			<div class="kolona dva poravnat takmicenje">
				<?php echo $_XML->tekst;?>
			</div>
				
				
			<div class="kolona jedan oklubu">
				<table class="tabela">
					<tr>
						<th colspan="2" class="info"> Osnovne informacije </th>
					</tr>
					<tr>
						<th> Puno ime: </th>
						<td> <?php echo $_XML->podaci->ime; ?> </td> 
						
					</tr>	
					<tr>
						<th> Nadimak: </th>
						<td> <?php echo $_XML->podaci->nadimak; ?> </td> 
						
					</tr>
					<tr>
						<th> Osnovan: </th>
						<td> <?php echo $_XML->podaci->datumOsnivanja; ?> </td> 
						
					</tr>	
					<tr>	
						<th> Igralište: </th>
						<td> <?php echo $_XML->podaci->igraliste; ?> </td>
						
					</tr>	
					<tr>
						<th> Kapacitet: </th>
						<td> <?php echo $_XML->podaci->kapacitet; ?> </td> 
						
					</tr>	
					<tr>
						<th> Trener: </th>
						<td> <?php echo $_XML->podaci->trener; ?> </td>
					</tr>	
				</table>
			</div>
		</div>
	</body>
</html>