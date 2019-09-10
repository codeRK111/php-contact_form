<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact";
header('Access-Control-Allow-Origin: *'); // To avoid cors

// ---------------------------------------- Set connection -----------------------------------------------
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
{
     die("Connection failed: " . $conn->connect_error);
} 


?>