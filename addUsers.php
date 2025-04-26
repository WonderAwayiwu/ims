<?php
session_start();

include 'database/connection.php';

// Fetch all users from the database
$users = [];
$result = $conn->query("SELECT * FROM users ORDER BY id DESC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}


// Check if the session variable is set
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if the session is not set
    exit;
}

$user = $_SESSION['user']; // Retrieve the user details from the session
$_SESSION['table'] = 'users'; // Set the table session variable to 'users'


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users - Inventory Management System</title>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dashboard1.css">
    <style>
        /* Target the password column */
        .id-column {
            width: 50px;
            text-align: center;
            /* Center-align the text in the column */
        }

        /* Ensure the table layout respects column widths */
        table {
            table-layout: fixed;
            /* Fix the table layout to respect column widths */
            width: 100%;
            /* Make the table take up the full width of the container */
            border-collapse: collapse;
            /* Remove gaps between table cells */
        }

        th,
        td {

            /* Add padding to table cells */
            border: 1px solid #ddd;
            /* Add a border to table cells */
            overflow: hidden;
            /* Hide overflow content */
            text-overflow: ellipsis;
            /* Add ellipsis (...) for overflowing text */
            /* white-space: nowrap; */
        }
    </style>
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
                    <div class="row">
                        <div class="column column-5">

    <form action="database/add.php" class="appform" method="post">
        <h1>Add User</h1>
        <div>
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" class="appFormInput" name="firstname" placeholder="Enter First Name">
        </div>
        <div>
            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" class="appFormInput" name="lastname" placeholder="Enter Last Name">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" class="appFormInput" name="email" placeholder="Enter Email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" class="appFormInput" name="password" placeholder="Enter Password">
        </div>

        <button type="submit"><i class="fa fa-plus"></i>Add User</button>
    </form>
    <?php if (isset($_SESSION['response'])) {

        $response_message = $_SESSION['response']['message'];
        $is_success = $_SESSION['response']['success'];

    ?>
        <div id="responseMessage" class="responseMessage">
            <p class="<?= $is_success ? 'responseMessage_success' : 'responseMessage_error' ?>">
                <?= $response_message; ?>
            </p>
        </div>
    <?php 
        unset($_SESSION['response']);
    } ?>
</div>

<div class="column column-7">
    <h1 class="section-header"><i class="fa fa-list"></i> List of Users</h1>
    <div class="section-content">
        <div class="users">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th class="id-column">#</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>EMAIL</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $index => $user) { ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= $user['first_name'] ?></td>
                                <td><?= $user['last_name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= date('M d, Y @ h:i:s A', strtotime($user['created_at'])) ?></td>
                                <td><?= date('M d, Y @ h:i:s A', strtotime($user['updated_at'])) ?></td>
                                <td>
                                    <a href="database/edit-user.php?id=<?=$user['id'] ?>" class="edit-button"> <?=$user['id'] ?><i class="fa fa-edit"></i>Edit</a>
                                    <a href="database/delete.php?id=<?= $user['id'] ?>" class="delete-button"><i class="fa fa-trash"></i>Delete</a>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
<?php if (isset($_SESSION['deleteresponse'])) {

        $response_message = $_SESSION['deleteresponse']['message'];
        $is_success = $_SESSION['deleteresponse']['success'];

        ?>
        <div id="deleteresponseMessage" class="responseMessage">
            <p class="<?= $is_success ? 'responseMessage_error' : 'responseMessage_success' ?>">
                <?= $response_message; ?>
            </p>
        </div>
 <?php 
        unset($_SESSION['deleteresponse']);
    } ?>

             
                <p class="table-footer">Total Users: <?= count($users) ?></p>
            </div>
        </div>
    </div>
</div>
</div>


                </div>
            </div>
        </div>
    </div>

    <script>

   // Add confirmation dialog before deleting a user
   const deleteButtons = document.querySelectorAll('.delete-button');
   deleteButtons.forEach(button => {
       button.addEventListener('click', (event) => {
           const confirmDelete = confirm('Are you sure you want to delete this user?');
           if (!confirmDelete) {
               event.preventDefault(); // Prevent the default action (navigation)
           }
       });
   });

   window.addEventListener('load', function() {
       // Hide response messages after timeout
       const responseMessage = document.getElementById('responseMessage');
       if (responseMessage) {
           setTimeout(() => {
               responseMessage.style.display = 'none';
           }, 11000);
       }
       const deleteresponseMessage = document.getElementById('deleteresponseMessage');
       if (deleteresponseMessage) {
           setTimeout(() => {
               deleteresponseMessage.style.display = 'none';
           }, 113000);
       }
   });

    </script>

    <!-- JavaScript -->
    <script src="js/scripts.js"></script>

</body>

</html>