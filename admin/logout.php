<?php
  session_start();
  unset($_SESSION['auth']); ?>
 <?php header("location: index.php");
?>