<?php
session_start();

if(isset($_SESSION['first_name'])) {
    header("Location: dashboard.php"); // Redirect to dashboard if already logged in
    exit;
} else if (isset($_SESSION['username'])) {
    header("Location: dashboard.php"); // Redirect to dashboard if already logged in
    exit;
}

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    include 'database/connection.php';

    $result = $conn->query("select * from users where email='$username' and password='$password'");
    $data = $conn->query("select * from users")->fetch_assoc(); 
    if ($user = $result->fetch_assoc()) {
        $data = $conn->query("select * from users")->fetch_assoc(); 
        $_SESSION['user'] = $user; // Store the user details in the session
        $_SESSION['first_name'] = $user['first_name']; // Store the first name in the session
        $_SESSION['username'] = $user['email']; // Store the username in the session
         
        header("location: dashboard.php");
       

        exit;
    } else {
        echo "<script>alert('Invalid username or password');</script>";
        echo "<script>window.location.href='login.php';</script>";
    }
    $conn->close();
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS Login - Inventory Management System</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body id="loginBody">
    <div class="container">
        <div class="loginHeader">
            <h1>IMS</h1>
            <p>Inventory Management System</p>
        </div>
        <div class="loginBody">
            <form action="#" method="post">
                <div class="loginInputContainer">
                    <label for="">Username</label>
                    <input type="text" placeholder="Enter your username" name="username">
                </div>
                <div class="loginInputContainer">
                    <label for="">Password</label>
                    <input type="password" placeholder="Enter your password" name="password">
                </div>
                <div class="loginButtonContainer">
                    <button>Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>