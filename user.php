<?php session_start();
if(empty($_SESSION['id'])){
    header('location:signin.php?error=Chưa đăng nhập');
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
    <a href="index.php">Trang chủ</a><br>
    Đây là trang người dùng, xin chào bạn
    <?php echo $_SESSION['name'];?>
    <a href="signout.php">
        Đã đăng xuất rồi à
    </a>
</body>
</html>