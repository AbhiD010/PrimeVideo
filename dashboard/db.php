<?php
$host = "localhost";
$username = "root";
$password = "";
$port = "3307" ;
$dbname = "primevideoweb";

$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
