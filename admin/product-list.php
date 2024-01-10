<!doctype html> 
    <html> 
        <head>  
            <title>Product List Admin Panel</title>  
            <meta charset = "UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

             <link rel="stylesheet" href="css1/style1.css"> 
            <h1>Product Management</h1>
            <!--<link rel="stylesheet" href="css1/style1.css">-->
            
        </head> 

<body>
    <?php include("conf/auth.php"); 
    include("conf/config.php");  
    include("admin-header.php");  ?>
     <?php
        error_reporting(0);
        if(count($_POST)>0) {
        $item=$_POST['searchProduct'];
                    
        $result = "SELECT * FROM product_info WHERE productName LIKE '%$item%' ";
        $rows = $conn->query($result); 
    }
        else {
        /* $products = mysqli_query($conn, "SELECT product_info.*, category_info.categoryName    
        FROM product_info LEFT JOIN category_info    
        ON product_info.categoryID = category_info.categoryID    
        ORDER BY product_info.productID DESC"); */
        $products = "SELECT product_info.*, category_info.categoryName    
        FROM product_info LEFT JOIN category_info    
        ON product_info.categoryID = category_info.categoryID    
        ORDER BY product_info.productID DESC";
        $rows = $conn->query( $products); 
        }
        
       
        ?> 
    
   
    <div class = "main  mx-3 my-3">

        <a href="product-new.php" class="new ">New Product</a>  <br><br><br>
        <ul class="list row products "> 
            
             <?php foreach( $rows as $row ) {  ?>   
                <li class = "card col-lg-3 col-md-3  col-sm-12"> 
                    <div class = "card-header">
                        <b><?php echo $row['productName'] ?></b>  
                    </div>

                    <div class = "card-body">    
                        <img src="covers/<?php echo $row['img'] ?>"              
                        alt="Cover Photo Not Availiable" height="140" >      
                        <br>
                        <p><h6>Description</h6>    <?php echo $row['descriptions'] ?></p>  
                        <p><?php echo $row['remark']?></p>    
                        <div>$<?php echo $row['price'] ?></div>      
                    </div>    

                    <div class = "card-footer">
                        [ <a href="product-del.php?id=<?php echo $row['productID'] ?>"
                        class="del " onClick="return confirm('Are you sure?')">del</a> ]  

                        [<a href="product-edit.php?id=<?php echo $row['productID'] ?>
                        &productName=<?php echo $row['productName']?>">edit</a>]
                         
                        [ <a href="product-remark.php?id=<?php echo $row['productID'] ?>
                        &productName=<?php echo $row['productName']?>"
                        class="remark" >product remark</a> ] 

                    </div>
                </li>  
            <?php } ?>
           
        </ul> 
    </div>
    <p class = "text-muted"> &copy; 2022, Capital Company Limited, May Phyu Sin Thant</p>

</body>



