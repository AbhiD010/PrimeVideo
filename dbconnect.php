<?php
$servername = "localhost"; // Change to your server (e.g., 127.0.0.1 or domain)
$username = "root";        // Default username for local setups
$password = ""; 
$port = "3307" ;         // Default password (leave blank for XAMPP/WAMP)
$dbname = "primevideoweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if (!$conn) {
//     echo "Connected successfully";
// }
// else{
    die("Connection failed: " . mysqli_connect_error());

}


?>