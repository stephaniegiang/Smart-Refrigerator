<html>
	<div class="row">
		<h2>Ingredient Availability</h2>
		
		<div class="col-md-4">
	        <select class ="form-control" onchange="showStep('step2');" name="cuisinename" id="cuisinename">
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
	        </select>
			
		</div>
		<div class="col-md-4 offset-md-4" id="step2" style="visibility: hidden;">
	        <select class ="form-control" onchange="showStep('step3');" name="mealname" id="mealname">
	          <option selected disabled>Select Meal</option>
			  <?php
			  	//$type = $_POST['cuisinename'];
			  	echo $type;
			  	require('../connect.php');
			  	$query = 0;
			  	if($type == "All"){
			  		$query= pg_query("select id, name from meals;");
			  	}else{
			  		$query = pg_query("select id, name from meals where cuisine='$type';");
			  	}
			  	while($row = pg_fetch_row($query)){
			  		echo '<option value="'.$row[0].'">'.$row[1].'</option>';
			  	}
			  ?>
	        </select>
		</div>		
	</div>
	<div class="row">
		<hr/>
			<div class="col-md-12" id="step3" style="visibility: hidden;">
			<table class="table table-striped" style="width:100%;">
			  <tr>
			    <th>Ingredient</th>
			    <th>Quantity</th> 
			  </tr>
			  <tr>
			    <td>First ingredient</td>
			    <td>1</td>
			  </tr>
			  <tr>
			    <td>Second ingredient</td>
			    <td>20</td>
			  </tr>
			  <tr>
			    <td>Chicken</td>
			    <td>Infinite</td>
			  </tr>
			</table>
		</div>
	</div>
</html>