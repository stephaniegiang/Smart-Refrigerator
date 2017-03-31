<html>
	<script language="JavaScript" type="text/javascript" src="../js/select.js"	></script>
    <div style="margin-top:50px;margin-bottom:100px;">
    	<h2> Received Orders</h2>
    	<div class="col-md-12">
        <select style="width:100%;min-height:50%;" id="sbOne" multiple="multiple">
          <?php
            require('../connect.php');
            $setPath = pg_query("Set search_path='foobox';");
            $getOrders = pg_query("Select * from orders where approved=true and received=false;");
            while($row = pg_fetch_row($getOrders)){
                $id = $row[1];
                echo $id;
                $ingredientName = pg_fetch_row(pg_query("select name from ingredient where id=$id;"));
                $ingredientName = $ingredientName[0];
              echo '<option class="op" value="'.$row[0]. '"">' .$ingredientName.'</br>(Amount:'.$row[2].' )<br>(Total Price: $'.$row[3].')<br>(Order Number: '.$row[0].')</option>';
            }
          ?>
        </select>
        <button style="width:100%;" onclick="populateOnce('sbOne','sbTwo')"type="button" class="btn btn-primary" id="left" value="<">Select Order</button>
		</div>
		<div class="col-md-12">
		<form action="submitReceivedOrders.php" method="post">
        <select name="list[]" style="width:100%;min-height:50%;" id="sbTwo" multiple="multiple">
        </select>
        <button style="width:100%;" type="submit" class="btn btn-primary" id="left" value="<">APPROVE</button>
        </form>
        <button style="width:100%;"onclick="populateOnce('sbTwo','sbOne')"type="button" class="btn btn-primary" id="left" value="<">Remove Selected</button>
        
		</div>

    </div>
  </html>