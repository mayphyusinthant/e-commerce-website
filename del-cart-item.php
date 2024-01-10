<?php
	session_start();
	$id = $_GET['id']; //get product item to be deleted from cart
	unset($_SESSION['cart'][$id]);
	
    header("location:view-cart.php");
?>