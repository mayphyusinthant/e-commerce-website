<?php
    include("conf/config.php");
    $id = $_GET['id'];
    //write query to delele a category with associated row id(field)
    //$sql = "DELETE From category_info WHERE categoryID = $id";
    //mysqli_query($conn, $sql);

    try {
        $sql = "DELETE From category_info WHERE categoryID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        header("location: cat-list.php");
    }catch(PDOException $e){
        echo "Integirity Violation (Category ID Primary Key in Category Table 
        & Foreign Key in Product Table Issue) . Please delete all related 
        products before deleting category";
        echo "<br><a href = 'cat-list.php'>Go Back</a>";
    }
    
?>