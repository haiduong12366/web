<?php
    require '../check_admin_login.php';

$name =$_POST['name'];
$photo =$_FILES['photo'];
$price =$_POST['price'];
$description =$_POST['description'];
$manufacturer_id =$_POST['manufacturer_id'];
$type_ids = $_POST['type_id'];

require '../connect.php';
$sql = "SELECT max(id) as id from products";
$result = mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'] + 1;


$folder = 'photos/'; 
$file_extention = explode('.',$photo['name'])[1];
$file_name = time() . '.' . $file_extention;
$target_file = $folder . time() . '.' . $file_extention;

move_uploaded_file($photo["tmp_name"], $target_file);

require '../connect.php';
$sql = "insert into products(id,name,photo,price,description,manufacturer_id)
values($id,'$name','$file_name','$price','$description','$manufacturer_id')";
mysqli_query($connect,$sql);

foreach($type_ids as $type_id){
    $sql = "insert into product_type
        values($id,$type_id)";
        mysqli_query($connect,$sql);
}


mysqli_close($connect);
$_SESSION['success'] = "Thêm thành công";
header('location:index.php');
exit;


