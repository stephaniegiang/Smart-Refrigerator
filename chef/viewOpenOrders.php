<?php 
  include ('validateChef.php');
?>
<html>
	<script language="JavaScript" type="text/javascript" src="../../js/select.js"	></script>
	<div style="margin-top:50px;margin-bottom:100px;">
		<h1>Approved Orders</h1>
        <ul>
            <?php
            require('../connect.php');
            $setPath = pg_query("Set search_path='foobox';");
            $getOrders = pg_query("Select * from orders where approved=true and received=false;");
            while($row = pg_fetch_row($getOrders)){
                $id = $row[1];
                $ingredientName = pg_fetch_row(pg_query("select name from ingredient where id=$id;"));
                $ingredientName = $ingredientName[0];
              echo '<li>Ingredient: ' .$ingredientName.'</br>Amount:'.$row[2].' <br>Total Price: $'.$row[3].'<br>Order Number: '.$row[0].'</li>';
            }
          ?>
        </ul>
        <h1>Awaiting Approval Orders</h1>
        <ul>
            <?php
            require('../connect.php');
            $setPath = pg_query("Set search_path='foobox';");
            $getOrders = pg_query("Select * from orders where approved=false and received=false;");
            while($row = pg_fetch_row($getOrders)){
                $id = $row[1];
                $ingredientName = pg_fetch_row(pg_query("select name from ingredient where id=$id;"));
                $ingredientName = $ingredientName[0];
              echo '<li>Ingredient: ' .$ingredientName.'</br>Amount:'.$row[2].' <br>Total Price: $'.$row[3].'<br>Order Number: '.$row[0].'</li>';
            }
          ?>
        </ul>
</html>        