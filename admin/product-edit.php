<?php 
    include("conf/auth.php"); 
    include("conf/config.php");
    $id = $_GET['id'];
    $productName = $_GET['productName'];
    
    $result = "SELECT * FROM product_info WHERE productID = $id";
    $stmt = $conn->query($result);
        
?>
<!doctype html> 
    <html> 
        <head>  
            <title>New Category</title>  
            <meta charset = "UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

            <h1>Edit Product Information</h1>
            <link rel="stylesheet" href="css/style.css">
            <?php  include("admin-header.php");  ?>
        </head> 
    
        <body>
            <form action= "product-update.php" method = "post" enctype = "multipart/form-data"> 
            <input type="hidden" name="id" value="<?php echo $id ?>">

            <label for="productName">Product Name</label>  
            <input type="text" name="productName" id="productName" value = "<?php echo $productName?>">  
         
            <label for="image">Image</label>  
            <input type="file" name="image" id="image">  
         
            <label for="description">Description</label>  
            <textarea name="description" id="description"></textarea>

            <label for="category">Category</label>
            <select name= "category" id="category">
                <option value = "0"> --Choose--</option>

                <?php 
                    include("conf/config.php");  
                    $result = "SELECT categoryID, categoryName FROM category_info";
                    $stmt = $conn->query($result);                         
                    foreach($stmt as $row ) {     
                     
                ?>    
                <option value="<?php echo $row['categoryID'] ?>">      
                    <?php echo $row['categoryName'] ?>    
                </option>    
                    <?php } ?> 
            </select>
       

            <label for="price">Price</label>  
            <input type="text" name="price" id="price">   
            <br><br>  
        
            <input type="submit" value="Update Product" class = "btn btn-danger my-3">  
            <a href="product-list.php" class="back btn btn-danger">Back</a> 
            <br><br>  
            </form>
    </body> 