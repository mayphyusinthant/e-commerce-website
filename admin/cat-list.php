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
      <div class = "main  mx-3 my-3">
             <a href="cat-new.php" class="new ">New Category</a>  <br><br><br>
            <?php
                include("conf/config.php");
                $result = "SELECT * FROM category_info";
                $rows = $conn->query( $result); 
            ?>

            <ul class="list">
                <?php foreach( $rows as $row ) {  ?>
                    <li>
                        [ <a href="cat-del.php?id=<?php echo $row['categoryID'] ?>"
                            class="del" onClick="return confirm('Are you sure?')">del</a> ]
                        [ <a href="cat-edit.php?id=<?php echo $row['categoryID']?>&catName=<?php echo $row['categoryName']?>">edit</a> ]
                        <?php echo $row['categoryID'] ?>
                        <?php echo $row['categoryName'] ?>
                    </li>
                <?php } ?>
            </ul>
                </div>
            <p class = "text-muted"> &copy; 2022, Capital Company Limited, May Phyu Sin Thant</p>
    </body>
</html>