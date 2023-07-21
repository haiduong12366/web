<?php
function current_url(){
    $url = "http://".$_SERVER['HTTP_HOST'];
    return $url;
}

$email = $_POST['email'];
require 'admin/connect.php';

$sql = "SELECT id,name from customers 
where email = '$email'";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result)==1){
    $each = mysqli_fetch_array($result);
    $id = $each['id'];
    $name = $each['name'];
    $sql = "SELECT count(*) from forgot_password
    where customer_id = $id";
    $result = mysqli_query($connect,$sql);
    $check = mysqli_fetch_array($result)['count(*)'];
    $token = uniqid("user_",true);
    if($check !== 1){
        $sql = "INSERT into forgot_password(customer_id,token)
        values('$id','$token')";
        mysqli_query($connect,$sql);
        $title = "Change new password";
        
        $link = current_url()."/web/change_new_password.php?token=$token";
        $content = "Bấm vào đây để tạo mật khẩu mới <a href='$link'>Hiệu lực trong 24 giờ</a>";
        require 'mail.php';
        sendmail($email,$name,$title,$content);
    }
    
}

