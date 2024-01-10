<!DOCTYPE html>
<html lang="en">
<head>
<!--This file is linked to header-navigation.php-->
  <title>Search Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

  <form class="d-flex" action= "showcase.php" method="post" >
        <input class="form-control me-2" type="search" name ="searchProduct" placeholder="Search Product..." aria-label="Search">
        <button class="btn btn-outline-danger" type="submit">Search</button>
  </form>

   <?php
        error_reporting(0);
        if(count($_POST)>0) {
        $item=$_POST['searchProduct'];
        
        $result = "SELECT * FROM product_info WHERE productName LIKE '%$item%' ";
        $products = $conn->query( $result); 
        }
     ?>



         