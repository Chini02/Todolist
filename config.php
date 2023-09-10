<?php
try {
    // dbname , host , user , pswd
    $host     = "localhost";
    $dbname   = "todolist";
    $user     = "root";
    $password = "";
    // connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "ERROR is " . $e->getMessage(); 
}


?>