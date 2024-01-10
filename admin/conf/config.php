<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "product";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        //echo "Connection successfull";
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
         echo "Connection failed: " . $e->getMessage();
    }
?>


