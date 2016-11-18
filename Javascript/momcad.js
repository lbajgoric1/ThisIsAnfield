function golmani(){
	var comboboxGolmani = document.getElementById("comboGolmani");
	var odabraniGolman = comboboxGolmani.options[comboboxGolmani.selectedIndex].value;
	
	if (odabraniGolman==="LorisKarius"){
		document.getElementById("slikaGolman").src="../Slike/loris.jpg"; 
		document.getElementById("tekstGolman").innerHTML = "Loris Karijus (rođen 22 juna 1993.) je njemački nogometaš, \
						koji trenutno igra za Liverpool. Debitovao je za \
						FC Mainz 05 1. decembra 2012. protiv Hanovera. \
						U 2015-2016 sezone izabran je za trećeg najboljeg golmana u Bundesligi. \
						Za Liverpool je potpisao u maju 2016. godine.";
	}
	
	else if (odabraniGolman==="AlexManninger"){
		document.getElementById("slikaGolman").src="../Slike/AlexManninger.jpg"; 
		document.getElementById("tekstGolman").innerHTML ="Alexander Manninger (Salzburg, 4. lipnja 1977.), \
						austrijski nogometaš. Manninger igra za Liverpool. Za austrijsku reprezentaciju je igrao \
						deset godina i sakupio preko 30 utakmica.";
	}
	
	else {
		document.getElementById("slikaGolman").src="../Slike/SimonMignolet.jpg";
		document.getElementById("tekstGolman").innerHTML ="Simon Luc Hildebert Mignolet born 6 March 1988) \
						is a Belgian professional footballer who plays as a goalkeeper for Premier League \
						club Liverpool and the Belgium national team.";
	}
}

function obrambeni(){
	var comboObrambeni = document.getElementById("comboObrambeni");
	var odabraniObrambeni = comboObrambeni.options[comboObrambeni.selectedIndex].value;
	
	if (odabraniObrambeni==="DejanLovren"){
		document.getElementById("slikaObrambeni").src="../Slike/dejan.jpg";
		document.getElementById("tekstObrambeni").innerHTML ="Dejan Lovren (Zenica, 5. srpnja 1989.), hrvatski \
						je nogometaš koji trenutačno nastupa za engleski Liverpool. \
						Igra na mjestu braniča. Lovren je također član hrvatske \
						nogometne reprezentacije.";
	}
	
	else if (odabraniObrambeni==="NathanielClyne"){
		document.getElementById("slikaObrambeni").src="../Slike/NathanielClyne.jpg";
		document.getElementById("tekstObrambeni").innerHTML ="Nathaniel Edwin Clyne (born 5 April 1991) is \
						an English professional footballer who plays as a right-back for Premier League club \
						Liverpool and the England national team. \
						He began his career at Crystal Palace, playing regularly in four Championship seasons, \
						before a move to Southampton in 2012, where he spent three seasons in the Premier League. \
						He joined Liverpool in July 2015 for a fee of £12.5 million.";
	}
	
	if (odabraniObrambeni==="MamadouSakho"){
		document.getElementById("slikaObrambeni").src="../Slike/MamadouSakho.jpg";
		document.getElementById("tekstObrambeni").innerHTML ="Mamadou Sakho (born 13 February 1990) is a \
						French professional footballer who plays as a centre-back for Premier League club \
						Liverpool and the France national team. He is known for his tackling ability and his \
						passing accuracy. Sakho is also known for the eccentric hairstyles he often displays \
						while playing and his physical prowess, thus resulting in him acquiring the nickname The Beast.";
	}
	
	if (odabraniObrambeni==="JoeGomez"){
		document.getElementById("slikaObrambeni").src="../Slike/JoeGomez.jpg";
		document.getElementById("tekstObrambeni").innerHTML ="Joseph Dave 'Joe' Gomez (born 23 May 1997) is \
						an English professional footballer who plays for Premier League club Liverpool. \
						Gomez prefers to play as a centre-back but can also play as a full-back on either side. \
						He began his career at Charlton Athletic, breaking into the first team at 17 and playing \
						one full senior season before joining Liverpool in June 2015. Gomez has represented England \
						up to under-21 level and played every minute of every game when England won the 2014 UEFA \
						European U-17 Championship.";
	}
	
	if (odabraniObrambeni==="RagnarKlavan"){
		document.getElementById("slikaObrambeni").src="../Slike/RagnarKlavan.jpg";
		document.getElementById("tekstObrambeni").innerHTML ="Ragnar Klavan (born 30 October 1985) is an Estonian \
						professional footballer who plays as a defender for Premier League club Liverpool and the \
						Estonia national team. A left-footed centre-back, he has also played as a left-back during his career.\
						He played for Elva, Tulevik and Flora in Estonia, winning the Meistriliiga with Flora in \
						the 2003 season, before moving to the Netherlands where he represented Heracles Almelo and AZ, \
						winning the Eredivisie with the latter in the 2008–09 season. In 2012, he transferred to FC \
						Augsburg and spent four seasons in the Bundesliga before his move to Liverpool in July 2016.";
	}
	
	if (odabraniObrambeni==="AlbertoMoreno"){
		document.getElementById("slikaObrambeni").src="../Slike/AlbertoMoreno.jpg";
		document.getElementById("tekstObrambeni").innerHTML ="Alberto Moreno Pérez born 5 July 1992) is a Spanish \
						professional footballer who plays as a left back for Premier League club Liverpool and the \
						Spain national team. He began his career at Sevilla, playing 62 official games and winning \
						the UEFA Europa League in 2014, before moving to Liverpool for a fee of £12 million. \
						Moreno was part of the Spain under-21 team that won the 2013 UEFA European Championship \
						and made his senior debut the same year.";
	}
	
	if (odabraniObrambeni==="TiagoIlori"){
		document.getElementById("slikaObrambeni").src="../Slike/AlbertoMoreno.jpg";
		document.getElementById("tekstObrambeni").innerHTML ="Tiago Abiola Delfim Almeida Ilori (born 26 February 1993) \
						is a Portuguese professional footballer who plays as a centre-back for Premier League club Liverpool.\
						He started his career with Sporting, making his debut with the first team in 2011 before signing \
						with Liverpool two years later. Ilori gained 36 caps for Portugal at youth level, including ten \
						with the under-21 team.";
	}
	
	if (odabraniObrambeni==="JoëlMatip"){
		document.getElementById("slikaObrambeni").src="../Slike/JoëlMatip.jpg";
		document.getElementById("tekstObrambeni").innerHTML ="Joël Andre Job Matip (born 8 August 1991) is a \
						Cameroonian professional footballer who plays as a centre-back for Premier League club Liverpool \
						and the Cameroon national team.";
	}
	
	if (odabraniObrambeni==="AndreWisdom"){
		document.getElementById("slikaObrambeni").src="../Slike/AndreWisdom.jpg";
		document.getElementById("tekstObrambeni").innerHTML ="Andre Alexander Shaquille Wisdom (born 9 May 1993) is \
						an English footballer who plays as a defender for Austrian club Red Bull Salzburg on loan \
						from Liverpool. Wisdom began his career at Bradford City before signing for Liverpool in 2008. \
						He has also played for and captained the England youth teams at various levels, winning the UEFA European U-17 Championship in 2010.";
	}
	
	if (odabraniObrambeni==="ConnorRandall"){
		document.getElementById("slikaObrambeni").src="../Slike/ConnorRandall.jpg";
		document.getElementById("tekstObrambeni").innerHTML ="Connor Steven Randall (born 21 October 1995) is an \
						English professional footballer who plays as a defender for Premier League club Liverpool.";
	}
	
	if (odabraniObrambeni==="BradSmith"){
		document.getElementById("slikaObrambeni").src="../Slike/BradSmith.jpg";
		document.getElementById("tekstObrambeni").innerHTML ="Bradley Shaun Smith (born 9 April 1994) is an Australian \
						professional footballer who plays as a left back or left winger for Premier League club Bournemouth.\
						Born in Sydney, Smith moved to England to play youth football for Liverpool as a teenager, \
						eventually making his professional debut for the side in 2013. He has also spent time on loan \
						at Swindon Town in 2014.";
	}	
}

function vezni() {
	var comboboxVezni = document.getElementById("comboVezni");
	var odabraniVezni = comboboxVezni.options[comboboxVezni.selectedIndex].value;
	
	if(odabraniVezni==="JordanHenderson"){
		document.getElementById("slikaVezni").src="../Slike/jordan.jpg";
		document.getElementById("tekstVezni").innerHTML ="Jordan Brian Henderson (Sunderland, 17. lipnja 1990.) je \
						engleski nogometaš. Engleski nogometni izbornik objavio \
						je u svibnju 2016. popis za nastup na Europsko prvenstvo \
						u Francuskoj, na kojem se nalazi Henderson.";
	}
	
	if(odabraniVezni==="GeorginioWijnaldum"){
		document.getElementById("slikaVezni").src="../Slike/GeorginioWijnaldum.png";
		document.getElementById("tekstVezni").innerHTML ="Georginio Gregion Emile 'Gini' Wijnaldum \
						, born 11 November 1990, is a Dutch footballer who plays as a midfielder for Premier \
						League club Liverpool and the Netherlands national team. A youth product of Feyenoord, \
						he made his professional debut in 2007 as the youngest player ever to represent the club, \
						and played 134 matches for them in a five-year period. He also played four seasons at PSV Eindhoven,\
						winning the KNVB Cup in the first and the Eredivisie in the last.";
	}
	
	if(odabraniVezni==="JamesMilner"){
		document.getElementById("slikaVezni").src="../Slike/JamesMilner.jpg";
		document.getElementById("tekstVezni").innerHTML ="James Philip Milner (born 4 January 1986) is an English \
						professional footballer who plays for Premier League club Liverpool. A versatile player, \
						he has been utilised in many different positions such as in midfield, on the wing and most \
						recently at left-back.";
	}
	
	if(odabraniVezni==="PhilippeCoutinho"){
		document.getElementById("slikaVezni").src="../Slike/PhilippeCoutinho.jpg";
		document.getElementById("tekstVezni").innerHTML ="Philippe Coutinho Correia (Brazilian Portuguese: \
						, born 12 June 1992, is a Brazilian professional footballer who plays for Premier League \
						club Liverpool and the Brazil national team as an attacking midfielder or winger.";
	}
	
	if(odabraniVezni==="MarkoGrujić"){
		document.getElementById("slikaVezni").src="../Slike/MarkoGrujić.jpg";
		document.getElementById("tekstVezni").innerHTML ="Marko Grujić, born 13 April 1996, is a Serbian \
						professional footballer who plays as a midfielder for Premier League club \
						Liverpool and the Serbia national team. Grujić started his career with Red Star Belgrade, \
						progressing through their youth system to the first team squad. \
						He made his professional debut in 2013, and won the SuperLiga title in his final season \
						with Red Star before completing a £5.1 million move to Liverpool.";
	}
	
	if(odabraniVezni==="AdamLallana"){
		document.getElementById("slikaVezni").src="../Slike/AdamLallana.jpg";
		document.getElementById("tekstVezni").innerHTML ="Adam David Lallana (born 10 May 1988) is an English professional\
						footballer who plays as an attacking midfielder for Premier League club Liverpool and the England \
						national team.";
	}
	
	if(odabraniVezni==="LucasLeiva"){
		document.getElementById("slikaVezni").src="../Slike/LucasLeiva.jpg";
		document.getElementById("tekstVezni").innerHTML ="Lucas Pezzini Leiva (born 9 January 1987), known as Lucas, \
						is a Brazilian professional footballer who plays as a defensive midfielder for English club \
						Liverpool.";
	}
	
	if(odabraniVezni==="EmreCan"){
		document.getElementById("slikaVezni").src="../Slike/EmreCan.jpg";
		document.getElementById("tekstVezni").innerHTML ="Emre Can, born 12 January 1994, is a German professional \
						footballer who plays as a central midfielder for Premier League club Liverpool and the Germany \
						national team. A versatile player, Can can also play as a defensive midfielder, centre back or \
						full back.";
	}
	
	if(odabraniVezni==="CameronBrannagan"){
		document.getElementById("slikaVezni").src="../Slike/CameronBrannagan.jpg";
		document.getElementById("tekstVezni").innerHTML ="Cameron Mark Thomas Brannagan (born 9 May 1996) is an English \
						footballer who plays as an attacking midfielder for Premier League club Liverpool.";
	}
	
	if(odabraniVezni==="KevinStewart"){
		document.getElementById("slikaVezni").src="../Slike/KevinStewart.jpg";
		document.getElementById("tekstVezni").innerHTML ="Kevin Linford Stewart (born 7 September 1993) is an English \
						professional footballer who plays as a midfielder for Premier League club Liverpool.";
	}
	
	if(odabraniVezni==="LazarMarković"){
		document.getElementById("slikaVezni").src="../Slike/LazarMarković.jpg";
		document.getElementById("tekstVezni").innerHTML ="Lazar Marković, born 2 March 1994, is a Serbian professional \
						footballer who plays as a winger for Sporting CP on loan from Premier League club Liverpool \
						and the Serbia national team.";
	}
	
	if(odabraniVezni==="SheyiOjo"){
		document.getElementById("slikaVezni").src="../Slike/SheyiOjo.jpg";
		document.getElementById("tekstVezni").innerHTML ="Oluwaseyi Babajide 'Sheyi' Ojo (born 19 June 1997) is a \
						world class footballer who plays for Premier League club Liverpool as a winger.";
	}
	
	if(odabraniVezni==="PedroChirivella"){
		document.getElementById("slikaVezni").src="../Slike/PedroChirivella.jpg";
		document.getElementById("tekstVezni").innerHTML ="Pedro Chirivella Burgos (born 23 May 1997) is a Spanish \
						footballer who plays for Premier League club Liverpool as a midfielder.";
	}
	
	if(odabraniVezni==="LuisAlberto"){
		document.getElementById("slikaVezni").src="../Slike/LuisAlberto.jpg";
		document.getElementById("tekstVezni").innerHTML ="Luis Alberto Romero Alconchel (born 28 September 1992), \
						known as Luis Alberto, is a Spanish professional footballer who plays as an attacking midfielder \
						or a winger for Italian club S.S. Lazio.";
	}
}

function napadaci() {
	var comboboxNapadac = document.getElementById("comboNapadaci");
	var odabraniNapadac = comboboxNapadac.options[comboboxNapadac.selectedIndex].value;
	
	if(odabraniNapadac==="DanielSturridge"){
		document.getElementById("slikaNapadac").src="../Slike/daniel.jpg";
		document.getElementById("tekstNapadac").innerHTML ="Daniel Andre Sturridge (Birmingham, 1. rujna 1989.) je \
						engleski nogometaš i reprezentativac koji trenutno igra \
						za Liverpool. 2013. godine odlazi u Liverpool, gdje postaje \
						jedan od ključnih igrača. Sturridge je igrao za Englesku na svim nivoima. \
						Debi za seniorsku reprezentaciju imao je 15. studenog 2011. \
						godine protiv Švedske."; 
	}
	
	if(odabraniNapadac==="ChristianBenteke"){
		document.getElementById("slikaNapadac").src="../Slike/ChristianBenteke.jpg";
		document.getElementById("tekstNapadac").innerHTML ="Christian Benteke Liolo (born 3 December 1990) \
						is a professional footballer who plays as a striker for English club Crystal Palace \
						and the Belgium national team.";
	}
	
	if(odabraniNapadac==="RobertoFirmino"){
		document.getElementById("slikaNapadac").src="../Slike/RobertoFirmino.png";
		document.getElementById("tekstNapadac").innerHTML ="Roberto Firmino Barbosa de Oliveira (born 2 October 1991), \
						commonly known as Roberto Firmino or solely as Firmino, is a Brazilian professional footballer \
						who plays for Premier League club Liverpool and the Brazil national team as an attacking midfielder, \
						forward or winger.";
	}
	
	if(odabraniNapadac==="SadioMané"){
		document.getElementById("slikaNapadac").src="../Slike/SadioMané.png";
		document.getElementById("tekstNapadac").innerHTML ="Sadio Mané (born 10 April 1992) is a Senegalese professional \
						footballer who plays for Premier League club Liverpool and the Senegal national team as a winger.";
	}
	
	if(odabraniNapadac==="DivockOrigi"){
		document.getElementById("slikaNapadac").src="../Slike/DivockOrigi.jpg";
		document.getElementById("tekstNapadac").innerHTML ="Divock Okoth Origi, born 18 April 1995, is a Belgian professional \
						footballer who plays as a forward for Premier League club Liverpool and the Belgium national team. \
						He is the son of former Kenyan professional footballer Mike Origi.";
	}
	
	if(odabraniNapadac==="DannyIngs"){
		document.getElementById("slikaNapadac").src="../Slike/DannyIngs.jpg";
		document.getElementById("tekstNapadac").innerHTML ="Daniel William John 'Danny' Ings (born 23 July 1992) \
						is an English professional footballer who plays as a forward for Premier League club Liverpool \
						and the England national team.";
	}
	
	if(odabraniNapadac==="MarioBalotelli"){
		document.getElementById("slikaNapadac").src="../Slike/MarioBalotelli.jpg";
		document.getElementById("tekstNapadac").innerHTML ="Mario Balotelli Barwuah, born Mario Barwuah, 12 August 1990,\
						is an Italian professional footballer who plays as a striker for Ligue 1 club Nice and the Italy \
						national team.";
	}
	
	if(odabraniNapadac==="TaiwoAwoniyi"){
		document.getElementById("slikaNapadac").src="../Slike/TaiwoAwoniyi.jpeg";
		document.getElementById("tekstNapadac").innerHTML ="Taiwo Awoniyi Micheal (born August 12, 1997) \
						is a Nigerian professional footballer who plays as a forward for the Dutch Side NEC \
						on loan from Premier League club Liverpool. Taiwo's style of play has been compared to \
						that of Rashidi Yekini, Nigeria's all-time highest goalscorer.";
	}
}