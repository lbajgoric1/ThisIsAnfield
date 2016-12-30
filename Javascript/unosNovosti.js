function validirajUnos(){
	var porukaGreske = document.getElementById('greska');
	porukaGreske.innerHTML="";
	
	var forma = document.getElementById("unosNovosti");
	var regex = /^[a-z\d\-_\s]+$/i;
	
	if(forma.naslov.value.length<6 ){
		porukaGreske.innerHTML="Naslov je prekratak";
		document.getElementById("unosBtn").disabled=true;
	}
	
	
	else if(!regex.test(forma['naslov'].value)){
		porukaGreske.innerHTML="Niste unijeli validan naslov.";
		document.getElementById("unosBtn").disabled=true;
	} 
	
	else if(forma.sadrzaj.value.length<6){
		porukaGreske.innerHTML="Sadržaj je prekratak";
		document.getElementById("unosBtn").disabled=true;
		rezultat = false;
	}
	
	
	else if(!regex.test(forma['sadrzaj'].value)){
		porukaGreske.innerHTML="Niste unijeli validan sadržaj.";
		document.getElementById("unosBtn").disabled=true;
		rezultat = false;
	}
	
	else {
		porukaGreske.innerHTML="";
		document.getElementById("unosBtn").disabled=false;
		
	}
}


