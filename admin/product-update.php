<?php
    include("conf/auth.php"); 
    include("conf/config.php");
    $id = $_POST['id'];
    $productName = $_POST['productName'];
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name']; 
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];


    if($image){
        move_uploaded_file($tmp , "covers/$image");
        $sql = "UPDATE product_info SET productName = ? , img = ?, 
        descriptions = ? , categoryID = ?,  price = ? 
        WHERE productID = ? ";   
        $stmt = $conn->prepare($sql);
        $stmt->execute([$productName, $image, $description, $category, $price, $id]);
    }
    else {
        $sql = "UPDATE product_info SET productName = ? , img = ?, 
        descriptions = ? , categoryID = ?,  price = ? 
        WHERE productID = ? ";   
        $stmt = $conn->prepare($sql);
        $stmt->execute([$productName, $image, $description, $category, $price, $id]);
    }
  
   header("location: product-list.php");
    
?>