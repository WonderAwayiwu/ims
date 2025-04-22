<?php
session_start();

// Check if the session variable is set
if (!isset($_SESSION['first_name'])) {
    header("Location: login.php"); // Redirect to login if the session is not set
    exit;
} else if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if the session is not set
    exit;
}

$first_name = htmlspecialchars($_SESSION['first_name']); // Safely retrieve the first name
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users - Inventory Management System</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dashboard.css">
    
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
                    <form action="database/user_add.php" class="appform" method="post">
                        <h1>Add User</h1>
                        <div>
                            <label for="firstname">First Name</label>
                            <input type="text" id="firstname" name="firstname" placeholder="Enter First Name">
                        </div>
                        <div>
                            <label for="lastname">Last Name</label>
                            <input type="text" id="lastname" name="lastname" placeholder="Enter Last Name">
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter Email">
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter Password">
                        </div>
                        <button type="submit"><i class="fa fa-plus"></i>Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="js/scripts.js"></script>

</body>

</html>