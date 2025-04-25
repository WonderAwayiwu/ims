<?php
session_start();

// Check if the session variable is set
if (!isset($_SESSION['first_name'])) {
    header("Location: login.php"); // Redirect to login if the session is not set
    exit;
}else if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if the session is not set
    exit;
}
$user = $_SESSION['user']; // Retrieve the user details from the session
$users = include('database/show-users.php'); // Include the file to get users data

$first_name = htmlspecialchars($_SESSION['first_name']); // Safely retrieve the first name
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventory Management System</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dashboard1.css">
</head>

<body>
    <!-- Main container -->
    <div id="dashboardMainContainer">

        <!-- Sidebar -->
         <?php include 'reuseables/sidebar.php'; ?>

        <!-- Content container -->
        <div class="dashboard-content-container" id="dashboard_content">
            <?php include 'reuseables/navbar.php'; ?>
            <div class="dashboard-content">
                <div class="dashboard-content-main">
                    <h1>Welcome to the Dashboard</h1>
                    <p>This is your main content area.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="js/scripts.js"></script>

</body>

</html>