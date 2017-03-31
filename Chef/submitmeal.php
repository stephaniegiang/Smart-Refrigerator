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
		pg_query("insert into relations values ($numberRelations, $mealID, $ingredientID, $num, true);");
		
		//check threshold for each ingredient and make order if it is below or equal to threshold
		$priceOfIngredient = pg_fetch_row(pg_query("Select price from Ingredient where ID=$primaryKey;"));
		$priceOfIngredient = $priceOfIngredient[0];
		$priceOrder = $priceOfIngredient *10; 
		
		$threshold = pg_fetch_row(pg_query("Select threshold from Ingredient where ID=$primaryKey;"));
		$threshold = $threshold [0]; 
		
		$ingredientCount = pg_fetch_row(pg_query("select count from ingredient where name='$name';"));
		$ingredientCount = $ingredientCount[0];
		
		if($ingredientCount<=$threshold){	
			//Add ingredient to the order
			 $ordersID = pg_fetch_array(pg_query("select count(id) from orders;"));
	         $ordersID = $ordersID[0] + 1;
			 
			 $result = pg_query("INSERT INTO orders values ($ordersID,$ingredientID,10,$priceOrder,false, false );");
		}	
		
	}

	$url = "chef.php?page=meal";
	$_SESSION['complete']= 'true';
	header("Location: $url");
?>
