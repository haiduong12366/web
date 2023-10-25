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
    session_start();
    echo "Email đã được sử dụng";
    exit;
}
$sql = "SELECT max(id) as id from customers";
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'] + 1;

$sql = "insert into customers(id,name,email,password,phone_number,address)
values($id,'$name','$email','$password','$phone_number','$address')";
mysqli_query($connect,$sql);
require 'mail.php';
$title = "Đăng Ký Thành Công";
$content = "Chúc mừng bạn đăng ký thành công <a href='https://www.facebook.com/hai.duong1062002/'>click here</a>";

session_start();
$_SESSION['id'] =  $id;
$_SESSION['name'] =  $name;
//sendmail($email,$name,$title,$content);
mysqli_close($connect);
echo "1";

