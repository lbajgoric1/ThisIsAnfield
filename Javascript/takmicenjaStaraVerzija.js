function prikaziPremiership(){
	// document.getElementById("info").innerHTML ="Prvak: 1901, 1906, 1922, 1923, 1947, 1964, 1966, 1973, \
		// 1976, 1977, 1979, 1980, 1982, 1983, 1984, 1986, 1988, 1990.";
	document.getElementById("info").innerHTML ="<?php $_XML = simplexml_load_file("../Xml/takmicenja.xml"); echo $_XML->premiership->tekst; ?>";
		
	document.getElementById("slika1").src="<?php echo $_XML->premiership->slike->slika1; ?>";
	document.getElementById("slika2").src="<?php echo $_XML->premiership->slike->slika2; ?>";
	document.getElementById("slika3").src="<?php echo $_XML->premiership->slike->slika3; ?>";
}

function prikaziLiguSampiona() {
	// document.getElementById("info").innerHTML ="Prvak: 1977, 1978, 1981, 1984, 2005.";
	document.getElementById("info").innerHTML ="<?php $_XML = simplexml_load_file('../Xml/takmicenja.xml'); echo $_XML->ligaSampiona->tekst; ?>";
		
	document.getElementById("slika1").src="<?php echo $_XML->ligaSampiona->slike->slika1; ?>";
	document.getElementById("slika2").src="<?php echo $_XML->ligaSampiona->slike->slika2; ?>";
	document.getElementById("slika3").src="<?php echo $_XML->ligaSampiona->slike->slika3; ?>";
}

function prikaziLiguEvrope() {
	// document.getElementById("info").innerHTML ="Prvak: 1973, 1976, 2001.";
	document.getElementById("info").innerHTML ="<?php $_XML = simplexml_load_file('../Xml/takmicenja.xml'); echo $_XML->ligaEvrope->tekst; ?>";
		
	document.getElementById("slika1").src="<?php echo $_XML->ligaEvrope->slike->slika1; ?>";
	document.getElementById("slika2").src="<?php echo $_XML->ligaEvrope->slike->slika2; ?>";
	document.getElementById("slika3").src="<?php echo $_XML->ligaEvrope->slike->slika3; ?>";
}

function prikaziOstala() {
	// document.getElementById("info").innerHTML ="FA Cup: 1964–65, 1973–74, 1985–86, 1988–89, 1991–92, 2000–01, 2005–06 <br> \
		// League Cup: 1980–81, 1981–82, 1982–83, 1983–84, 1994–95, 2000–01, 2002–03, 2011–12 <br> \
		// FA Charity / Community Shield: 1964, 1965, 1966, 1974, 1976, 1977, 1979, 1980, 1982, 1986, 1988, 1989, 1990, 2001, 2006";
	document.getElementById("info").innerHTML ="<?php $_XML = simplexml_load_file('../Xml/takmicenja.xml'); echo $_XML->ostala->tekst; ?>";
	
	document.getElementById("slika1").src="<?php echo $_XML->ostala->slike->slika1; ?>";
	document.getElementById("slika2").src="<?php echo $_XML->ostala->slike->slika2; ?>";
	document.getElementById("slika3").src="<?php echo $_XML->ostala->slike->slika3; ?>";
}