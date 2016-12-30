function validacijaForme(){
	var porukaGreske = document.getElementById('greska');
	porukaGreske.innerHTML="";
	
	var forma = document.getElementById("formaPoruka");
	
	if(forma.imeIPrezime.value===""){
		porukaGreske.innerHTML+="Niste unijeli ime i prezime";
		
		return false;
	}
	
	if(forma.imeIPrezime.value.length<6 || forma.imeIPrezime.value.length>30){
		porukaGreske.innerHTML+="Ime i prezime je predugo ili prekratko";
		return false;
	}
	
	var imeiPrezimeRegex = /[A-Za-z]+\s+['A-Za-z]+/;
	if(!imeiPrezimeRegex.test(forma['imeIPrezime'].value)){
		porukaGreske.innerHTML+="Niste unijeli validno ime i prezime.";
		return false;
	}
	
	var telefonRegEx = /^\(?(\d{3})\)?[-]?(\d{3})[-]?(\d{3})$/;
	if (!telefonRegEx.test(forma['telefon'].value)) {
		greska.innerHTML+="Telefon mora imati format: (061)-123-345 ili 061-123-456 ili 061123456";  
		return false;
	}
	
	var telefonRegEx = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
	if (!telefonRegEx.test(forma['email'].value)) {
		greska.innerHTML+="Email mora biti u formatu: naziv@provider.com";  
		return false;
	}
	
	if(forma.poruka.value===""){
		porukaGreske.innerHTML+="Niste unijeli poruku";
		return false;
	}
	return true;
}

function prikaziPoruku() {
	if(validacijaForme()){
		var forma = document.getElementById("formaPoruka");
		var tekst = forma.imeIPrezime.value;
		tekst += " je poslao poruku sadržaja: <br>";
		tekst += document.getElementById('poruka').value;
		tekst += "<br>";
		tekst += "<br>";
		document.getElementById('sadrzajPoruke').innerHTML+=tekst;
		document.getElementById('formaPoruka').reset();
		document.getElementById('fieldSet').style.display="inline";
	}
}

function validirajUnos(){
	var porukaGreske = document.getElementById('greska');
	porukaGreske.innerHTML="";
	
	var imeiPrezimeRegex = /[A-Za-z]+\s+['A-Za-z]+/;
	var telefonRegEx = /^\(?(\d{3})\)?[-]?(\d{3})[-]?(\d{3})$/;
	var emailRegEx = /\S+@\S+\.\S+/;
	
	var forma = document.getElementById("formaPoruka");
	
	if(forma.imeIPrezime.value===""){
		porukaGreske.innerHTML="Niste unijeli ime i prezime";
		document.getElementById("posalji").disabled=true;
	}
	
	else if(forma.imeIPrezime.value.length<6 || forma.imeIPrezime.value.length>30){
		porukaGreske.innerHTML="Ime i prezime je predugo ili prekratko";
		document.getElementById("posalji").disabled=true;
	}
	
	
	else if(!imeiPrezimeRegex.test(forma['imeIPrezime'].value)){
		porukaGreske.innerHTML="Niste unijeli validno ime i prezime.";
		document.getElementById("posalji").disabled=true;
	}
	
	
	else if (!telefonRegEx.test(forma['telefon'].value)) {
		greska.innerHTML="Telefon mora imati format: (061)-123-345 ili 061-123-456 ili 061123456";  
		document.getElementById("posalji").disabled=true;
	}
	
	
	else if (!emailRegEx.test(forma['email'].value)) {
		greska.innerHTML="Email mora biti u formatu: naziv@provider.com";  
		document.getElementById("posalji").disabled=true;
	}
	
	else if(forma.poruka.value===""){
		porukaGreske.innerHTML="Niste unijeli poruku";
		document.getElementById("posalji").disabled=true;
	}
	
	else {
		porukaGreske.innerHTML="";
		document.getElementById("posalji").disabled=false;
		
	}
}

