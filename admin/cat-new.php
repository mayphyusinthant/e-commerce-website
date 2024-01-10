<!doctype html> 
    <html> 
        <head>  
            <title>New Category</title>  
            <meta charset = "UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

            <link rel="stylesheet" href="css1/style1.css"> 
            <h1>Categories Management</h1>
            <?php  
            include("conf/auth.php"); 
            include("admin-header.php");  ?>
        </head> 
        <body> 
                       
            <form action = "cat-add.php" method = "POST">
                <label for = "name"> Category Name </label>
                <input type = "text" name = "name" id = "name" required>
                <br><br>
                <input type = "submit" value = "Add Category" class = "btn btn-danger my-3">
                <a href="cat-list.php" class="back btn btn-danger">Back</a> 

            </form>
        </body>
    </html>
