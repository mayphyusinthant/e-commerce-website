<?php
    session_start();
    $email = $_SESSION['email']; 

     $cart = 0;
    
    if(isset($_SESSION['cart'])){
        //session cart are stored in the cart var as product qty.
        foreach($_SESSION['cart'] as $qty){
            $cart += $qty;
        }
    }
    //if there is no product in cart, redirect to index.php
    if(!isset($_SESSION['userauth'])){
        header("location: userLogin.php");
        exit();
    }
 
?>

<!doctype html>
<html>
    <head>
        <title> User-Profile </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    </head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">
        <!--Required CDN: Bootstrap | Popper | Jquery to Work Boostrap Collapse Properly-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>   
        <?php 
            //header is implemented separately
            include("header-navigation.php");
            include("user-authority.php"); 
            include("admin/conf/config.php");  
        ?>
    </head>
    <style>
        #div2 {
            margin: 0 auto;
            padding: 0px 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }  
        .img2 {
            margin-top: -40px;
            opacity: 0.8;
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }

    </style>
    <body>
        <div id="div1 container " style = "margin-top:50px;" >
        <div id="div2" class="card  shadow-lg col-lg-4 col-md-6 col-sm-10 col-xs-10" >
            <div class="col-12 user-img text-center" >
                <img class="img2" src="image/your-order-logo.jpg" alt=" "/>
            </div>

            <div class="card-header text-center">
                <h5 style = "color: maroon;">Your Orders</h5>
            </div>
            <div class="card-body mx-5">
            
                <?php 
                $query = "SELECT orderline.qty, product_info.productName, orderinfo.orderedDate, 
                orderinfo.deliveryAddress, orderinfo.remark, customerinfo.* 
                FROM orderline 
                JOIN product_info ON orderline.productID = product_info.productID
                JOIN orderinfo ON orderline.orderID = orderinfo.orderID 
                JOIN customerinfo ON customerinfo.customerID = orderinfo.customerID
                WHERE customerinfo.email = '$email' AND
                orderinfo.remark = '0'";
                           
                $result = $conn->query( $query); 
                foreach( $result as $row ) {  ?>
                    <b><p>
                        <a data-toggle="collapse" href="#item" role="button" aria-expanded="false" aria-controls="item">
                            <?php echo $row['productName']?> 
                        </a>
                    </p></b>
                    <div class="collapse" id="item">
                    
                        <table table table-border>
                            <tr>
                                <th>Quantity</th>
                                <td> <?php echo $row['qty']?></td>
                            </tr>
                            <tr>
                                <th>Ordered Date</th>
                                <td> <?php echo $row['orderedDate']?></td>
                            </tr>
                            <tr>
                                <th>Delivery Address</th>
                                <td> <?php echo $row['deliveryAddress']?></td>
                            </tr>
                            <tr>
                                <td colspan ="3"> 
                                    <?php  if ($row['remark'] == 0) {echo 'Will be Delivered Soon...';} ;?>
                                    <div class = "progress mb-4" style = "height:5px;">
                                        <div class = "progress-bar bg-warning w-75"></div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?php } ?>
            </div>

            <div class="card-footer text-center text-muted" >
                <p >Should You Encounter Any Orders OR Delivery Problem, Please Contact To Our Customer Support Team.</p>
            </div>
        </div>
    </body>
 
     <footer>
            <?php 
             //footer is implemented separately
                include("footer.php");
            ?>
            
        </footer> 

</html>
