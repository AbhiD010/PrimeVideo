<?php
include('db2.php'); // Include your database connection file

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare the DELETE SQL query
    $query = "DELETE FROM register WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode([
            "status" => "success",
            "message" => "User deleted successfully",
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Failed to delete user",
        ]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request",
    ]);
}
?>
