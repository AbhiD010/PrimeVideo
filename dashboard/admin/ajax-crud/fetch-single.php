<?php
include ('../db2.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM register WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if(!empty($user['image'])){
            $user['image'] = base64_encode($user['image']);
        }
        echo json_encode($user);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
}
?>
