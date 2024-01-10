<!DOCTYPE html>
<html>
    <header>
        <meta charset = "UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
        <link rel="stylesheet" href="css1/style1.css">
        <!--Boostrap JS bundle-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <!--Required CDN: Bootstrap | Popper | Jquery to Work Boostrap Collapse Properly-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>  
         
         <!--header bar-->
        <nav class="navbar navbar-expand-lg navbar-light sticky-top">

            <div class="container-fluid">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link mt-2" href="product-list.php" aria-current="page" href="#">Manage Products</a>
                        <a class="nav-link mt-2" href="cat-list.php">Manage Categories</a>
                        <a class="nav-link mt-2" href="orders.php">Manage Orders</a>
                        <a class="nav-link mt-2" href="manage-user.php">Manage User Accounts</a>
                        <a class="nav-link mt-2"><?php if(isset($_SESSION['auth'])) {
                            $username = $_SESSION['username'];
                            echo $username;
                        } else {?>
                            <a class = "nav-link" href = "userRegister.php"><i class="fas fa-user-plus"></i></a>
                       <?php } ?> </a>
                        <a class="nav-link mt-2" href="logout.php">Logout</a>
                       <form class="d-flex" action= "product-list.php" method="post" >
                            <input class="form-control " type="search" name ="searchProduct" placeholder="Search Product..." aria-label="Search">
                            <button class="btn btn-outline-danger" type="submit">Search</button>
                        </form>

                    </div>
                </div>
            </div>
        </nav>
      
    </header>