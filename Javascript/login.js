function validirajLogin(){
	var porukaGreske = document.getElementById('greska');
	porukaGreske.innerHTML="";
	
	var forma = document.getElementById("loginForma");
	var usernameRegex = /^[a-zA-Z0-9]+$/;
	
	if(forma.username.value.length<4 || forma.username.value.length>30){
		porukaGreske.innerHTML="Username je predugo ili prekratko";
		document.getElementById("prijava").disabled=true;
	}
	
	
	else if(forma.password.value.length<5 || forma.password.value.length>30){
		porukaGreske.innerHTML="Password je predug ili prekratak";
		document.getElementById("prijava").disabled=true;
	}
	
	
	else if(!usernameRegex.test(forma['username'].value)){
		porukaGreske.innerHTML="Niste unijeli validan username.";
		document.getElementById("prijava").disabled=true;
	}

	else {
		porukaGreske.innerHTML="";
		document.getElementById("prijava").disabled=false;
	}
}

