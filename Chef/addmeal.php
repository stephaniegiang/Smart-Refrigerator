<html>
	<script language="JavaScript" type="text/javascript" src="../js/select.js"></script>
    <div style="margin-top:50px;margin-bottom:100px;">
    	<h2>Enter meal details</h2>
      <div style="width: 45%; background-color: white;">
      <form action="submitmeal.php" method="Post">
        <label for="Mealname">Name</label>
        <input type="text" name="mealname" required="required" id="mealname" tabindex="1" class="form-control" placeholder="Meal Name" value="">
        <br/>
        <label for="Cuisinename">Cuisine</label>
        <input type="text" name="cuisinename" required="required" id="cuisinename" tabindex="1" class="form-control" placeholder="E.g Italian,Chinese.." value="">
        <br/>
        <label for="Price">Price</label>
        $<input type="number" name="price" required="required" id="price" tabindex="1" class="form-control" placeholder="$" value=""> <br/>

        <button type ="submit" class="btn btn-primary" style="width: 50%;">Add</button>
        </form>

      </div>
    </div>
    
  </html>