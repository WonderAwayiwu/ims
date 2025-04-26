<?php
session_start();

if (isset($_POST['update'])) {
    include 'connection.php';

    $id = $_POST['id'];
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];






  
    try {

        // $sql = $conn->query("UPDATE users SET 
        //         first_name = '$first_name',
        //         last_name = '$last_name',
        //         email = '$email',
        //         password = '$password',
        //         updated_at = NOW()
        //         WHERE id = '$id'"
        // );
        $sql = "UPDATE users SET 
                first_name = '$first_name',
                last_name = '$last_name',
                email = '$email',
                password = '$password',
                updated_at = NOW()
                WHERE id = '$id'";


$conn->query($sql);
       

        $_SESSION['response'] = [
            'success' => true,
            'message' => "User updated successfully!"
        ];
    }
    catch (Exception $e) {
        $_SESSION['response'] = [
            'success' => false,
            'message' => "Error updating user: " . $e->getMessage()
        ];
    }
} else {
    $_SESSION['response'] = [
        'success' => false,
        'message' => "Invalid request method."
    ];
}

header('Location: ../addUsers.php');


exit;
?>
