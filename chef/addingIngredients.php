<?php
   if(array_key_exists('input-name', $_POST) && array_key_exists('input-count', $_POST)
      && array_key_exists('input-price', $_POST) && array_key_exists('input-threshold', $_POST)){
        $name = $_POST['input-name'];
        $count = $_POST['input-count'];
        $price = $_POST['input-price'];
        $threshold = $_POST['input-threshold'];
        $type = $_POST['input-type'];
        require('../connect.php');
        $setPath = pg_query("Set search_path='foobox'");
        $findIngredient = pg_query("SELECT * FROM ingredient");
        $numOfIngredients = pg_num_rows($findIngredient);
        $ingredientNumber = $numOfIngredients+1;
        $result = pg_query("INSERT INTO Ingredient values ($ingredientNumber, '$name', '$type', $count, $price, $threshold, true);");
        $url = "chef.php?page=ingredients";
        $_SESSION['complete']= 'true';
        header("Location: $url");
  }
?>