<?php
    session_start();
    include("admin/conf/config.php");
    //$cart variable stores numbers of products that you added to your cart
    $cart = 0;
    //when add to cart button is clicked, 
    //i.e. session['cart'] is started
    if(isset($_SESSION['cart'])){
        //session cart are stored in the cart var as product qty.
        foreach($_SESSION['cart'] as $qty){
            $cart += $qty;
        }
    }

    //when user clicks an element "UL" which has class = 'cats'
    if(isset($_GET['cats'])){
        //get category id from where user clicks
        $cat_id = $_GET['cats'];
        //show all related products where categoryID = cat_id
        $result = "SELECT * FROM product_info WHERE categoryID = $cat_id";
        $products = $conn->query( $result); 
    }else if(isset($_GET['remark'])){
        //get product_remark value where user clicks
        $product_remark = $_GET['remark'];
       
        //show all related products where categoryID = cat_id
        $result = "SELECT * FROM product_info WHERE remark = '$product_remark'";
        $products = $conn->query( $result); 
    }else if(isset($_GET['minprice']) && ($_GET['maxprice'])){
        //get min and max prices from where user clicks
        $min = $_GET['minprice'];
        $max = $_GET['maxprice'];

        //show all related products where categoryID = cat_id
        $result = "SELECT * FROM product_info WHERE price >= $min && price <= $max";
        $products = $conn->query( $result); 
    }else{
        //if not show all products
        $result = "SELECT * FROM product_info";
        $products = $conn->query( $result); 
    }

    ?>

<!DOCTYPE html>

<html>
    <head>
        <title>Products Showcase</title>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">
        <link rel = "stylesheet" href = "css/index-style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    </head>
        <!--Required CDN: Bootstrap | Popper | Jquery to Work Boostrap Collapse Properly-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>  
         
    <body>
     
        <?php 
        //header is implemented separately
        include("header-navigation.php");
        ?>
        
       <section class = "container mx-auto ">
        <div class = "row ">
        <!--category navigation or side bar-->
        <aside class = "col-lg-3 col-md-3 col-sm-12 col-xs-12 my-3 ">

            <b  class = "py-3 list-group-item">
                <a href = "showcase.php"  style = "text-decoration:none;" > Show All</a>
            </b>
        
            <!--SELECT By Category-->
            <b  class = "py-3 list-group-item">
                <a data-toggle="collapse" href="#category" role="button" aria-expanded="false" aria-controls="category"  style = "text-decoration:none;" > 
                All Categories</a>
            </b>
            <div class="collapse" id="category">
                <ul class = "cats list-group" >
                    <?php 
                    //query to select all categories from category_info table
                    $result = "SELECT * FROM category_info";
                    $cats = $conn->query( $result); 
                    foreach( $cats as $row ) {?>
                        <li class = "py-1 list-group-item ">
                            <!--url link is followed by query string categoryID-->
                            <a href = "showcase.php?cats=<?php echo $row['categoryID']?>"
                            style = "text-decoration:none;">
                                <!--content shows related categoryName-->
                                <?php echo $row['categoryName'] ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <!--SELECT By Product Remark: Buy 1 Get 1, Discount Item, etc...-->
            <b  class = "py-3 list-group-item">
                <a data-toggle="collapse" href="#specialOffer" role="button" aria-expanded="false" aria-controls="specialOffer"  style = "text-decoration:none;" > 
                All Special Offers</a>
            </b>

            <div class="collapse" id="specialOffer">
                <ul class = "cats list-group" >
                
                    <?php 
                    $result = "SELECT DISTINCT remark FROM `product_info` WHERE remark = 'Buy 1 Get 1' OR 
                    remark = 'Discount Item' OR remark = 'New Arrival' OR remark = 'Top-Ranked Product'";
                    $remarks = $conn->query( $result); 
                        foreach( $remarks as $row ) {?>
                            <li class = "py-1 list-group-item ">
                                <!--url link is followed by query string categoryID-->
                                <a href = "showcase.php?remark=<?php echo $row['remark']?>"
                                style = "text-decoration:none;">
                                    <!--content shows related categoryName-->
                                    <?php echo $row['remark'] ?>
                                </a>
                            </li>
                        <?php } ?>
                </ul>
            </div>
            <!--SELECT By Price-->
            <b  class = "py-3 list-group-item">
                <a data-toggle="collapse" href="#price" role="button" aria-expanded="false" aria-controls="price"  style = "text-decoration:none;" > 
                All Price</a>
            </b>
            <div class="collapse" id="price">
                <ul class = "cats list-group" >
                    <li class = "py-1 list-group-item ">
                        <!--url link is followed by query string categoryID-->
                        <a href = "showcase.php?minprice=<?php echo 500?>&maxprice=<?php echo 1000?>"
                        style = "text-decoration:none;">
                        500 - 1000 MMK
                        </a>
                    </li>
                
                    <li class = "py-1 list-group-item ">
                        <!--url link is followed by query string categoryID-->
                        <a href = "showcase.php?minprice=<?php echo 1000?>&maxprice=<?php echo 5000?>"
                        style = "text-decoration:none;">
                        1000 - 5000 MMK
                        </a>
                    </li>

                    <li class = "py-1 list-group-item ">
                        <!--url link is followed by query string categoryID-->
                        <a href = "showcase.php?minprice=<?php echo 5000?>&maxprice=<?php echo 10000?>"
                        style = "text-decoration:none;">
                        5000 - 10000 MMK
                        </a>
                    </li>

                    <li class = "py-1 list-group-item ">
                        <!--url link is followed by query string categoryID-->
                        <a href = "showcase.php?minprice=<?php echo 10000?>&maxprice=<?php echo 100000?>"
                        style = "text-decoration:none;">
                        10000 - 100000 MMK
                        </a>
                    </li>
                </ul>
            </div>
        </aside> 
        
        <!--Product Card Lists-->
        <main class = "col-lg-9 col-md-9 col-xs-12 col-sm-12  my-3 px-3 py-3 mx-auto ">
            <div class = "row ">
                 <?php foreach( $products as $row ) {?>
                <div class = "card col-lg-3 col-md-3  col-sm-12 ">
                    <div class = "card-body">
                        <b > <?php echo $row['productName'] ?></b><br>
                        <img class = "img-resposive img-thumbnail bg-image" alt = "product photo"
                        src = "admin/covers/<?php echo $row['img']?>"  width = "240" height = auto> 
                        <br>
                        <a href = "product-detail.php?id=<?php echo $row['productID']?>">
                        Show Details
                        </a><br>
                        <i>Price : <?php echo $row['price']?>MMK</i><br>  
                        <b><?php echo $row['remark']?></b></b>   
                    </div>
                    <div class ="card-footer"> 
                        <a href="add-to-cart.php?id=<?php echo $row['productID'] ?>"             
                        class="add-to-cart button btn btn-danger" >Add to Cart</a>  
                    </div><hr>
                 </div>
                <?php } ?>
            </div> 
        </main>
         </div>
        </section>

        <footer>
            <?php 
             //footer is implemented separately
                include("footer.php");
            ?>
            
        </footer> 

    </body>
</html>