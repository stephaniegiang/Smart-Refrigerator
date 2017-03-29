<?php
	//grab all the form fields
	$meal = $_POST['mealname'];
	$type = $_POST['cuisinename'];
	$price = $_POST['price'];
	$price = (string)$price;
	$ings = $_POST['list'];
	//Connect to database
	require('../connect.php');
	pg_query("set search_path='foobox';");
	//get the primary key for the new meal
	$mealID = pg_fetch_array(pg_query("select count(id) from meals;"));
	$mealID = $mealID[0] + 1;
	//add meal to the database
	pg_query("insert into meals values ($mealID, '$meal','$type', $price, true);");
	//connect meals to ingredients
	$listIngredients = explode(',', $ings);
	$numberRelations = pg_fetch_array(pg_query("select count(id) from relations"));
	$numberRelations = $numberRelations[0];
	for ($index = 0; $index < count($listIngredients); $index=$index+2){
		$numberRelations++;
		$index1=$index+1;
		$name = $listIngredients[$index1];
		$ingredientID = pg_fetch_row(pg_query("select id from ingredient where name='$name';"));
		$ingredientID = $ingredientID[0];
		$num = $listIngredients[$index];
		pg_query("insert into relations values ($numberRelations, $mealID, $ingredientID, $num);");
		echo $name;
	}

	$url = "chef.php?page=meal";
	$_SESSION['complete']= 'true';
	header("Location: $url");
?>