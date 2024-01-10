<?php  session_start();
    include("admin/conf/config.php");

    $cart = 0;
    if(isset($_SESSION['cart'])){
            //session cart are stored in the cart var as product qty.
            foreach($_SESSION['cart'] as $qty){
                $cart += $qty;
            }
        }
    ?>
 
<!DOCTYPE html>

<html>
    <head>
        <title>Products Showcase</title>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel = "stylesheet" href = "css/index-style.css">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">
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
        ?>
    
    <body >
        <h3 style = "text-align: center; color: #6e092f;">
             <?php if(isset($_SESSION['userauth'])) {
                $email = $_SESSION['email'];
                echo "Welcome Back . ".ucfirst(substr($email, 0, strpos($email, '@')))." !";
            } ?>
         </h3>
         <h5 style = "text-align: center; color: #6e092f; ">This week, we offers lots of special products for you ! Enjoy Your Shopping. </h5>
        
         <div class="row  mx-3 "> 
            <div class="col my-3 col-lg-4 col-md-3 col-sm-12 col-xs-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">+ 967</h3>
                        <span class="text-success">
                            <i class="fas fa-chart-line"></i>
                            Current Active Buyers
                        </span>
                    </div>
                </div>
            </div>

            <div class="col my-3 col-lg-4 col-md-3 col-sm-12 col-xs-12">
                <div class="card mb-3 ">
                    <div class="card-body">
                        <h3 class="card-title">+ 62k</h3>
                        <span class="text-success">
                            <i class="fas fa-chart-line"></i>
                            Daily Active Buyers
                        </span>
                    </div>
                </div>
            </div>

            <div class="col my-3 col-lg-4 col-md-3 col-sm-12 col-xs-12">
                <div class="card mb-3 ">
                    <div class="card-body">
                        <h3 class="card-title">+ 712k</h3>
                        <span class="text-success">
                            <i class="fas fa-chart-line"></i>
                           Montly Active Buyers
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class = "container   "  style = "margin: 0 auto; text-align: center; ">
            <?php 
                $query = "SELECT * FROM product_info WHERE remark = 'Buy 1 Get 1' ";
                $result = $conn->query( $query); ?>
                <h2>Buy 1 Get 1 </h2>
                <?php foreach( $result as $row ) {  ?>
                       
                        <figure class="snip1584"><img src="admin/covers/<?php echo $row['img'] ?>" alt="image"/>
                        <figcaption>
                            <h5><?php echo $row['productName'] ?></h5>
                        </figcaption><a href="#"></a>
                        </figure>
                    
            <?php } 
                $query = "SELECT * FROM product_info WHERE remark = 'Discount Item' ";
                $result = $conn->query( $query); ?>
                <h2>Discount Item<h2><br>
                <?php foreach( $result as $row ) {  ?>
                        
                        <figure class="snip1584"><img src="admin/covers/<?php echo $row['img'] ?>" alt="image"/>
                        <figcaption>
                            <h5><?php echo $row['productName'] ?></h5>
                        </figcaption><a href="#"></a>
                        </figure>
            <?php } 
                $query = "SELECT * FROM product_info WHERE remark = 'New Arrival' ";
                $result = $conn->query( $query); ?>
                <h2>New Arrival<h2><br>
                <?php foreach( $result as $row ) {  ?>
                        
                        <figure class="snip1584"><img src="admin/covers/<?php echo $row['img'] ?>" alt="image"/>
                        <figcaption>
                            <h5><?php echo $row['productName'] ?></h5>
                        </figcaption><a href="#"></a>
                        </figure>
            <?php }
                $query = "SELECT * FROM product_info WHERE remark = 'Top-Ranked Product' ";
                $result = $conn->query( $query); ?>
                <h2>Top-Ranked Product <h2><br>
                <?php foreach( $result as $row ) {  ?>
                        
                        <figure class="snip1584"><img src="admin/covers/<?php echo $row['img'] ?>" alt="image"/>
                        <figcaption>
                            <h5><?php echo $row['productName'] ?></h5>
                        </figcaption><a href="#"></a>
                        </figure>
            <?php } ?>
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
@import url(https://fonts.googleapis.com/css?family=Raleway);

   
   .snip1584 {
    font-family: 'Raleway', sans-serif;
    position: relative;
    display: inline-block;
    overflow: hidden;
    margin: 15px;
    min-width: 230px;
    max-width: 315px;
    width: 100%;
    color: #ffffff;
    font-size: 16px;
    text-align: left;
}
    .snip1584 * {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    }
    .snip1584:before {
    position: absolute;
    top: 10px;
    bottom: 10px;
    left: 10px;
    right: 10px;
    top: 100%;
    content: '';
    background-color: rgba(232, 153, 166, 0.9);
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    -webkit-transition-delay: 0.25s;
    transition-delay: 0.25s;
    }
    .snip1584 img {
    vertical-align: top;
    max-width: 100%;
    padding-left: 10px;
    width: 450px;
    height: 220px;
    backface-visibility: hidden;
    border-radius:100%;
    }
    .snip1584 figcaption {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    }
    .snip1584 h3,
    .snip1584 h5 {
    margin: 0;
    opacity: 0;
    letter-spacing: 1px;
    }
  
    .snip1584 h5 {
    font-weight: normal;
    background-color:#520624;
    padding: 3px 10px;
    -webkit-transform: translateY(-100%);
    transform: translateY(-100%);
    -webkit-transition-delay: 0s;
    transition-delay: 0s;
    }
    .snip1584 a {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
    }
    .snip1584:hover:before,
    .snip1584.hover:before {
    top: 10px;
    -webkit-transition-delay: 0s;
    transition-delay: 0s;
    }
    .snip1584:hover h3,
    .snip1584.hover h3,
    .snip1584:hover h5,
    .snip1584.hover h5 {
    -webkit-transform: translateY(0);
    transform: translateY(0);
    opacity: 1;
    }
    .snip1584:hover h3,
    .snip1584.hover h3 {
    -webkit-transition-delay: 0.3s;
    transition-delay: 0.3s;
    }
    .snip1584:hover h5,
    .snip1584.hover h5 {
    -webkit-transition-delay: 0.2s;
    transition-delay: 0.2s;
    }
</style>
<script>
    var snippet = [].slice.call(document.querySelectorAll('.hover'));
    if (snippet.length) {
    snippet.forEach(function (snippet) {
        snippet.addEventListener('mouseout', function (event) {
        if (event.target.parentNode.tagName === 'figure') {
            event.target.parentNode.classList.remove('hover')
        } else {
            event.target.parentNode.classList.remove('hover')
        }
        });
    });
    }
</script>