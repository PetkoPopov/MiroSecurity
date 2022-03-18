<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "CREATE DATABASE IF NOT EXISTS miros;";
    // use exec() because no results are returned
    $conn->exec($sql);
    
    $sql = "CREATE TABLE `miros`.`pictures`
        ( `id` INT NOT NULL AUTO_INCREMENT ,
        `pics` VARCHAR(200) NOT NULL , 
        `title` VARCHAR(222) NOT NULL ,
        `question` VARCHAR(222) NOT NULL ,
        `answer` VARCHAR(222) NOT NULL ,
        PRIMARY KEY (`id`)) ENGINE = InnoDB";
    $conn->exec($sql);
  echo "Database miroS end table mirosecurity created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>