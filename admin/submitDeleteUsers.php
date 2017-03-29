<?php
  	include ('validateAdmin.php');
	//grab selected values
	$values = $_POST['list'];
	//log into database
	require('../connect.php');
	$query = pg_query("set search_path='foobox';");

	//Loop through each selection and adding it to the history
	foreach ($values as $primaryKey){
		pg_query("update user_account set deleted=true where username='$primaryKey';");
	}

	$url = "admin.php?page=delete";
	$_SESSION['complete']= 'true';
	header("Location: $url");
?>