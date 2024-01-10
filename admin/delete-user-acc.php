<?php
    session_start();
    include("conf/config.php");  
    $id = $_GET['id'];
    $status = $_GET['email']; 
    
    //update the `customerinfo` table
    $result1 = "UPDATE `customerinfo` SET `email`= $status WHERE customerID = $id";
    $sql1 = $conn->query($result1); 

    header("location: manage-user.php");
    ?>