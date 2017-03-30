		<?php
		
		 require('../connect.php');
            $setPath = pg_query("Set search_path='foobox';");
            $getMeals = pg_query("Select * from meals;");
            $row = pg_fetch_array($getMeals); 
			
			//try max function 
			
			$maxPricedMeal = pg_fetch_row(pg_query
			("SELECT name 
			  FROM meals 
			  WHERE price = 
			  (
				SELECT MAX(price) 
				FROM meals
			  );"));
			  
		    $maxPricedMeal = $maxPricedMeal[0]; 
			echo "The most expensive meal on our menu is: $maxPricedMeal"; 
			
			//different algorithm for finding max but it had a glitch :(
		    //$greatestValue = '<option class="op" value="'.$row["id"]. '"">' .$row["price"].'</option>'; 
			//while($row = pg_fetch_array($getMeals)){
			//$nextValue =  '<option class="op" value="'.$row["id"]. '"">' .$row["price"].'</option>'; 
			//if ($nextValue > $greatestValue){
		    // $greatestValue = $nextValue; 
			// }
            //}
             // echo "$greatestValue";
            
         ?>
	 


		<?php
		//most requested meal -->queue 
		
		$mostRequestedmeal = pg_fetch_row(pg_query
		("SELECT   name 
		FROM     queue, meals 
		WHERE    mealsid = meals.id 
		GROUP BY mealsid, name
		ORDER BY COUNT(mealsid) DESC
		LIMIT    1;"));	
		
		$mostRequestedmeal = $mostRequestedmeal[0]; 

		echo "According to our statistics, the most frequently ordered meal is: $mostRequestedmeal"; 
		?>

		<?php
		//most requested ingredient -->history
		
		$mostRequestedIngredient = pg_fetch_row(pg_query
		("SELECT   name 
		FROM     history, ingredient
		WHERE    ingredientid = ingredient.id 
		GROUP BY ingredientid, name
		ORDER BY COUNT(ingredientid) DESC
		LIMIT    1;"));	
		
		$mostRequestedIngredient = $mostRequestedIngredient[0]; 

		echo "According to our statistics, the most frequently ordered ingredient is: $mostRequestedIngredient"; 
		?>

		<?php
		//top 3 most ordered ingredients 
		
		
		$topThreeIngredients = pg_fetch_all_columns(pg_query
		("SELECT   name
		FROM     history, ingredient
		WHERE    ingredientid = ingredient.id 
		GROUP BY ingredientid, name
		ORDER BY COUNT(ingredientid) DESC
		LIMIT    3;"));	
	
	    
		echo "According to our statistics,the most popular ingredient is: $topThreeIngredients[0] the second most popular is:
	    $topThreeIngredients[1] and the third most popular is: $topThreeIngredients[2]."; 
		
		
		?>