<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    $con_string = "host=web0.site.uottawa.ca port=15432 dbname=sgian032 user=sgian032 password=***REMOVED***";
    $con = pg_connect($con_string);

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST['role'];

    if($con){
      $submit = pg_query($con, "set search_path = 'foobox'; Insert into User_Account(Name, Username, Password, Category) values ('".$name."', '".$username."', '".$password."', '".$role[0]."')");
      if($submit)
        echo "Thanks, ".$username." You are now registered as a ".$role[0].". (and eventually redirected once its implemented";
      else
        echo "could not connect. welp";
     }

  }
?>
