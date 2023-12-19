<?php

$host = 'localhost'; 
$dbName = 'neeco1_consumer_billing'; 
$username = 'root'; 
$password = ''; 


$conn = mysqli_connect($host, $username, $password, $dbName);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>