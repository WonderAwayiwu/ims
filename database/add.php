<?php 
session_start();
   
    $table_name = $_SESSION['table'];
    $_SESSION['users'] = '';

    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
    
  
    
    try {
        include 'connection.php';
        $sql = $conn->query(
            "INSERT INTO $table_name ( first_name, last_name, email, password, created_at, updated_at) 
            VALUES ( '$first_name', '$last_name', '$email', '$password', NOW(), NOW())"
        );

        $response = [
           'success' => true,
           'message' => $first_name . " " . $last_name . " has been added successfully!"
        ];

    } catch (PDOException $e) {
        echo 
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
 $_SESSION['response'] = $response;
 header('location: ../addUsers.php');
?>