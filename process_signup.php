<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];
require 'admin/connect.php';

$sql = "select count(*) from customers
where email = '$email'";
$result  = mysqli_query($connect,$sql);
$number_row = mysqli_fetch_array($result)['count(*)'];

if($number_row > 0)
{
    header("location:signup.php?error=Email đã đăng ký");
}

$sql = "insert into customers(name,email,password,phone_number,address)
values('$name','$email','$password','$phone_number','$address')";
mysqli_query($connect,$sql);


$sql = "select id from customers
where email = '$email'";
$result  = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];

session_start();
$_SESSION['id'] =  $id;
$_SESSION['name'] =  $name;

header('location:user.php?success=Tạo thành công');

mysqli_close($connect);