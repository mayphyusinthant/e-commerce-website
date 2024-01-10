<?php  
        include("conf/auth.php"); 
    include("conf/config.php");  
    $id = $_GET['id'];  
    try {
        $sql = "DELETE From product_info WHERE productID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        header("location: product-list.php"); 
    }catch(PDOException $e){
        echo "Integirity Violation (Product ID Primary Key in product_info Table 
        & Foreign Key in orderline Table Issue) . 
        Suggestion - This product has been sold out to lots of customers. If this product is deleted now, 
        data inconsistency will occur";
        echo "<br><a href = 'product-list.php'>Go Back</a>";
    }
?>

