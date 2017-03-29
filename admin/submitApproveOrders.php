<?php
    include ('validateAdmin.php');
    //grab selected values
    $values = $_POST['list'];
    //log into database
    require('../connect.php');
    $query = pg_query("set search_path='foobox';");

    //Loop through each selection and adding it to the history
    foreach ($values as $primaryKey){
        pg_query("update orders set approved=true where id='$primaryKey';");
    }

    $url = "admin.php?page=orders";
    header("Location: $url");
?>