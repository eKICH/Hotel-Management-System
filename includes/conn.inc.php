<?php

// Declare connection variables
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "hms";

// Creare the connection
$conn = Mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("connection Failed: ".Mysqli_connect_error());
}


?>