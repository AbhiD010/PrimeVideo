<?php
include 'fetch_data.php';
?>
<?php 
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard <?php $_SESSION['username'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
            <h3 class="text-center">Admin Panel</h3>
            <ul class="nav flex-column mt-4">
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">Users</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">Content</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">Analytics</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">Settings</a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid p-4">
            <h1 class="mb-4">Welcome, Admin</h1>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text"><?= $total_users; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Active Subscriptions</h5>
                            <p class="card-text"><?= $active_subscriptions; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Videos</h5>
                            <p class="card-text"><?= $total_videos; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Views</h5>
                            <p class="card-text"><?= $total_views; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
