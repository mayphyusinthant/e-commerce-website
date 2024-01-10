<?php
  include("conf/config.php");

  $id = $_POST['id'];
  $name = $_POST['name'];

  $sql = "UPDATE category_info SET categoryName='$name'WHERE categoryID = ?";
  //mysqli_query($conn, $sql);
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id]);
  header("location: cat-list.php");
?>

