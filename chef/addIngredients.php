<html>
<script language="JavaScript" type="text/javascript" src="../js/select.js"></script>
<form id="formID" name="formID" method="post" action="addingIngredients.php" role="form">
        <div style="width: 45%;">
        <h1>Enter Ingredient details</h1>
          <!-- INGREDIT NAME -->
          <div class="row">
            <div class="form-group-xs">
              <label for="input-name">Ingredient Name</label>
              <input name ="input-name" type="name" class="form-control" id="input-name" required autofocus/>
            </div>
          </div>
          <!-- NUMBER OF INGREDIENTS -->
          <div class="row">
            <div class="form-group-xs">
              <label for="input-count">Number of Ingredients</label>
              <input name ="input-count" type="name" class="form-control" id="input-count" placeholder="5" required />
            </div>
          </div>
          <!-- PRICE -->
          <div class="row">
            <div class="form-group-xs">
              <label for="input-price">Price Per Item($)</label>
              <input name ="input-price" type="name" class="form-control" id="input-price" placeholder="12.50" required />
            </div>
          </div>
          <!-- THRESHOLD -->
          <div class="row">
            <div class="form-group-xs">
              <label for="input-threshold">Threshold</label>
              <input name ="input-threshold" type="name" class="form-control" id="input-threshold" placeholder="1" required />
            </div>
          </div>
          <!-- FOOD TYPE -->
            <div class="row">
            <div class="form-group-xs">
              <!-- FETCH ALL POSSIBLE CUISINE TYPES IN HERE -->
              <label for="input-type">Type of Food</label>
              <select name = "input-type" id = "input-type" method= "post" class="form-control">
                <option>Dairy</option>
                <option>Vegetable</option>
                <option>Fruit</option>
                <option>Meat</option>
                <option>Grain</option>
                <option>Juice</option>
              </select>
            </div>
          </div>
          
          <div class="text-center" style="margin-top:20px">
            <button name="add-item" id="add-item" type="submit" class="btn btn-primary"><strong>Add Ingredient</strong></button>
          </div>
        </div>
      </form>
</html>