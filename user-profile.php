<?php
    session_start();

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
    }else {
        $email = $_SESSION['email'];
    }
 
?>
 

<!doctype html>
<html>
    <head>
        <title> User-Profile </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    </head>
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
   
    <body>
        <div id="div1 container " style = "margin-top:50px;" >
        <div id="div2" class="card  shadow-lg col-lg-4 col-md-6 col-sm-10 col-xs-10" >
            <div class="col-12 user-img text-center" >
                <img class="img2" src="image/user-profile-logo.jpg" alt=" "/>
            </div>

            <div class="card-header text-center">
                <h5>User Information</h5>
            </div>
            <div class="card-body mx-5" >
                <table class= "table table-border ">
                        
                        <?php 
                            $query = "SELECT customerinfo.* 
                            FROM customerinfo 
                            WHERE customerinfo.email = '$email'";
                           
                            $result = $conn->query( $query); 
                            foreach( $result as $row ) {  ?>
                            <tr>
                                <th>Your Name</th>
                                <td> <?php echo $row['customer']?></td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td> <?php echo $row['phone']?></td>
                            </tr>
                            <tr>
                                <th>Living Address</th>
                                <td> <?php echo htmlspecialchars($row['address'])?></td>
                                <td> <?php echo $row['city'] ?> </td>
                                <td> <?php echo $row['country']?></td>
                            </tr>
                            <tr>
                                <th>Postal Code</th>
                                <td> <?php echo $row['postalCode']?></td>
                            </tr>
                            <?php } ?> 
                    </table>
                 
            </div>
            <div class="card-footer text-center text-muted">
                <p>Should You Encounter Any Account Issues, Please Contact To Our Admin Team.</p>
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