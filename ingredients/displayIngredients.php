	<?php
		require('../connect.php');
	    $setPath = pg_query("Set search_path='foobox';");
		$getIngredients = pg_query("Select * from Ingredient;");

		echo "<ul>";

		while($row = pg_fetch_array($getIngredients)){
			echo "<li>" .$row['name']. "</li>";
		}

		echo "</ul>";
	?>