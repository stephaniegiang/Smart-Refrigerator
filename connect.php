<?php
$conn_string = "host=web0.site.uottawa.ca port=15432 dbname=sgian032 user=sgian032 password=rvwf78rvwf78@23";
$dbconn4 = pg_connect($conn_string);

if(!$dbconn4){
	echo "Connection failed";
}
	echo "connection succeful";
	echo $dbconn4;

?>