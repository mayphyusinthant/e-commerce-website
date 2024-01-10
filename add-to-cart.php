<?php
    session_start();
    $id = $_GET['id'];
    $_SESSION['cart'][$id]++;
    header("location: showcase.php"); 
    /**
     * Consider that product id is 12.
     * Then,  $_SESSION['cart'][$id]++; will be  $_SESSION['cart'][12]++;
     * Value of Index 12 of cart session is initially = 0 
     * which will be incresed by 1 when user does add to cart process 
     * if there is a value in [$id] e.g. value of index 12, increased by 1 ++ 
     * If index 12 does not exists, php will create index 12 immediately and 
     * initilize value '1' in index 12
     * In this way, when user click the product of index 12 again,
     * index 12 will have value of 2.
     *      */
?>