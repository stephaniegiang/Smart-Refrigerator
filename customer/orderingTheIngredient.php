<?php
  	include ('validateCustomer.php');
	//grab selected values
	$values = $_POST['list'];
	//log into database
	require('../connect.php');
	$query = pg_query("set search_path='foobox';");

	//Get the current number of ingredients in database
	$getAllOrders = pg_query("SELECT * FROM history;");
	$numberOfOrders = pg_num_rows($getAllOrders);
	//Loop through each selection and adding it to the history
	foreach ($values as $primaryKey){
		//grab current number and name ingredient
		$userID = $_SESSION['login_user'];
		$ingredientsLeft = pg_fetch_row(pg_query("Select count from Ingredient where ID=$primaryKey;"));
		$ingredientsLeft = $ingredientsLeft[0]+0;
		$nameOfIngredient = pg_fetch_row(pg_query("Select name from Ingredient where ID=$primaryKey;"));
		$nameOfIngredient = $nameOfIngredient[0];
		
		$priceOfIngredient = pg_fetch_row(pg_query("Select price from Ingredient where ID=$primaryKey;"));
		$priceOfIngredient = $priceOfIngredient[0];
		$priceOrder = $priceOfIngredient *10; 
		
		$idOfIngredient = pg_fetch_row(pg_query("Select id from Ingredient where ID=$primaryKey;"));
		$idOfIngredient = $idOfIngredient[0];
		
		$threshold = pg_fetch_row(pg_query("Select threshold from Ingredient where ID=$primaryKey;"));
		$threshold = $threshold [0]; 
		
		//Check the fridge to make sure that there is enough of the ingredient in the fridge
		if ($ingredientsLeft > 0){
			//Add ingredient to the history 
			$numberOfOrders = $numberOfOrders+1;
			$date = new DateTime();
			$result = pg_query("INSERT INTO history values ($primaryKey, localtimestamp, $numberOfOrders, '$userID');");
			//Update the ingredient count
			$ingredientsLeft = $ingredientsLeft-1;
			echo "Ingredients before: " .$ingredientsLeft. "<---->";
			$update = pg_query("Update Ingredient set count=$ingredientsLeft where ID=$primaryKey;");
			$url = "customer.php?page=meal";
			$_SESSION['complete']= 'true';
			header("Location: $url");
		}elseif ($ingredientsLeft=0){
			echo "Order of " .$nameOfIngredient. " was NOT successful! No more left in fridge";
		}
		if($ingredientsLeft<=$threshold){	
			//Add ingredient to the order
			 $ordersID = pg_fetch_array(pg_query("select count(id) from orders;"));
	         $ordersID = $ordersID[0] + 1;
			 
			 $result = pg_query("INSERT INTO orders values ($ordersID,$idOfIngredient,10,$priceOrder,false, false );");
		}
			
		}
	
?>
