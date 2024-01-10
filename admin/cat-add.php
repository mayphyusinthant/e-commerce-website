 <?php
    include("conf/config.php"); 
    
    $name = $_POST['name'];
    //$sql = "INSERT INTO category_info ( categoryName) VALUES  ('$name')";
    //mysqli_query($conn , $sql);
    //Using PDO Prepare statement to prevent SQL injuction.
    $sql= "INSERT INTO category_info (categoryName) VALUES  ( ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name]);
    //After requesting query, redirecting to cat-list.php
    header("location: cat-list.php"); 

?>