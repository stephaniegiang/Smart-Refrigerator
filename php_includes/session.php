<?php
	//db name: $dbconn4 idk why its named that
   	include('config.php');
	  if (!isset($_SESSION['login_user']))
	   {
	      session_start();
	   }
	$user_check = $_SESSION['login_user'];
	
	$ses_sql = pg_query($dbconn4,"set search_path = 'foobox'; SELECT name, username, category FROM user_account WHERE username = '$user_check';");
	$row = pg_fetch_assoc($ses_sql);
	$login_session = $row['username'];
	if(!isset($login_session)){
		pg_close($dbconn4);
		header('../index.php');
	}





/*
   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }*/
?>