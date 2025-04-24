<?php
include('../db2.php');

// Enable detailed error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    if ($_POST) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Check if a new image is uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $query = "UPDATE register SET name='$name', mobile='$mobile', email='$email', password='$password', role='$role', image='$image' WHERE id=$id";
        } else {
            $query = "UPDATE register SET name='$name', mobile='$mobile', email='$email', password='$password', role='$role' WHERE id=$id";
        }

        // Execute the query
        if (mysqli_query($conn, $query)) {
            echo "User updated successfully!";
        } else {
            throw new Exception("Query execution failed: " . mysqli_error($conn));
        }
    } else {
        throw new Exception("No data received.");
    }
} catch (mysqli_sql_exception $e) {
    echo "Database error: " . $e->getMessage();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
