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

<html>
<head>
     <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/login.css">

  <!-- font for foobox -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body style="background: url('img/indexf.jpg');">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <center><div class="logo">foobox.</div></center>
          <center><div class="slogan1">You are now registered. Account has to be approved by admin before use.</div></center>
        </div>
      </div>
  </div>
</body>
</html>
