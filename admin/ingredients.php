<html>
	<h2>Ingredient Report</h2>
	<div class="col-md-12" id="step3">
		<table class="table table-striped" style="width:100%;">
			<tr>
				<th>Ingredient</th>
				<th>Quantity</th> 
			</tr>
			<?php
				require("../connect.php");
				pg_query("set search_path='foobox';");
				$grabAllIngredients = pg_query("select name, count from ingredient;");
				while($row = pg_fetch_row($grabAllIngredients)){
					echo "<tr><td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td></tr>";
				}
			?>
		</table>	
	</div>
</html>