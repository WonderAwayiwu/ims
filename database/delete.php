<?php
session_start();
include 'connection.php';




if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $select = $conn->query("SELECT * FROM users WHERE id = $id");
    $user = $select->fetch_assoc();


    // Prepare and execute delete query
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['deleteresponse'] = [
            'success' => true,
            'message' => $user['first_name'] . " " . $user['last_name'] . " has been deleted successfully!"
        ];
    } else {
        $_SESSION['deleteresponse'] = [
            'success' => false,
            'message' => 'Failed to delete user.'
        ];
    }

    $stmt->close();
} else {
    $_SESSION['response'] = [
        'success' => false,
        'message' => 'Invalid user ID.'
    ];
}

$conn->close();

// Redirect back to the users list page
header("Location: ../addUsers.php");
exit;
?>
