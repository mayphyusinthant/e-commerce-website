<?php 
//only authorized person is allowed to manage orders, manage boos & categories etc. 
    include("conf/auth.php");
    
?> 
<!doctype html> 
    <html> 
        <head>  
            <title>Orders Management</title>  
            <meta charset = "UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

            <!--<link rel="stylesheet" href="css1/style1.css">--> 
            <h1>Orders Management</h1> 
            <?php include("admin-header.php");?>
        </head> 
        <body> 
            
            <?php  
              include("conf/config.php");

            //information from orders table are taken by using SELECT query 
            // and initilzed into $orders variable 
            $sql = "SELECT customerinfo.*,  
            orderinfo.* FROM customerinfo RIGHT JOIN orderinfo 
            ON customerinfo.customerID = orderinfo.customerID";
            //Cannot use LEFT JOIN HERE !!! 
            $rows = $conn->query($sql); 
           
        ?> 
    <div class = "main  mx-3 my-3">
     <ul class="row content">
       
            <?php foreach( $rows as $result ) {  ?> 
                <?php if($result['remark']): ?>
                    <li class="delivered col-lg-5 col-md-5 col-sm-12 mx-auto">
                        <?php else: ?>
                    <li class = "col-lg-5 col-md-5 col-sm-12 mx-auto">
                        <?php endif; ?>
       
            <div class="order item">
              
                <b><?php echo $result['customer'] ?></b>
                <i><?php echo $result['email'] ?></i>
                <i><?php echo $result['phone'] ?></i>
                <i><b> Delivery Address  :</b>  <?php echo $result['deliveryAddress'] ?></i>
                <i><b>Ordered Date  :  </b> <?php echo $result['orderedDate'] ?></i>
                <i><b> Payment Done Via : </b><?php echo $result['payment'] ?></i>
                <?php if($result['remark']): ?>
                * <a href="order-status.php?orderID=<?php echo $result['orderID'] ?>&remark=0">Undo</a>
                <?php else: ?>
                * <a href="order-status.php?orderID=<?php echo $result['orderID'] ?>&remark=1">Mark as Delivered</a>
                <?php endif; ?>  
               
 
                <?php          
                    $order_id = $result['orderID'];  
                    // productID(fk) field from orderline table and  productID(pk) from product table
                    //SELECT all columns from orderline table
                    //SELECT product name  from product_info tables where pk and fk have to be  same 
                    $items = "SELECT orderline.*, product_info.productName 
                    FROM orderline LEFT JOIN product_info 
                    ON orderline.productID = product_info.productID          
                    WHERE orderline.orderID = $order_id ";
                    $result1 = $conn->query($items); 
                              
                    foreach( $result1 as $item )   {      
                ?>        
                <b>         
                    <a href="../product-detail.php?id=<?php echo $item['productID'] ?>">            
                        <?php echo $item['productName'] ?>          
                    </a>          
                    (<?php echo "Qty :".$item['qty'] ?>)        
                </b>        
                    <?php } ?>      
            </div>  
            </li> 
           <?php } ?>
        
    </ul>
    </div>
    <p class = "text-muted"> &copy; 2022, Capital Company Limited, May Phyu Sin Thant</p>

</body>
</html>

