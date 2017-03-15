<?php
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Submit PREssed";
    $con_string = "host=web0.site.uottawa.ca port=15432 dbname=sgian032 user=sgian032 password=rvwf78rvwf78@23";
    $con = pg_connect($con_string);
    $username = $_POST["username"];
    $password = $_POST["password"];
      echo $con;
    if($con){
      $result =pg_query($dbconn4, 
                      "set search_path = 'foobox';
                      select username,password 
                      from user_account 
                      where username= '$username' and password = '$password';
                      ");
       $myusename = pg_fetch_row($result);
       echo "ROW IS :$myusename[0]";
       echo " Column is: $myusename[1]";
    $count = pg_num_rows($result);
    $row = pg_fetch_assoc($result);
       echo $username;
    if($count == 1){
      //session_register($username);
      //$_SESSION['login_user'] = $username;
      echo "Welcome ".$row["USERNAME"].", you are authorized as: ".$row["TYPE"];
    }else {
            $error = "Your Login Name or Password is invalid";
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
                    <form id="register-form" action="" method="post" role="form" style="display: none;">
                      <div class="form-group">
                        <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                      </div>
                      <div class="form-group">
                        <select class ="form-control">
                          <option value = "customer">Customer</option>
                          <option value = "chef">Chef</option>
                          <option value = "admin">Admin</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
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
