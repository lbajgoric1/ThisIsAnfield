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
					
					<form action ="action_page.php">
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
			
			<div class="kolona dva">
				<div class="tekst">
					<form action ="action_page.php">
						<fieldset>
							<legend> Obrambeni: </legend>
							<select id="comboObrambeni" class="comboBox" onchange="obrambeni()">
								<option value="DejanLovren">Dejan Lovren</option>
								<option value="NathanielClyne">Nathaniel Clyne</option>
								<option value="MamadouSakho">Mamadou Sakho</option>
								<option value="JoeGomez">Joe Gomez</option>
								<option value="RagnarKlavan">Ragnar Klavan</option>
								<option value="AlbertoMoreno">Alberto Moreno</option>
								<option value="TiagoIlori">Tiago Ilori</option>
								<option value="JoëlMatip">Joël Matip</option>
								<option value="AndreWisdom">Andre Wisdom</option>
								<option value="ConnorRandall">Connor Randall</option>
								<option value="BradSmith">Brad Smith</option>
							</select>
						</fieldset>
					</form>
				</div>
				<img id="slikaObrambeni" alt="obrambeni" class="slika  igrac" src="../Slike/dejan.jpg"> 
				<div id="tekstObrambeni" class="oIgracu">
					Dejan Lovren (Zenica, 5. srpnja 1989.), hrvatski 
					je nogometaš koji trenutačno nastupa za engleski Liverpool. 
					Igra na mjestu braniča. Lovren je također član hrvatske 
					nogometne reprezentacije.
				</div>
			</div>
			
			
			
		</div>
	
		<div class="red">
			
			<div class="kolona dva">
				<div class="tekst">
					<form action ="action_page.php">
						<fieldset>
							<legend> Vezni igrači: </legend>
							<select id="comboVezni" class="comboBox" onchange="vezni()">
								<option value="JordanHenderson">Jordan Henderson</option>
								<option value="GeorginioWijnaldum">Georginio Wijnaldum</option>
								<option value="JamesMilner">James Milner</option>
								<option value="PhilippeCoutinho">Philippe Coutinho</option>
								<option value="MarkoGrujić">Marko Grujić</option>
								<option value="AdamLallana">Adam Lallana</option>
								<option value="LucasLeiva">Lucas Leiva</option>
								<option value="EmreCan">Emre Can</option>
								<option value="CameronBrannagan">Cameron Brannagan</option>
								<option value="KevinStewart">Kevin Stewart</option>
								<option value="LazarMarković">Lazar Marković</option>
								<option value="SheyiOjo">Sheyi Ojo</option>
								<option value="PedroChirivella">Pedro Chirivella</option>
								<option value="LuisAlberto">Luis Alberto</option>
							</select>
						</fieldset>
					</form>
				</div>
				<img id="slikaVezni" alt="vezniIgrac" class="slika igrac" src="../Slike/jordan.jpg"> 
				<div id="tekstVezni" class="oIgracu">
					Jordan Brian Henderson (Sunderland, 17. lipnja 1990.) je 
					engleski nogometaš. Engleski nogometni izbornik objavio 
					je u svibnju 2016. popis za nastup na Europsko prvenstvo 
					u Francuskoj, na kojem se nalazi Henderson.
				</div>
			</div>
			
			<div class="kolona dva">
				<div class="tekst">
					
					<form action ="action_page.php">
						<fieldset>
							<legend> Napadači: </legend>
							<select id="comboNapadaci" class="comboBox" onchange="napadaci()">
								<option value="DanielSturridge">Daniel Sturridge</option>
								<option value="ChristianBenteke">Christian Benteke</option>
								<option value="RobertoFirmino">Roberto Firmino</option>
								<option value="SadioMané">Sadio Mané</option>
								<option value="DivockOrigi">Divock Origi</option>
								<option value="DannyIngs">Danny Ings</option>
								<option value="MarioBalotelli">Mario Balotelli</option>
								<option value="TaiwoAwoniyi">Taiwo Awoniyi</option>
							</select>
						</fieldset>
					</form>
				</div>
				<img id="slikaNapadac" alt="napadac" class="slika  igrac" src="../Slike/daniel.jpg"> 
				<div id="tekstNapadac" class="oIgracu">
					Daniel Andre Sturridge (Birmingham, 1. rujna 1989.) je 
					engleski nogometaš i reprezentativac koji trenutno igra 
					za Liverpool. 2013. godine odlazi u Liverpool, gdje postaje 
					jedan od ključnih 
					igrača. Sturridge je igrao za Englesku na svim nivoima. 
					Debi za seniorsku reprezentaciju imao je 15. studenog 2011.
					godine protiv Švedske.
				</div>
			</div>
		</div>
	</body>

</html>