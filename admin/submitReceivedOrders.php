<?php
    include ('validateAdmin.php');
    //grab selected values
    $values = $_POST['list'];
    //log into database
    require('../connect.php');
    $query = pg_query("set search_path='foobox';");

    //Loop through each selection and adding it to the history
    foreach ($values as $primaryKey){
        pg_query("update orders set received=true where id='$primaryKey';");
        $ingredientInfo = pg_fetch_row(pg_query("select ingredient_id, amount from orders where id='$primaryKey';"));
        $ingredientID = $ingredientInfo[0];
        $amount = $ingredientInfo[1];
        $count = pg_fetch_row(pg_query("select count from ingredient where id=$ingredientID;"));
        $count = $count[0]+$amount;
        pg_query("update ingredient set count=$count where id=$ingredientID");
    }

    $url = "admin.php?page=orders";
    include("../php_includes/session.php");
    $_SESSION['complete']= 'true';
    header("Location: $url");
?>