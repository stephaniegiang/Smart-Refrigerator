<html>
	<div class="row">
		<h2>Ingredient Availability</h2>
		
		<div class="col-md-4">
	        <select class ="form-control" onchange="showStep('step2');">
	          <option selected disabled>Select Cuisine</option>
			  <option>Italian</option>
	          <option>KFC</option>
	          <option>All</option>
	        </select>
			
		</div>
		<div class="col-md-4 offset-md-4" id="step2" style="visibility: hidden;">
	        <select class ="form-control" onchange="showStep('step3');">
	          <option selected disabled>Select Meal</option>
			  <option>Chicken</option>
	          <option>Spicy Chicken</option>
	          <option>Popcorn Chicken</option>
	          <option>All</option>
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