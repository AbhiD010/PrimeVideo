
<?php 
 
 $host = 'localhost';
 $username = 'root';
 $password = ''; // Replace with your actual password
 $port = 3307; // Ensure this is an integer, not a string 
 $database = 'primevideoweb';
 
 $conn = mysqli_connect($host, $username, $password, $database, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
$query = "SELECT * FROM register";
$query_run = mysqli_query($conn, $query);
$result_array = [];

if($query_run && mysqli_num_rows($query_run) > 0){

    foreach($query_run as $rows)
    {
        $rows['image'] = base64_encode($rows['image']);
        array_push($result_array, $rows);
    }
    header('content-type: application/json');
    echo json_encode($result_array);
}
else{
    header('Content-Type: application/json');
    echo json_encode(['message' => 'No records found']);
}

?>