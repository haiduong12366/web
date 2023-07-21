<?php require '../check_super_admin_login.php';


if(empty($_GET['id'])){
    $_SESSION['error'] = "Truyền mã để xóa";
    header('location:index.php');
    exit;
}
$id = $_GET['id'];

require '../connect.php';
$sql = "delete from manufacturers
where id = $id";

mysqli_query($connect,$sql);
$error = mysqli_error($connect);
mysqli_close($connect);
if(empty($error)){
    $_SESSION['success'] = "Xóa thành công";
    header('location:index.php');
    exit;
}
else{
    $_SESSION['error'] = "Xóa không thành công";
    header("location:index.php");
    exit;
}



