<?php 
  include ('validateChef.php');
?>

<html>
  <head>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script language="JavaScript" type="text/javascript" src="../js/select.js"></script>
  </head>

  <body>
    <?php 
      include('../php_includes/header.php');
     	if(isset($_GET['page']))
			$page = $_GET['page'];
		else($page = 'meal');
    ?>
    <div class="container" style="margin-top:-20px;">
        <div class="row">
                <div class="col-lg-3 col-sm-3 sidebar" style="">
                   <!--<h3>Investors</h3>-->
                   <ul class="nav nav-pills nav-stacked pills"style="">
                      <li <?php if ($_GET['page'] === 'meal') echo 'class="active"';?>id=""><a onclick="" href="?page=meal">ADD MEAL</a></li>
                      <li <?php if ($_GET['page'] === 'ingredients') echo 'class="active"';?>id=""><a onclick="" href="?page=ingredients">ADD INGREDIENTS</a></li>
                      <li <?php if ($_GET['page'] === 'orderingredients') echo 'class="active"';?>id=""><a onclick="" href="?page=orderingredients">ORDER INGREDIENTS</a></li>
                      <li <?php if ($_GET['page'] === 'queue') echo 'class="active"';?>id=""><a onclick="" href="?page=queue">VIEW QUEUE</a></li>
                      <li <?php if ($_GET['page'] === 'report') echo 'class="active"';?>id=""><a onclick="" href="?page=report">MEALS REPORT</a></li>
                      <li <?php if ($_GET['page'] === 'help') echo 'class="active"';?>><a id="help" onclick="" href="customer.php/?page=help">HELP</a></li>
                   </ul>
                </div>
                <!-- end of sidebar thing-->
                <div class="col-lg-9 col-sm-9 main"
                  <?php if (($page)=== 'meal')
                          include('addmeal.php');
              elseif(($page ==='ingredients'))
                  include('addIngredients.php');
                        elseif(($page ==='queue'))
                          include('viewqueue.php');
                        elseif(($page ==='report'))
                          include('report.php');
                        elseif(($page ==='orderingredients'))
                        include('orderingredients.php');                  ?>
              </div>
          </div>
      </div>
  </body>
</html>
