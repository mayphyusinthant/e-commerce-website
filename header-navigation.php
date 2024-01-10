<!DOCTYPE html>

<html>
    <head>
        <title> </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    </head>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!--Boostrap JS bundle-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
         
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

    <body>
        <!--header bar-->
        
        <nav class="navbar navbar-expand-lg  navbar-expand-md  bg-light sticky-top border" id = "sidebar-wrapper">
            <div class="container-fluid">
                 <a class="navbar-brand" href="#">
                    <img class = "logo" src="image/logo.jpg" alt="Logo Unavailable" width="200" height="80">
                </a>
               
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="index.php"  aria-current="page">HOME</a>
                        <a class="nav-link" href="showcase.php">SHOWCASE</a>
                        <a class="nav-link" href="faq.php">FAQ PAGE</a>
                        <a class="nav-link " href="about-us.php"  >ABOUT US</a>
                        <a class="nav-link" href="user-profile.php">YOUR PROFILE</a>
                        <a class="nav-link " href="user-orders.php"  >YOUR ORDERS</a>
                        <?php include("search-product.php")?>
                        <a class = "nav-link" href = "view-cart.php">
                            <i class="fas fa-shopping-cart " style = "font-size: 24px;"></i> <span class = "badge bg-danger rounded-pill translate-middle"> (<?php echo $cart ?>) </span> 
                        </a>
                        <?php if(isset($_SESSION['userauth'])) {
                            $email = $_SESSION['email'];
                            echo ucfirst(substr($email, 0, strpos($email, '@')));
                        } else {?>
                            <a class = "nav-link" href = "userRegister.php"><i class="fas fa-user-plus " style = "font-size: 18px;"></i></a>
                       <?php } ?>
                       <a class = "nav-link" href = "user-logout.php"><i class="fas fa-sign-out-alt" style = "font-size: 18px;"></i></a> 
                    </div>
                </div>
            </div>
        </nav>
    </body>
</html>

