<?php 
  include ('validateChef.php');
?>

<html>
<script language="JavaScript" type="text/javascript" src="../js/select.js"></script>
<link rel="stylesheet" href="../css/style.css">
<div style="margin-top:50px;margin-bottom:100px;">
 <h2>Enter meal details</h2>
 <form action="submitmeal.php" method="Post">
  <div class="col-md-5" style="width: 45%; background-color: white;">
    <label for="Mealname">Name</label>
    <input type="text" name="mealname" required="required" id="mealname" tabindex="1" class="form-control" placeholder="Meal Name" value="">
    <br/>
    <label for="Cuisinename">Cuisine</label>
    <input type="text" name="cuisinename" required="required" id="cuisinename" tabindex="1" class="form-control" placeholder="E.g Italian,Chinese.." value="">
    <br/>
    <label for="Price">Price</label>
    $<input type="number" name="price" required="required" id="price" tabindex="1" class="form-control" placeholder="$" value=""> <br/>
  </div>
  <div id="ingdiv" class="col-md-5" style=" height: 45%; width: 45%;">
    <h1>Ingredients</h1>
    <ul id="inglist">
    </ul>
  </div>
  <div>
    <h1>Select your ingredients</h1>
    <div style="width: 45%; position: relative;" >
      <label for="ing">Ingredient</label>
      <select class="form-control" id="ing" name="ing">
        <?php
        require('../connect.php');
        $setPath = pg_query("Set search_path='foobox';");
        $getMeals = pg_query("Select * from ingredient;");
        while($row = pg_fetch_array($getMeals)){
          echo '<option class="op" value="'.$row["id"]. '"">' .$row["name"].'</option>';
        }
        ?>
      </select>

    <label for="amount">Amount</label>
    <input type="number" name="amount" required="required" id="amount" tabindex="1" class="form-control" placeholder="1,2,3.." value="">
    <p id="ning" class="btn btn-primary" style="position: absolute; right: 0px; margin-top: 10px; border-radius: 30px;">+</p>
    </div>
  </div>
  <button type ="submit" class="btn btn-primary" style="width: 25%; margin-top: 50px; ">Add Meal</button>
</form>
</div>
<script type="text/javascript">

  var name= document.getElementById("ing");
  var list = document.getElementById('inglist');
  var btn = document.getElementById('ning');
  btn.addEventListener("click", addinglist, false);

  function addinglist(){
    var amount= document.getElementById('amount');
    if(amount.value != ""){
    var list = document.getElementById('inglist');
    var name= document.getElementById("ing");
    list.innerHTML=list.innerHTML+"<li>"+ String(amount.value)+" "+String(name.options[name.selectedIndex].text) +"</li>";
    }else{
      alert("empty field");
    }

  }
</script>
</html>