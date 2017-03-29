<html>
	<script language="JavaScript" type="text/javascript" src="../js/select.js"	></script>
    <div style="margin-top:50px;margin-bottom:100px;">
    	<h2> Approve Orders</h2>
    	<div class="col-md-5">
        <select style="width:100%;min-height:50%;" id="sbOne" multiple="multiple">
          <?php
            /*require('../connect.php');
            $setPath = pg_query("Set search_path='foobox';");
            $getOrders = pg_query("  SELECT STATEMENT GOES HERE   ");
            while($row = pg_fetch_array($getOrders)){
              echo '<option class="op" value="'.$row["id"]. '"">' .$row["name"].'</option>';
            }*/
          ?>
        </select>
        <button style="width:100%;" onclick="populateOnce('sbOne','sbTwo')"type="button" class="btn btn-default" id="left" value="<">Select Order</button>
		</div>
		<div class="col-md-5">
		<form action="orderingTheIngredient.php" method="post">
        <select name="list[]" style="width:100%;min-height:50%;" id="sbTwo" multiple="multiple">
        </select>
        <button style="width:100%;" type="submit" class="btn btn-default" id="left" value="<">APPROVE</button>
        </form>
        <button style="width:100%;"onclick="populateOnce('sbTwo','sbOne')"type="button" class="btn btn-default" id="left" value="<">Remove Selected</button>
        
		</div>

    </div>
  </html>