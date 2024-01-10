<?php 
    include("conf/config.php");

    $productName = $_POST['productName'];
    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name']; 

    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    if($image){
        move_uploaded_file($tmp, "covers/$image");
    }
    $sql= "INSERT INTO product_info (  productName, img, descriptions, categoryID, price) 
    VALUES ( ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$productName, $image, $description, $category, $price]);
    
    header("location: product-list.php"); 
?>