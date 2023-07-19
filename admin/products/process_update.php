<?php
require '../check_admin_login.php';

if(empty($_POST['id'])){
    header('location:index.php?error=Truyền mã để sửa');
}
$id = $_POST['id'];

$name =$_POST['name'];
$photo =$_FILES['photo_new'];
$price =$_POST['price'];
$description =$_POST['description'];
$manufacturer_id =$_POST['manufacturer_id'];
if($photo['size'] > 0)
{
    $folder = 'photos/'; 
    $file_extention = explode('.',$photo['name'])[1];
    $file_name = time() . '.' . $file_extention;
    $target_file = $folder . time() . '.' . $file_extention;
    move_uploaded_file($photo["tmp_name"], $target_file);
    
}
else
{
    $file_name = $_POST['photo_old']; 
}




require '../connect.php';
$sql = "update products
set
name = '$name',
photo = '$file_name',
price = '$price',
description = '$description',
manufacturer_id = '$manufacturer_id'
where id = $id";

mysqli_query($connect,$sql);
$error = mysqli_error($connect);
header('location:index.php?success=Sửa thành công');

mysqli_close($connect);


