<?php
    //grab all completed orders from select menu
    $values = $_POST['list'];
    //connect to database and set search path
    require("../connect.php");
    pg_query("set search_path='foobox';");

    //for each completed order go through the list and make it completed
    foreach ($values as $primaryKey){
        //make the meal completed
        $completeOrder = pg_query("update queue set completed=true where ordernumber=$primaryKey;");
        $mealID =pg_fetch_array(pg_query("select mealsid from queue where ordernumber = $primaryKey;"));

        $getAllIngredients = pg_query("select ingredientid, numberofingredients from relations where mealid= $mealID[0]");
        while ($row = pg_fetch_array($getAllIngredients)){
            //grab current number of ingredients
            $numIngredients = pg_fetch_array(pg_query("select count from ingredient where id=$row[0];"));
            $numIngredients = $numIngredients[0] - $row[1];
            //update the database with the new number
            pg_query("update ingredient set count=$numIngredients where id=$row[0];");
        }
    }
?>