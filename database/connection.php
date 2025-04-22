<?php 



    // Database connection

$conn = new mysqli("localhost", "root", "", "inventory");
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

?>