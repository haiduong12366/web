<?php require '../check_super_admin_login.php';


if(empty($_GET['id'])){
    header('location:index.php?error=Truyền mã để xóa');
}
$id = $_GET['id'];

require '../connect.php';
$sql = "delete from manufacturers
where id = $id";

mysqli_query($connect,$sql);
$error = mysqli_error($connect);
if(empty($error)){
    header('location:index.php?success=Xóa thành công');}
else{
    header("location:index.php?error = Xóa không thành công");
}
mysqli_close($connect);


