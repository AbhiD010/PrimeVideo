<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$port = 3307;
$database = 'primevideoweb';

$conn = mysqli_connect($host, $username, $password, $database, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $image = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); // Read and escape image data
    }
    else {
        echo "Image upload failed. Error code: " . $_FILES['image']['error'];
        exit;
    }

    $query = "INSERT INTO register (image, name, mobile, email, password, role) 
              VALUES ('$image', '$name', '$mobile', '$email', '$password', '$role')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "Successfully Stored";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "All fields are required!";
}


// if ($_POST) {
//     $name = $_POST['name'];
//     $mobile = $_POST['mobile'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $role = $_POST['role'];

//     if (empty($name) || empty($mobile) || empty($email) || empty($password) || empty($role)) {
//         echo json_encode(['status' => 'error', 'message' => 'All fields are required!']);
//         exit;
//     }

//     $image_data = null;
//     if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
//         $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
//         $image_type = mime_content_type($_FILES['image']['tmp_name']);
//         if (!in_array($image_type, $allowed_types)) {
//             echo json_encode(['status' => 'error', 'message' => 'Invalid image format. Only JPEG, PNG, and GIF are allowed.']);
//             exit;
//         }

//         $image_data = file_get_contents($_FILES['image']['tmp_name']);
//         $image_data = mysqli_real_escape_string($conn, $image_data); 
//     }

//     $query = "INSERT INTO register (name, mobile, email, password, role,image) VALUES ('$name', '$mobile', '$email', '$password', '$role', '$image_data')";
//     $query_run = mysqli_query($conn, $query);

//     if ($query_run) {
//         echo json_encode(['status' => 'success', 'message' => 'User added successfully!']);
//     } else {
//         echo json_encode(['status' => 'error', 'message' => 'Failed to add user. Error: ' . mysqli_error($conn)]);
//     }
// }
?>

