<?php 
	include('config.php');
	include('session.php');
?>
<html>
  <head>
      <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>

  <body>
    <nav role="navigation" class="navbar navbar-default" style="color:#CACFD6;">
        <div class="container">
            <div class="navbar-header">
                <p class="navbar-brand">Welcome, <?php /*echo $_SESSION['login_name']; */?></p>
            </div>
            

            <ul class="nav navbar-nav navbar-right">
                  <li><a href="../../logout.php">Log out</a></li>
            </ul>
        </div>
    </nav>

  </body>
</html>
