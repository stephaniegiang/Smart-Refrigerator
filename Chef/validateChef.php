<?php 
	include("../php_includes/session.php");
	if($_SESSION['login_type'] !== 'chef'){
		$url = "../notAuthorized.php";
		header("Location: $url");
	}
?>