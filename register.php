<?php
    require('connect.php');
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $submit = pg_query("set search_path = 'foobox'; Insert into User_Account(Name, Username, Password, Category) values ('$name', '$username', '$password', '$role[0]');");
      if($submit)
        echo "Thanks, ".$username." You are now registered as a ".$role.". (and eventually redirected once its implemented";
      else
        echo "could not connect. welp";
?>
