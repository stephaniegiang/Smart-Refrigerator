<?php 
  include ('validateCustomer.php');
?>
<html>
	<script language="JavaScript" type="text/javascript" src="../../js/select.js"	></script>
	<div style="margin-top:50px;margin-bottom:100px;">
		<h1>Your Orders</h1>
        <p>Here is a list of all your orders. For uncompleted orders, it might take longer to comeplete if the ingredients are not available. If you have any questions or concerns make sure to contact the kitchen.</p>
		<h2>Current/Uncompleted Orders</h2>
        <ul>
            <?php
                //connect to the database
                require('../connect.php');
                $setPath = pg_query("Set search_path='foobox';");
                //Grab all not completed orders of the user
                $userID = $_SESSION['login_user'];
                $getMeals = pg_query("Select mealsid, ordernumber from queue where completed=false and userid='$userID';");
                //go through all the orders
                while($row = pg_fetch_array($getMeals)){
                    //grab the name of the meal
                    $nameOfMeal = pg_fetch_array(pg_query("select name from meals where id=$row[0];"));
                    $nameOfMeal = $nameOfMeal[0];
                    //display the name of meal as well as order number
                    echo "<li>".$nameOfMeal." (Order #" .$row[1]. ")</li>";
                }
            ?>
        </ul>
        <h2>Completed Orders</h2>
        <ul>
            <?php
                //connect to the database
                require('../connect.php');
                $setPath = pg_query("Set search_path='foobox';");
                //Grab all the completed orders of the user
                $userID = $_SESSION['login_user'];
                $getMeals = pg_query("Select mealsid, ordernumber from queue where completed=true and userid='$userID';");
                //go through all the orders
                while($row = pg_fetch_array($getMeals)){
                    //grab the name of the meal
                    $nameOfMeal = pg_fetch_array(pg_query("select name from meals where id=$row[0];"));
                    $nameOfMeal = $nameOfMeal[0];
                    //display the name of meal as well as order number
                    echo "<li>".$nameOfMeal." (Order #" .$row[1]. ")</li>";
                }
            ?>
        </ul>
</html>        