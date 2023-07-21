<?php
    require '../check_super_admin_login.php';

if(empty($_POST['id'])){
    $_SESSION['error'] = "Truyền mã để sửa";
    header('location:index.php');
}
$id = $_POST['id'];
if(empty($_POST['name'])||empty($_POST['address'])||empty($_POST['phone'])||empty($_POST['photo'])){
    $_SESSION['error'] = "Phải điền đầy đủ thông tin";
    header("location:form_update.php?id=$id");
}

$name =$_POST['name'];
$address =$_POST['address'];
$phone =$_POST['phone'];
$photo =$_POST['photo'];

require '../connect.php';
$sql = "update manufacturers
set
name = '$name',
address = '$address',
phone = '$phone',
photo = '$photo'
where id = $id";

mysqli_query($connect,$sql);
$error = mysqli_error($connect);
mysqli_close($connect);
if(empty($error)){
    $_SESSION['success'] = "Sửa thành công";
    header('location:index.php');
    exit;
}
else{   
    $_SESSION['error'] = "Lỗi truy vấn";
    header("location:form_update.php?id=$id");
    exit;
}



