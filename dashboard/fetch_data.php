<?php
include 'db.php';

// Fetch total users
$total_users = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];

// Fetch active subscriptions
$active_subscriptions = $conn->query("SELECT COUNT(*) AS total FROM users WHERE subscription_status = 'active'")->fetch_assoc()['total'];

// Fetch total videos
$total_videos = $conn->query("SELECT COUNT(*) AS total FROM videos")->fetch_assoc()['total'];

// Fetch total video views
$total_views = $conn->query("SELECT SUM(views) AS total FROM videos")->fetch_assoc()['total'];

$conn->close();
?>
