<?php     require '../check_super_admin_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="process_insert.php" method="post">
    Tên
    <input type="text" name="name">
    <br>
    Địa chỉ
    <textarea  name="address" cols="30" rows="10"></textarea>
    <br>
    Điện thoại
    <input type="number" name="phone" id="">
    <br>
    Ảnh
    <input type="text" name="photo" id="">
    <br>
    <button>Thêm</button>
</form>
</body>
</html>