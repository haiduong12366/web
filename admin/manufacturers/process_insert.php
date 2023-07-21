<?php
    require '../check_super_admin_login.php';

if(empty($_POST['name'])||empty($_POST['address'])||empty($_POST['phone'])||empty($_POST['photo'])){
    $_SESSION['error'] = "Phải điền đầy đủ thông tin";
    header('location:form_insert.php');
}
$name =$_POST['name'];
$address =$_POST['address'];
$phone =$_POST['phone'];
$photo =$_POST['photo'];

require '../connect.php';
$sql = "SELECT max(id) as id from manufacturers";
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'] + 1;



$sql = "insert into manufacturers(id,name,address,phone,photo)
values($id,'$name','$address','$phone','$photo')";

mysqli_query($connect,$sql);
mysqli_close($connect);
$_SESSION['success'] = "Thêm thành công";
header('location:index.php');
exit;

