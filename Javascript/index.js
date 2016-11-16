function ucitajStranicu(url){
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {// Anonimna funkcija
		if (ajax.readyState == 4 && ajax.status == 200)
		{
			document.getElementById("sadrzaj").innerHTML = ajax.responseText;
			
			document.getElementById("pocetna.html").style.backgroundColor = "#333";
			document.getElementById("takmicenja.html").style.backgroundColor = "#333";
			document.getElementById("oKlubu.html").style.backgroundColor = "#333";
			document.getElementById("anfield.html").style.backgroundColor = "#333";
			document.getElementById("galerija.html").style.backgroundColor = "#333";
			document.getElementById("momcad.html").style.backgroundColor = "#333";
			
			document.getElementById(url).style.backgroundColor = "#4CAF50";
		}
							
			
		if (ajax.readyState == 4 && ajax.status == 404)
			document.getElementById("sadrzaj").innerHTML = "Greska: nepoznat URL";
	}
	ajax.open("GET", url, true);
	ajax.send();
}
