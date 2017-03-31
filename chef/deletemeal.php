<?php 
  include ('validateChef.php');
?>
<html>
	<script language="JavaScript" type="text/javascript" src="../js/select.js"	></script>
    <div style="margin-top:50px;margin-bottom:100px;">
    	<h2> Delete Meal</h2>
    	<div class="col-md-5">
        <select style="width:100%;min-height:50%;" id="sbOne" multiple="multiple">
          <?php
            require('../connect.php');
            $setPath = pg_query("Set search_path='foobox';");
            $getIngredients = pg_query("select * from meals as meal where NOT EXISTS (select * from queue where mealsid= meal.id and completed=false) and active=true;");
            while($row = pg_fetch_array($getIngredients)){
              echo '<option class="op" value="'.$row["id"]. '"">' .$row["name"].'</option>';
            }
          ?>
        </select>
        <button style="width:100%;" onclick="populateOnce('sbOne','sbTwo')"type="button" class="btn btn-primary" id="left" value="<">Select Meal</button>
		</div>
		<div class="col-md-5">
		<form action="submitDeleteMeal.php" method="post">
        <select name="list[]" style="width:100%;min-height:50%;" id="sbTwo" multiple="multiple">
        </select>
        <button style="width:100%;" type="submit" class="btn btn-primary" id="left" value="<">DELETE</button>
        </form>
        <button style="width:100%;"onclick="populateOnce('sbTwo','sbOne')"type="button" class="btn btn-primary" id="left" value="<">Remove Selected</button>
        
		</div>

    </div>
  </html>