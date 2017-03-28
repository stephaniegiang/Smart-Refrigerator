<?php
    require('connect.php');
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $submit = pg_query(
        "set search_path = 'foobox'; Insert into User_Account(Name, Username, Password, Category) values ('$name', '$username', '$password', '$role');");
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
