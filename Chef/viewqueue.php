<?php 
  include ('validateChef.php');
?>

<html>
<script language="JavaScript" type="text/javascript" src="../js/select.js"	></script>
<div style="margin-top:50px;margin-bottom:100px;">
    <h2> Current Orders</h2>
    <div class="col-md-5">
        <select style="width:100%;min-height:50%;" id="sbOne" multiple="multiple">
            <?php
                require('../connect.php');
                $setPath = pg_query("Set search_path='foobox';");
                $getOrders = pg_query("Select * from queue where completed=false;");
                while($row = pg_fetch_array($getOrders)){
                    $idOfMeal = $row["mealsid"];
                    $nameOfMeal = pg_fetch_array(pg_query("select name from meals where id=$idOfMeal;"));
                    echo '<option class="op" value="'.$row[2]. '"">' .$nameOfMeal[0].' (Order #' .$row[2].' for '.$row[1].')</option>';
                }
            ?>
        </select>
        <button style="width:100%;" onclick="populateOnce('sbOne','sbTwo')"type="button" class="btn btn-default" id="left" value="<">Select Order</button>
    </div>
    <div class="col-md-5">
        <form action="completeOrders.php" method="post">
            <select name="list[]" style="width:100%;min-height:50%;" id="sbTwo" multiple="multiple">
            </select>
            <button style="width:100%;" type="submit" class="btn btn-default" id="left" value="<">ORDER(S) COMPLETED</button>
        </form>
        <button style="width:100%;"onclick="populateOnce('sbTwo','sbOne')"type="button" class="btn btn-default" id="left" value="<">Remove Selected</button>

    </div>

</div>
</html>