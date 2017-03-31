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
		if(isset($_GET['page']))
			$page = $_GET['page'];
		else($page = 'approve');
		
	?>
    <div class="container" style="margin-top:-20px;">
        <div class="row">
                <div class="col-lg-3 col-sm-3 sidebar" style="">
                   <!--<h3>Investors</h3>-->

                   <ul class="nav nav-pills nav-stacked pills"style="">
                      <li <?php if ($page === 'approve')echo 'class="active"';?>id=""><a onclick="" href="?page=approve">APPROVE USERS</a></li>
                      <li <?php if ($page === 'delete') echo 'class="active"';?>id=""><a onclick="" href="?page=delete">DELETE USERS</a></li>
                      <li <?php if ($page === 'orders') echo 'class="active"';?>id=""><a onclick="" href="?page=orders">APPROVE ORDERS</a></li>
					  <li <?php if ($page === 'received') echo 'class="active"';?>id=""><a onclick="" href="?page=received">RECEIVED ORDERS</a></li>                      
                      <li <?php if ($page === 'reports') echo 'class="active"';?>id=""><a onclick="" href="?page=reports">VIEW REPORTS</a></li>
                      <li <?php if ($page === 'ingredients') echo 'class="active"';?>id=""><a onclick="" href="?page=ingredients">INGREDIENT REPORT</a></li>
                      <li <?php if ($page === 'help') echo 'class="active"';?>><a id="help" onclick="" href="?page=help">HELP</a></li>
                   </ul>
                </div>
                <!-- end of sidebar thing-->
                <div class="col-lg-9 col-sm-9 main"
                <?php if (($page)=== 'approve')
                		include('approveusers.php');
					elseif(($page ==='delete'))
						include('deleteusers.php');
					elseif(($page ==='orders'))
						include('vieworders.php');
					elseif(($page ==='reports'))
						include('viewreports.php');
					elseif(($page ==='received'))
						include('receivedorders.php');
					elseif(($page ==='ingredients'))
						include('ingredients.php');						
            		elseif(($page ==='help'))
            			include('help.php');					
					else {
						$page='approve';
						include('approveusers.php');
					}
                ?>
              </div>
          </div>
      </div>
  </body>
</html>
