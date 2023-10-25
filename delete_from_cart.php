<?php
session_start();

$type = $_GET['type'];

if($type === "1"){
    $id = $_GET['id'];
    unset($_SESSION['cart'][$id]);
    
    // header('location:view_cart.php');
}
else{
    unset($_SESSION['cart']);

    // header('location:view_cart.php');
}