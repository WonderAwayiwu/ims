<?php
session_start();
include 'connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);


    $select = $conn->query("SELECT * FROM users WHERE id = $id");

    if ($select) {
        // Fetch the user data

    $result = $select->fetch_assoc();

    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .appform {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .appform h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .appform div {
            margin-bottom: 15px;
        }

        .appform label {
            display: block;
            margin-bottom: 5px;
        }

        .appFormInput {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .appform button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .appform button:hover {
            background-color: #218838;
        }
    </style>
  
</head>
<body>


<form action="update.php" class="appform" method="post">
    <h1>Upadate User</h1>
    <div>

    
     <input type="hidden" id="id" class="appFormInput" name="id" placeholder="Enter First Name" value="<?= $result['id']?>"> 


        <label for="firstname">First Name</label>
        <input type="text" id="firstname" class="appFormInput" name="firstname" placeholder="Enter First Name" value="<?= $result['first_name']?>">
    </div>
    <div>
        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" class="appFormInput" name="lastname" placeholder="Enter Last Name" value="<?= $result['last_name']?>">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" class="appFormInput" name="email" placeholder="Enter Email" value="<?= $result['email']?>">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" class="appFormInput" name="password" placeholder="Enter Password" value="<?= $result['password']?>">
    </div>

    <button type="submit" name="update"><i class="fa fa-plus"></i>Update User</button>

</form>
</body>
</html>


