<html>
<script language="JavaScript" type="text/javascript" src="../js/select.js"></script>
<div style="margin-top:50px;margin-bottom:100px;">
 <h2>Enter meal details</h2>
 <form action="submitmeal.php" method="Post">
  <div style="width: 45%; background-color: white;">
    <label for="Mealname">Name</label>
    <input type="text" name="mealname" required="required" id="mealname" tabindex="1" class="form-control" placeholder="Meal Name" value="">
    <br/>
    <label for="Cuisinename">Cuisine</label>
    <input type="text" name="cuisinename" required="required" id="cuisinename" tabindex="1" class="form-control" placeholder="E.g Italian,Chinese.." value="">
    <br/>
    <label for="Price">Price</label>
    $<input type="number" name="price" required="required" id="price" tabindex="1" class="form-control" placeholder="$" value=""> <br/>
  </div>
  <div>
    <h1>Select your ingredients</h1>
    <div class="col-md-5">
      <select  style="width:100%;min-height:50%;" id="sbOne" multiple="multiple">
        <?php
        require('../connect.php');
        $setPath = pg_query("Set search_path='foobox';");
        $getMeals = pg_query("Select * from ingredient;");
        while($row = pg_fetch_array($getMeals)){
          echo '<option class="op" value="'.$row["id"]. '"">' .$row["name"].'</option>';
        }
        ?>
      </select>
      <button style="width:100%;" onclick="populateOnce('sbOne','sbTwo')"type="button" class="btn btn-default" id="left" value="<">Select Meal</button>
    </div>
    <div class="col-md-5">
      <select name="sbTwo" style="width:100%;min-height:50%;" id="sbTwo" multiple="multiple">
      </select>
      <button style="width:100%;"onclick="populateOnce('sbTwo','sbOne')"type="button" class="btn btn-default" id="left" value="<">Remove Selected</button>
    </div>
  </div>
  <button type ="submit" class="btn btn-primary" style="width: 25%; margin-top: 10px; ">Add</button>
</form>


</div>

</html>