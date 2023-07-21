<?php
$token = $_GET['token'];
require 'admin/connect.php';
$sql = "SELECT * from forgot_password 
where token = '$token'";
$result  = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) === 0)
{
    header("location:forgot_password.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="process_change_new_password.php" method="post">
        Nhập mật khẩu mới
        <input type="password" name="password">
        <br>
        <input type="hidden" name="token" value="<?php echo $token?>">
        <button>Đặt lại mật khẩu</button>
    </form>
</body>
</html>