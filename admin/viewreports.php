<?php require('../connect.php');
    $setPath = pg_query("Set search_path='foobox';");
    $getMeals = pg_query("Select * from meals;");
	$row = pg_fetch_array($getMeals); 
?>


<html>
	<h2>View Reports</h2>
	<div class="row">
		<div class="col-md-6">
			<h3>Most Expensive Meal</h3>
			<p>According to our statistics, the most expensive meal is:<b>
				<?php
				$maxPricedMeal = pg_fetch_row(pg_query
				("SELECT name 
				  FROM meals 
				  WHERE price = 
				  (
					SELECT MAX(price) 
					FROM meals
				  );"));
				  
			    $maxPricedMeal = $maxPricedMeal[0]; 
				echo ucfirst($maxPricedMeal);
				?>
			</b>
			</p>			
		</div>
		<div class="col-md-6">
			<h3>Most Requested Meal</h3>
			<p>Acording to our statistics, the most frequently ordered meal is:<b>
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
		
				echo ucfirst($mostRequestedmeal); 
				?>
			</b>	
			</p>
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h3>Most Requested Ingredient</h3>
			<p> According to our statistics, the most fequently ordered ingredient is:<b>
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
		
				echo ucfirst($mostRequestedIngredient); 
				?>
				</b>
			</p>
		</div>	
		<div class="col-md-6">
			<h3>Top 3 ingredients</h3>
			<p>According to our statistics, the top 3 ingredients are
				<?php
				//top 3 most ordered ingredients 
				
				
				$topThreeIngredients = pg_fetch_all_columns(pg_query
				("SELECT   name
				FROM     history, ingredient
				WHERE    ingredientid = ingredient.id 
				GROUP BY ingredientid, name
				ORDER BY COUNT(ingredientid) DESC
				LIMIT    3;"));	
			
			    
				//echo "According to our statistics,the most popular ingredient is: $topThreeIngredients[0] the second most popular is:
			    //$topThreeIngredients[1] and the third most popular is: $topThreeIngredients[2]."; 
				?>
				<b>
				<ol>
					<li><?php echo ucfirst($topThreeIngredients[0]);?></li>
					<li><?php echo ucfirst($topThreeIngredients[1]);?></li>
					<li><?php echo ucfirst($topThreeIngredients[2]);?></li>
				</ol>
				</b>
			</p>
		</div>
	</div>
</html>