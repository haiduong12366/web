<?php

session_start();
if(isset($_GET['type'])){
    unset($_SESSION['cart']);
    header('location:view_cart.php');
}
else{
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);

    header('location:view_cart.php');
}