<?php
    include ('validateChef.php');
  //grab selected values
  $values = $_POST['list'];
  //log into database
  require('../connect.php');
  pg_query("set search_path='foobox';");

  //Loop through each selection, deleting the ingredient
  foreach ($values as $primaryKey){
    pg_query("Update meals set active=false where ID=$primaryKey;");
    pg_query("update relations set active=false where mealid=$primaryKey;");
  }
  include("../php_includes/session.php");
  $_SESSION['complete']= 'true';
  $url = "chef.php?page=deletemeal";
  header("Location: $url");
?>