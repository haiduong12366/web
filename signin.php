<?php

session_start();

if(isset($_COOKIE['remember']))
{
    $token = $_COOKIE['remember'];
    require 'admin/connect.php';
    $sql = "select * from customers
    where token = $token limit 1";
    $result  = mysqli_query($connect,$sql);
    $number_row = mysqli_num_rows($result);
    if($number_row == 1)
    {
        $each = mysqli_fetch_array($result);
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];
    }
    
}
if(isset($_SESSION['id']))
{
    header('location:user.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        a:link{
            text-decoration: none;
        }
    </style>
</head>
<body>
<form action="process_signin.php" method="post">
    Email
    <input type="text" name="email" autocomplete="false">
    <br>
    password
    <input type="password" name="password" autocomplete="false">
    <br>
    Ghi nhớ đăng nhập
    <input type="checkbox"  name="remember">
    <br>
    <a href="forgot_password.php">forgot_password</a>
    <br>
    <button>Đăng nhập</button>
</form>
    
</body>
</html>