<!DOCTYPE html>

<html>
    <head>
        <title> Product Detail </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

    </head>

    <body class="detail mx-auto" style = "text-align:center;">
        <h1>Product Detail</h1>
        <?php  include("admin/conf/config.php");  
    
        $id = $_GET['id'];  
        $products = "SELECT * FROM product_info WHERE productID = $id";
        $products = $conn->query( $products); 
      
        foreach( $products as $row ) {  ?>
       
    
        <div class="detail">  
            
            <img src="admin/covers/<?php echo $row['img'] ?>"  height = "400">  
            <h2><?php echo $row['productName'] ?></h2>  
            <i><?php echo $row['descriptions'] ?></i>,  <b>$<?php echo $row['price'] ?></b>  
             
        </div> 
        <div class="footer">  
            &copy; <?php echo date("Y") ?>. All right reserved. 
        </div> <?php } ?>
    </body>

</html>
