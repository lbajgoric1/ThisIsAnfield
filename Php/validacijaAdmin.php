<?php
	session_start();
	$result = ($_SESSION['loggedin'] && $_SESSION['username']=='admin');

	if ($result){
		header ("Location: admin.php");
	}
	else {
		header ("Location: login.php");
	}
   
?>