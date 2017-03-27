<?php
$meal = $_POST['mealname'];
$type = $_POST['cuisinename'];
$price = $_POST['price'];
$price = (string)$price;
require('../connect.php');
pg_query("set search_path='foobox';");
$ctable = pg_query("select count(id) from meals");
$number= pg_fetch_row($ctable)[0] +10;
$done = pg_query("
	insert into meals values($number, '$meal','$type', $price, true);
	");

//$url = "chef/chef.php?page=meal";

//header("Location: $url");
 ?>