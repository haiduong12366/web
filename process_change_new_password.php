<?php

$token = $_POST['token'];
require 'admin/connect.php';
$sql = "SELECT * from forgot_password 
where token = '$token'";
$result  = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) == 0)
{
    header("location:forgot_password.php");
}
else{
    $password = $_POST['password'];
    $each = mysqli_fetch_array($result);
    $id = $each['customer_id'];
    $sql = "UPDATE customers
    set
    password = '$password'
    where id =$id";
    mysqli_query($connect,$sql);

    $sql = "delete from forgot_password 
    where customer_id = '$id'";
    mysqli_query($connect,$sql);
    mysqli_close($connect);
    header('location:signin.php');
    exit;
}


