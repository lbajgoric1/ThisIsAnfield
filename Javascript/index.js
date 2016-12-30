function ucitajStranicu(url, id){
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
			
			var ind=0;
			
			if(url==="golmani.html" || url==="odbrambeni.html" || url==="vezni.html" || url==="napadaci.html"){
				document.getElementById("momcad.html").style.backgroundColor = "#4CAF50";
				ind=1;
			}
			
			if(url==="sezona1314.php" || url==="sezona1415.php"){
				document.getElementById("takmicenja.html").style.backgroundColor = "#4CAF50";
				ind=1;
			}
			if(ind==0 && id!="linkLogin") {
				document.getElementById(id).style.backgroundColor = "#4CAF50";
			}
			
		}
							
			
		if (ajax.readyState == 4 && ajax.status == 404)
			document.getElementById("sadrzaj").innerHTML = "Greska: nepoznat URL";
	}
	ajax.open("GET", url, true);
	ajax.send();
}


function prikaziPadajuci(id) {
	document.getElementById(id).classList.toggle("show");
}

// function prikaziPadajuci2() {
	// document.getElementById("ddContent2").classList.toggle("show");
// }

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    for (var d = 0; d < dropdowns.length; d++) {
      var openDropdown = dropdowns[d];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}