function validirajLogin(){
	var porukaGreske = document.getElementById('greska');
	porukaGreske.innerHTML="";
	
	var forma = document.getElementById("loginForma");
	
	if(forma.username.value===""){
		porukaGreske.innerHTML+="Niste unijeli username.";
		return false;
	}
	
	if(forma.password.value===""){
		porukaGreske.innerHTML+="Niste unijeli password.";
		return false;
	}
	
	if(forma.username.value.length<5 || forma.username.value.length>30){
		porukaGreske.innerHTML+="Username je predugo ili prekratko";
		return false;
	}
	
	if(forma.password.value.length<5 || forma.password.value.length>30){
		porukaGreske.innerHTML+="Password je predug ili prekratak";
		return false;
	}
	
	var usernameRegex = /^[a-zA-Z0-9]+$/;
	if(!usernameRegex.test(forma['username'].value)){
		porukaGreske.innerHTML+="Niste unijeli validan username.";
		return false;
	}
	
	return true;
}

