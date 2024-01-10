<!doctype html> 
    <html> 
        <head>  
            <title>New Product</title>  
            <meta charset = "UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

            <link rel="stylesheet" href="css1/style1.css"> 
            <h1>Products Management</h1>
            <?php  
             include("conf/auth.php"); 
             include("admin-header.php");  ?>
        </head> 

        <body>
            <?php 
           
            include("conf/config.php");?>
            <form action= "product-add.php" method = "post" enctype = "multipart/form-data"> 
                <label for="productName">Product Name</label>  
                <input type="text" name="productName" id="productName" required>  
         
                <label for="image">Image</label>  
                <input type="file" name="image" id="image" required>  
         
                <label for="description">Description</label>  
                <textarea name="description" id="description" required></textarea>

                <label for="category">Category</label>
                <select name= "category" id="category" required="required" >
            
                    <option value = "" > --Choose--</option>
                    <?php 
                        $result = "SELECT categoryID, categoryName FROM category_info";
                        $stmt = $conn->query($result);                         
                        foreach($stmt as $row ) {  ?>   

                        <option value="<?php echo $row['categoryID'] ?>">      
                            <?php echo $row['categoryName'] ?>    
                        </option>    
                        <?php } ?> 
                </select>
                <label for="price">Price</label>  
                <input type="text" name="price" id="price" required>  
                <br><br>  
        
                <input type="submit" value="Add Product"  class = "btn btn-danger my-3">  
                <a href="product-list.php" class="back btn btn-danger">Back</a> 
            </form>
        </body>

