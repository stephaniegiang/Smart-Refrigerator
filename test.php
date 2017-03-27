<?php

// any ini_set() for session configuration goes here when not using .user.ini

session_start();
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}
$_SESSION['count']++;

echo "Hello #" . $_SESSION['count'];
/*$conn_string = "host=web0.site.uottawa.ca port=15432 dbname=sgian032 user=sgian032 password=rvwf78rvwf78@23";
$dbconn4 = pg_connect($conn_string);
if(!$dbconn4){
	echo "Connection failed";
}
$tab = pg_query($dbconn4, "set search_path = 'foobox'; Select * from user_account;");
if (!$tab) {
  echo "An error occurred.\n";
}
$row = pg_fetch_row($tab);
echo print_r($row);*/
?>
