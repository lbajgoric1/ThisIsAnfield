function showResult(str) {
	if (str.length==0) { 
		document.getElementById("livesearch").innerHTML="";
		return;
	}
  
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
			document.getElementById("livesearch").innerHTML=this.responseText;
		}
	}
	xmlhttp.open("GET","../Php/livesearchUpTo10.php?q="+str,true);
	xmlhttp.send();
}

function prikaziRezultate(){
	str = document.getElementById("pretraga").value;
	if (str.length==0) { 
		document.getElementById("livesearch").innerHTML="";
		return;
	}
  
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (this.readyState==4 && this.status==200) {
			document.getElementById("livesearch").innerHTML="<b>Rezultat pretrage je: </b>" + "<br>" +this.responseText;
		}
	}
	xmlhttp.open("GET","../Php/livesearch.php?q="+str,true);
	xmlhttp.send();
}