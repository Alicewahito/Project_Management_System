<?php

$host = "localhost";
$dsn = 'mysql:host=127.0.0.1;dbname=project_hub';
$database = "project_hub";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;


//try{
//    $db = new PDO(
//        $dsn,
//        $username,
//        $password
//    );
//    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//} catch(PDOException $e) {
//    throw $e;
//}