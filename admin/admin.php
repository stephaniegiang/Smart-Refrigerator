<?php 
	include('validateAdmin.php');
?>

<html>
  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
	<?php 
		include('../php_includes/header.php');
		$page = $_GET['page'];
	?>
    <div class="container" style="margin-top:-20px;">
        <div class="row">
                <div class="col-lg-3 col-sm-3 sidebar" style="">
                   <!--<h3>Investors</h3>-->

                   <ul class="nav nav-pills nav-stacked pills"style="">
                      <li <?php if ($_GET['page'] === 'approve') echo 'class="active"';?>id=""><a onclick="" href="?page=approve">APPROVE USERS</a></li>
                      <li <?php if ($_GET['page'] === 'delete') echo 'class="active"';?>id=""><a onclick="" href="?page=delete">DELETE USERS</a></li>
                      <li <?php if ($_GET['page'] === 'orders') echo 'class="active"';?>id=""><a onclick="" href="?page=orders">APPROVE ORDERS</a></li>
                      <li <?php if ($_GET['page'] === 'reports') echo 'class="active"';?>id=""><a onclick="" href="?page=reports">VIEW REPORTS</a></li>
                      <li <?php if ($_GET['page'] === 'help') echo 'class="active"';?>><a id="help" onclick="" href-"customer.php/?page=help">HELP</a></li>
                   </ul>
                </div>
                <!-- end of sidebar thing-->
                <div class="col-lg-9 col-sm-9 main"
                <?php if (($page)=== 'approve')
                		include('approveusers.php');
					elseif(($page ==='delete'))
						include('deleteusers.php');
					elseif(($page ==='orders'))
						include('orders.php');
					elseif(($page ==='reports'))
						include('viewreports.php');
                ?>
              </div>
          </div>
      </div>
  </body>
</html>
