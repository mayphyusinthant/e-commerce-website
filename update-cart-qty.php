<?php
	session_start();
	$id = $_POST['code'];
	$qty = $_POST['quantity'];
	$_SESSION['cart'][$id] = $qty;

	header("location:view-cart.php");
?>