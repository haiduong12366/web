<?php 
session_start();
require 'check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Form đăng ký</h1>
<form action="process_signup.php" method="post">
    Tên:
    <input type="text" name="name"  id="name" >
    <span id="name_error"></span>
    <br>
    Email:
    <input type="text" name="email" id="email">
    <span id="email_error"></span>
    <br>
    Mật khẩu:
    <input type="password" name="password" id="password">
    <span id="password_error"></span>
    <br>
    Sđt:
    <input type="text" name="phone_number" id="phone_number">
    <span id="phone_number_error"></span>
    <br>
    Địa chỉ
    <input type="text" name="address" id="address">
    <span id="address_error"></span>
    <br>
    <button id="click" onclick="return kiemtra()">Đăng ký</button>
    <script src="demo.js"></script> 
</form>
<?php 
    if(isset($_GET['error'])){ ?>
        <script type="text/javascript" >
            document.getElementById('email_error').innerHTML="Email đã đăng kí"
        </script>

<?php }?>
<?php 
    if(isset($_GET['success'])){ ?>
        <span style="color:green"><?php echo $_GET['success']?></span>

<?php }?>
</body>
</html>