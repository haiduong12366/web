<?php
session_start();

if(empty($_SESSION['id'])){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style >
        .adjust2:link
        {
            text-decoration: none;
            color: red;
        }
        .adjust:link
        {
            text-decoration: none;
        }

    </style>
</head>
<body>
    <a href="index.php">Trang chủ</a>
<?php

$sum = 0;
?>
<table border="1" width="100%">
    <tr>
        <th>Ảnh</th>
        <Th>Tên sản phẩm</Th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>
        <th>Xoá</th>
    </tr> 
<?php if(isset($_SESSION['cart'])){ 
    $cart = $_SESSION['cart'];?>

    <?php foreach($cart as $id => $each): ?>
        <tr>
            <td><img src="admin/products/photos/<?php echo $each['photo']?>" alt=""></td>
            <td><?php echo $each['name']?></td>
            <td><?php echo $each['price']?></td>
            <td>
                <a class="adjust" href="update_quantity_in_cart.php?id=<?php echo $id?>&type=decrease">-</a>
                <?php echo $each['quantity']?>
                <a class="adjust" href="update_quantity_in_cart.php?id=<?php echo $id?>&type=increase">+</a>

            </td>
            <?php $result = $each['price'] * $each['quantity'];
            $sum += $result; ?>
            <td><?php echo $result . "$" ?></td>
            <td><a class="adjust2" href="delete_from_cart.php?id=<?php echo $id?>">Xóa</a></td>  
        </tr>
    <?php endforeach?>
<?php }?>
</table>
<?php if(isset($_SESSION['cart'])){ ?>
<a style="direction:rtl;position:absolute ;right: 30px;color:red;" class="adjust2"   href="delete_from_cart.php?type=deleteall">Xóa tất cả</a>
<?php }?>

<h1>Tống hóa đơn:<?php echo " " . $sum ?></h1>
<?php
$id = $_SESSION['id'];
require 'admin/connect.php';
$sql = "select * from customers
where id = $id";
$result = mysqli_query($connect,$sql);
$each   = mysqli_fetch_array($result);
?>
<?php if(!isset($_SESSION['level'])) {?>
    <form action="process_checkout.php" method="post">
    Tên người nhận:
    <input type="text" name="name_receiver" value="<?php echo $each['name']?>">
    <br>
    SĐT người nhận:
    <input type="text" name="phone_receiver" value="<?php echo $each['phone_number']?>">
    <br>
    Địa chỉ người nhận:
    <input type="text" name="address_receiver" value="<?php echo $each['address']?>">
    <br>
    <button>Đặt hàng</button>
</form>
<?php }?>

</body>
</html>