<html>
	<script language="JavaScript" type="text/javascript" src="../js/select.js"	></script>
    <div style="margin-top:50px;margin-bottom:100px;">
    	<h2> Select your ingredients</h2>
    	<div class="col-md-5">
        <select style="width:100%;min-height:50%;" id="sbOne" multiple="multiple">
          <?php
            require('../connect.php');
            $setPath = pg_query("Set search_path='foobox';");
            $getIngredients = pg_query("Select * from Ingredient;");
            while($row = pg_fetch_array($getIngredients)){
              echo '<option class="op" value="'.$row["id"]. '"">' .$row["name"].'</option>';
            }
          ?>
        </select>
        <button style="width:100%;" onclick="populateOnce('sbOne','sbTwo')"type="button" class="btn btn-default" id="left" value="<">Select Ingredient</button>
		</div>
		<div class="col-md-5">
        <select style="width:100%;min-height:50%;" id="sbTwo" multiple="multiple">
        </select>
        <button style="width:100%;"onclick="populateOnce('sbTwo','sbOne')"type="button" class="btn btn-default" id="left" value="<">Remove Selected</button>
        <button style="width:100%;"onclick="<?php//STATEMENT TO PLACE ORDER GOES HERE?>"type="button" class="btn btn-default" id="left" value="<">ORDER</button>
		</div>

    </div>
  </html>