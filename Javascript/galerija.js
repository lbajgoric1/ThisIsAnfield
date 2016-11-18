function prikaziSliku(smSrc, lgSrc) {
	document.getElementById('velikaSlika').src = smSrc;
	prikaziVelikiDiv();
}
function prikaziVelikiDiv() {
	document.getElementById('velikiDiv').style.display = 'block';
}

document.onkeydown = function(evt) {
	evt = evt || window.event;
	if (evt.keyCode == 27) {
		document.getElementById("velikiDiv").style.display = "none";
	}
};