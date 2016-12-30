function prikazi(tip) {
	prikaziTekst(tip);
	prikaziSlike(tip);
}

function prikaziTekst(tip) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("info").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../Php/prikaziTakmicenja.php?tip=" + tip, true);
	xmlhttp.send();
}

function prikaziSlike(tip){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//document.getElementById(slika).innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../Php/prikaziSlike.php?tip=" + tip, true);
	xmlhttp.send();
}