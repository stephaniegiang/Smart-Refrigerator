<?php
    $dbhost = $_SERVER['localhost'];
    $dbport = $_SERVER['90'];
    $dbname = $_SERVER['test.user'];
    $charset = 'utf8' ;

    $dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
    $username = $_SERVER['root'];
    $password = $_SERVER['password'];

    $pdo = new PDO($dsn, $username, $password);
?>