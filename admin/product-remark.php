<?php 
    include("conf/config.php");
    //GET product id and product name from prodict-list.php
    $id = $_GET['id'];
    $productName = $_GET['productName'];
  
  ?>  
  <!doctype html> 
    <html> 
        <head>  
            <title>Product Remark</title>  
            <meta charset = "UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="Author: May Phyu Sin Thant, Capital E-Commerce Website">

            <link rel="stylesheet" href="css1/style1.css"> 
            <h1>Product Management</h1>

        </head> 
        <body> 
            <?php include("conf/auth.php"); ?>
            
            <form  method = "POST">
                <input type="hidden" name="id" value="<?php echo $id ?>">

                <label for="productName">Product Name</label>  
                <input type="text" name="productName" id="productName" value = "<?php echo $productName?>"> 

                <label for = "remark"> SET PRODUCT REMARK </label>
                <select name= "remark" id="remark">
                    <option value = ""> Set Null</option>
                    <option value = "Buy 1 Get 1"> Buy 1 Get 1</option>
                    <option value = "Discount Item"> Discount Item</option>
                    <option value = "New Arrival"> New Arrival</option>
                    <option value = "Top-Ranked Product"> Top-Ranked Product</option>
                </select>
                <br><br>
                <input type = "submit" value = "Set Remark">

            </form>
        </body>
    </html>
<?php
  include("conf/config.php");
    if(isset($_POST['remark'])) {
        //POST values from FORM
        $id = $_POST['id'];
        $remark = $_POST['remark'];

        $sql = "UPDATE product_info SET remark= '$remark' WHERE productID = ?";
        //mysqli_query($conn, $sql);
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        header("location:product-list.php");
    }
?>



