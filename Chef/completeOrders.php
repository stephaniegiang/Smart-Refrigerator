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
        $mealID = pg_query("select mealsid from queue where ordernumber = $primaryKey;");
        //Grab all the ingredients for that meal
        $allIngredients = pg_query("select * from relations where mealsid=$mealID");
        //Go through all the ingredients and update count of ingredients
        while($row = pg_fetch_array($allIngredients)){
            //Calculate the new ingredient count
            $currentCount = pg_query("select count from ingredient where id=$row[2];");
            $currentCount = $currentCount - $row[3];
            //update the database with the new number
            pg_query("update ingredient set count=$currentCount where id=$row[2]");
        }
    }
?>