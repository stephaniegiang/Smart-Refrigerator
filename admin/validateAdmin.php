<?php 
	include("../php_includes/session.php");
	if($_SESSION['login_type'] !== 'admin'){
		$url = "../notAuthorized.php";
		header("Location: $url");
	}
?>