<?php
	//grab all the form fields
	$ings = $_POST['list'];
	//Connect to database
	require('../connect.php');
	pg_query("set search_path='foobox';");
	//connect meals to ingredients
	$listIngredients = explode(',', $ings);
	$numberOrder = pg_fetch_array(pg_query("select count(id) from orders;"));
	$numberOrder = $numberOrder[0];
	for ($index = 0; $index < count($listIngredients); $index=$index+2){
		$numberOrder++;
		$index1=$index+1;
		$name = $listIngredients[$index1];
		$ingredientID = pg_fetch_row(pg_query("select id from ingredient where name='$name';"));
		$ingredientID = $ingredientID[0];
		$num = $listIngredients[$index];
		$price = pg_fetch_row(pg_query("select price from ingredient where name='$name';"));
		$price = $price[0]*$num;
		pg_query("insert into orders values ($numberOrder, $ingredientID, $num, $price, false, false);");
	}

	$url = "chef.php?page=orderingredients";
	include("../php_includes/session.php");
	$_SESSION['complete']= 'true';
	header("Location: $url");
?>