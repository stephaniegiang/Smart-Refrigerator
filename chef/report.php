<html>
	<div class="row">
		<h2>Ingredient Availability</h2>
		<form action="report.php" method="post">
			<div class="col-md-4">
		        <select class ="form-control" onchange="showStep();" name="cuisinename" id="cuisinename">
		            <option selected disabled>Select Cuisine</option>
				  	<option value="Canadian">Canadian</option>
	        		<option value="Italian">Italian</option>
	        		<option value="Asian">Asian</option>
			        <option value="European">European</option>
			        <option value="Carribean">Carribean</option>
			        <option value="Mexican">Mexican</option>
			        <option value="African">African</option>
			        <option value="Middle Eastern">Middle Eastern</option>
				    <option value="All">All</option>
				    <input type="hidden" id="hide" name="hide" value="high">
		        </select>
		        <select class ="form-control" onchange="showmeal();" name="mealname" id="mealname">
		            <?php
			            require('../connect.php');
			            $setPath = pg_query("Set search_path='foobox';");
			            $getIngredients = pg_query("select * from meals as meal where NOT EXISTS (select * from queue where mealsid= meal.id and completed=false) and active=true;");
			            while($row = pg_fetch_array($getIngredients)){
			              echo '<option class="op" value="'.$row["id"]. '"">'.$row["name"].'</option>';
			            }
			          ?>
		        </select>	
			</div>
		</form>
		<div class= "step2">
		
		</div>
	</div>
	<div class="row">
		<hr/>
			
			<?php 
			 require('../connect.php');
                $setPath = pg_query("Set search_path='foobox';");
                //Grab all meals that are active
                $getMeals = pg_query("Select name,id,cuisine from meals where active=true;");
              while($row = pg_fetch_array($getMeals)){
              	$result= pg_query("
                            select numberofingredients, name
                            from relations, ingredient
                            where mealid= $row[1] and ingredient.id=ingredientid;
                            ");
				  echo "
				  <meal class=".$row[2]." id=".$row[1]." style='visibility: visible;'>
					<table class='table table-striped' style='width:100%;'>
				  <h1>".$row[0]."</h1>
				  <tr>
				    <th>Ingredient</th>
				    <th>Quantity</th> 
				    <th>Number of Ingredient</th>
				  </tr>";
				  while($ings = pg_fetch_array($result)){
				  $name = $ings[1];
				  $Availability= pg_fetch_array(pg_query("select count from ingredient where name='$name';"));
				  $Availability = $Availability[0];
					echo "<tr><td>".$ings[1]."</td><td>".$ings[0]."</td><td>".$Availability."</td></tr>";
				}
				  echo "</table>
				</meal>";
			}
			  ?>
	</div>
</html>