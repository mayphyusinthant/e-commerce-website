<?php  
    session_start();  
    //unset function is used to delete session data
    unset($_SESSION['cart']);  
    header("location: showcase.php");   
?>