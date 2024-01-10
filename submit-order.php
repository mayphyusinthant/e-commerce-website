<?php
    session_start();
    include("admin/conf/config.php");  
    $name = $_POST['uname'];  
    $email = $_SESSION['email'];  
    $phone = $_POST['phone'];  
    $address = htmlspecialchars($_POST['address']); 
    $city = $_POST['city'];  
    $country = $_POST['country'];  
    $postalcode = $_POST['postalcode'];   

    //$deliveryAddress, $payment, $nameoncard, $cardNo, $securityCode will be stored inside 'orderinfo' table.
    $deliveryAddress = htmlspecialchars($_POST['deliveryAddress']);
    $payment = $_POST['payment'];
    $nameoncard = $_POST['nameoncard'];
    $cardNo = $_POST['cardNo'];
    $securityCode = $_POST['securityCode'];
   
    $custID = 0;
    $sql = "SELECT * from customerinfo WHERE email = ?";
    $sql1 = $conn->prepare($sql);    
    $sql1->execute([$email]);
    foreach( $sql1 as $row ) :
    $custID = $row['customerID'];
    

    //update the `customerinfo` table
    $result1 = "UPDATE customerinfo SET customer = ?, phone = ?, `address` = ?, city = ?, 
    country = ?, postalCode = ? , status = ? WHERE customerID = $custID";
    $sql1 = $conn->prepare($result1); 
    $sql1->execute([$name,  $phone, $address, $city, $country, $postalcode, null]);
    
    //insert row in orderinfo table
    $result2 = "INSERT INTO orderinfo( customerID, orderedDate,  deliveryAddress, 
    payment, nameoncard, cardNumber, 
    securityCode, remark) 
    VALUES  ( ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $sql2 = $conn->prepare($result2);
    
    $sql2->execute([$custID, date("Y-m-d H:i:s"), 
    $deliveryAddress, $payment, $nameoncard,  $cardNo, $securityCode, 0]);   //remark 0 means => Not deliverd yet! remark 1 means delivered.
    $orderID = $conn->lastInsertId();

    //insert row into orderline table
    foreach($_SESSION['cart'] as $id => $qty) { 
        $result3 = "INSERT INTO orderline (productID, orderID, qty) 
        VALUES ( ?, ?, ?)";
        $sql3 = $conn->prepare($result3); 
        $sql3->execute([$id, $orderID ,$qty]);   
        
    }  
    endforeach; 
    
     ?> 

    <!doctype html> 
    <html> 
        <head>  
            <title>Order Submitted</title>  
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">
            <!--Required CDN: Bootstrap | Popper | Jquery to Work Boostrap Collapse Properly-->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>  
         
            <link rel="stylesheet" href="css/index-style.css"> 
             <?php 
                //header is implemented separately
                include("header-navigation.php");
            ?>
        </head> 
        <body>  
            <section class = "mx-10 my-10 px-10 py-10" style = "padding:10px; margin:10px; background-color:white;">
                <div class = "row">
                <aside class="bill-slip  px-10 col-lg-6  col-md-6 col-sm-12 col-xs-12 ">  
                    <h3>Bill-Slip</h3> 
                    <table class= "table table-border ">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Price</th>
                </tr>
            <?php 
            $total = 0;
            foreach($_SESSION['cart'] as $id => $qty):
                $result = "SELECT productName, price FROM product_info where productID = $id";
                $rows = $conn->query($result);
                foreach( $rows as $row ) :
                    $total += $row['price'] * $qty;
                    
                     
            ?>

                <tr>
                    <td><?php echo $row['productName']?></td>
                    <td><?php echo $qty ?></td>
                    <td><?php echo $row['price']?></td>
                    <td><?php echo $row['price'] * $qty?></td>
                </tr>
            <?php endforeach; 
            endforeach; ?>
                <tr>
                    <td colspan ="3">Sub Total :</td>
                    <td><?php echo $total ?></td>
                </tr>
                <tr>
                    <td colspan ="3">Delivery Fees :</td>
                    <td><?php echo $deliFee = 1000 ?></td>
                </tr>
                <tr>
                    <td colspan ="3">Sale Tax 5.0 % :</td>
                    <td><?php  
                    $taxExcluded = $total / ((5 /100) + 1 ) ;
                    $tax = $total - $taxExcluded;
                    echo number_format($tax, 2);
                    ?></td>
                </tr>
                
                <tr>   
                    <td colspan ="3">Total (MMK):</td>
                    <td><?php echo  number_format($total + $deliFee + $tax , 2);?></td>
                </tr>

        </table>
                </aside>
                
                <main class = "customer-info  mt-20 px-10 col-lg-6 col-md-6 col-sm-12 col-xs-12 border">
 
                    <?php 
                    $result = "SELECT orderinfo.*, customerinfo.*
                    FROM orderinfo LEFT JOIN customerinfo
                    ON orderinfo.customerID = customerinfo.customerID
                    WHERE orderinfo.customerID = $custID AND orderinfo.orderID = $orderID";
                    $Info = $conn->query( $result); 
                    
                    foreach( $Info as $row ) {  ?>
                    <h3>Your Information</h3>
                    <table>
                        <tr>
                            <th>Your Name</th>
                            <td><?php echo $row['customer']?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row['email']?></td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td><?php echo $row['phone']?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo htmlspecialchars($row['address'])?></td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td><?php echo $row['city'] ?></td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td><?php echo $row['country']?></td>
                        </tr>
                        <tr>
                            <th>Postal Code</th>
                            <td><?php echo $row['postalCode'] ?></td>
                        </tr>
                            <th>Full Shipping(Delivery) Address</th>
                            <td><?php echo htmlspecialchars($row['deliveryAddress'])?></td>
                        </tr>
                        <tr>
                        <tr>
                            <th>Payment</th>
                            <td><?php echo $row['payment']?></td>
                        </tr>
                        <tr>
                            <th>Name on Card</th>
                            <td><?php echo $row['nameoncard'] ?></td>
                        </tr>
                        <tr>
                            <th>Card Number</th>
                            <td><?php echo $row['cardNumber']?></td>
                        </tr>
                        <tr>
                            <th>Security Code</th>
                            <td>******</td>
                        </tr>
                    </table>
                    <?php }  ?>
                </main>
                </div>
            </section>
               <div  style = "margin:10px; padding:10px; background-color:white; content-align:center; text-align:center; " >
                    <p> Your order has been submitted. We'll deliver the items soon. Thanks in Advance.
                    <br> Please check the important information and items details.
                    <br> If there is any mistake in these informaition or if your mind changes, 
                    you can cancel order before delivery time.
                    </p> 
                        <button  class = "btn btn-warning"  onclick="window.print()" <?php  unset($_SESSION['cart']);?>>Print Bill-Slip</button>
                    
            </div>
            <footer>
                <?php 
                //footer is implemented separately
                include("footer.php");
                ?>
            </footer> 
        </body> 
        </html>

       
