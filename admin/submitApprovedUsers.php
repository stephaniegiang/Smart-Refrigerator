<?php
  	include ('validateCustomer.php');
	//grab selected values
	$values = $_POST['list'];
	//log into database
	require('../connect.php');
	$query = pg_query("set search_path='foobox';");

	//Loop through each selection and adding it to the history
	foreach ($values as $primaryKey){
		pg_query("update user_account set approve=true where username='$primaryKey';");
	}

	$url = "admin.php?page=approveusers";
	header("Location: $url");
?>