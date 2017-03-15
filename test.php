<?php
    $con_string = "host=web0.site.uottawa.ca port=15432 dbname=jolot104 user=jolot104 password=***REMOVED***";
    $con = pg_connect($con_string);
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($con){
      $result =pg_query($dbconn4,"set search_path = 'As'; select message from test;");
       $my = pg_fetch_row($result);
       echo print_r($my);
       echo $my[0];
     }
?>
