<?php
	session_start();
	// $result = (isset($_SERVER['PHP_AUTH_USER']) && $_SERVER['PHP_AUTH_USER'] == 'admin' && $_SERVER['PHP_AUTH_PW'] == 'admin');
	$result = ($_SESSION['loggedin'] && $_SESSION['username']=='admin');

	if ($result){
		header ("Location: admin.php");
	}
	else {
		header ("Location: index.php");
	}
   
?>