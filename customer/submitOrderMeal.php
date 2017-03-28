<?php
    session_start();
    //grab selected values
    $values = $_POST['list'];
    //log into database
    require('../connect.php');
    $query = pg_query("set search_path='foobox';");

    //Get the current number of ingredients in database
    $getAllQueues = pg_query("SELECT * FROM queue;");
    $numberOfQueues = pg_num_rows($getAllQueues);
    //Loop through each selection and adding it to the queue
    foreach ($values as $primaryKey){
        //grab the meal that is to be ordered
        $mealToOrder = pg_fetch_row(pg_query("Select name from meals where ID=$primaryKey;"));
        //Add meal to the queue
        $numberOfQueues = $numberOfQueues+1;
        $userID = $_SESSION['login_user'];
        $result = pg_query("INSERT INTO queue values ($primaryKey, '$userID', $numberOfQueues, false);");
        echo "Order of " .$mealToOrder. " was successful!";
    }
?>