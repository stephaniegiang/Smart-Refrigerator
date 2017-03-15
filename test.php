<?php
$conn_string = "host=web0.site.uottawa.ca port=15432 dbname=jolot104 user=jolot104 password=Projudah1064!";
$dbconn4 = pg_connect($conn_string);
if(!$dbconn4){
	echo "Connection failed";
}

$tab = pg_query($dbconn4, "set search_path = 'As'; Select message from test;");
if (!$tab) {
  echo "An error occurred.\n";
}
$row = pg_fetch_row($tab);
echo print_r($row);
?>
