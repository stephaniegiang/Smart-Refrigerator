<?php
 
    $conn_string = "Changed database logins and disconnected from GitHub";
    $dbconn4 = pg_connect($conn_string);

    if(!$dbconn4){
        echo "Connection failed";
    }
?>