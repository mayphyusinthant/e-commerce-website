<?php
  session_start();
  unset($_SESSION['userauth']); 
  unset($_SESSION['cart']);
  ?>
 <?php header("location: index.php");
?>