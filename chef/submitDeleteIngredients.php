<?php
  	include ('validateChef.php');
	//grab selected values
	$values = $_POST['list'];
	//log into database
	require('../connect.php');
	pg_query("set search_path='foobox';");

	//Loop through each selection, deleting the ingredient
	foreach ($values as $primaryKey){
		pg_query("Update Ingredient set active=false where ID=$primaryKey;");
	}
	$_SESSION['complete']= 'true';
	$url = "chef.php?page=deleteingredients";
	header("Location: $url");
?>