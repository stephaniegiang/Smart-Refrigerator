<?php
    $url = "customer/customer.php/?page=meal";
  //if(isset($_SESSION['login_user'])){
    //header($url);
  //}
   if($_SERVER["REQUEST_METHOD"] == "POST") {
       //connect to database
     $con = require('connect.php');
     //Grab the form information for login
       $username = $_POST["username"];
       $password = $_POST["password"];

       //If a connection happens
       if($con){
           //check to see if the username and password is valid
           $result =pg_query(
            "set search_path = 'foobox'; select name,category,username,password from user_account where username='$username' and password = '$password' and approve=true and deleted=false;");
           $my = pg_fetch_row($result);
           $count = pg_num_rows($result);
           $row = pg_fetch_assoc($result);
           if($username == $my[2]){
               //Start session
               unset($_SESSION);
               include("php_includes/session.php");
               echo "Welcome ".$my[0].", you are authorized as: ".$my[1];
               //Save the login information to session
               $_SESSION['login_user']= $username;
               $_SESSION['login_type']= $my[1];
               $_SESSION['login_name']= $my[0];

               if ($_SESSION['login_type'] == 'admin'){
                   $url = "admin/admin.php";
               }else if ($_SESSION['login_type'] == 'chef'){
                   $url = "Chef/chef.php?page=queue";
               }else if ($_SESSION['login_type'] == 'customer'){
                   $url = "customer/customer.php?page=meal";
               }
                header("Location: $url");
       }else {
           echo "Your Login Name or Password is invalid";
       }
   }
 }
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  </head>
  <body
    <div class="container">
          <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <a href="#" class="active" id="login-form-link">Login</a>
                  </div>
                  <div class="col-xs-6">
                    <a href="#" id="register-form-link" onclick="login();">Register</a>
                  </div>
                </div>
                <hr>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-12">
                    <form id="login-form" action="index.php" method="post" role="form" style="display: block;">
                      <div class="form-group">
                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group text-center">
                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                        <label for="remember"> Remember Me</label>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-lg-12">
                          </div>
                        </div>
                      </div>
                    </form>
                    <form id="register-form" action="register.php" method="post" role="form" style="display: none;">
                      <div class="form-group">
                        <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="">
                      </div>
                      <div class="form-group">
                        <input type="text" name="username" id="username" tabindex="2" class="form-control" placeholder="Username" value="">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="3" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <input type="password" name="confirm-password" id="confirm-password" tabindex="4" class="form-control" placeholder="Confirm Password">
                      </div>
                      <div class="form-group">
                        <select class ="form-control" name="role" id="role" tabindex="5">
                          <option selected value="customer">Customer</option>
                          <option value="chef">Chef</option>
                          <option value="admin">Admin</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="register-submit" id="register-submit" tabindex="6" class="form-control btn btn-register" value="Register Now">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script language="JavaScript" type="text/javascript" src="js/login.js"></script>
  </body>
</html>
