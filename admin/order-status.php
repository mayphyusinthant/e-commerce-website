<?php  
    include("conf/config.php");  
    $id = $_GET['orderID'];  
    $status = $_GET['remark'];  
    $result = "UPDATE orderinfo SET remark = $status 
    WHERE orderID = $id ";
    $rows = $conn->query( $result); 

    header("location: orders.php"); 
?>