<?php
    $dbhost = $_SERVER['localhost'];
    $dbport = $_SERVER['3306'];
    $dbname = $_SERVER['test'];
    $charset = 'utf8' ;

    $dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
    $username = $_SERVER['root'];
    $password = $_SERVER[''];

    $pdo = new PDO($dsn, $username, $password);
?>