<?php

$dsn = "mysql:dbname=miroSecurity;host=127.0.0.1";
$pdo = new PDO($dsn, 'root', '');
$query = "SELECT * FROM `pictures` ";
$stmt = $pdo->query($query);
$all = $stmt->fetchAll();


