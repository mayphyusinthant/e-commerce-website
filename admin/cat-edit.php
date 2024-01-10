<!doctype html> 
    <html> 
        <head>  
            <title>New Category</title>  
            <meta charset = "UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

            <link rel="stylesheet" href="css1/style1.css"> 
            <h1>Edit Category</h1>
            <?php 
            include("conf/auth.php"); 
            include("admin-header.php");  ?>
        </head> 

      <body>
        <?php include("conf/config.php");

        $id = $_GET['id'];
        $catName = $_GET['catName'];
        //$result = mysqli_query($conn, "SELECT * FROM category_info WHERE categoryID = $id");
        //$row = mysqli_fetch_assoc($result);
        //Using PDO to prevent sql injection
        $sql = "SELECT * FROM category_info WHERE categoryID = $id";
        $stmt = $conn->query($sql);
       
      ?>

      <form action="cat-update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <label for="name">Category Name</label>
        <input type="text" name="name" id="name" value="<?php echo $catName ?>">
        <br/><br/>
        
        <input type="submit" value="Update Category" class = "btn btn-danger my-3">
        <a href="cat-list.php" class="back btn btn-danger">Back</a> 
      </form>
  </body>
        


