<?php
    require('connect.php');
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $submit = pg_query(
        "set search_path = 'foobox'; Insert into user_account values ('$name', '$username', '$password', '$role', false, false);");
      if($submit){
        if($role == 'user'){
            header("Location: customer/customer.php?page=meal");
        }
        if($role == 'chef'){
            header("Location: Chef/Chef.php?page=meal");
        }
        if($role == 'admin'){
            header("Location: customer/customer.php?page=meal");
        }
    }
      else
        echo "could not connect. welp";
?>
