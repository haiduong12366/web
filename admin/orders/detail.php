<?php require '../check_admin_login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Trang quản lí đơn hàng</a>
    <?php require '../connect.php';
    $id = $_GET['id'];
    $sql = "SELECT *
    from order_product
    inner join products on products.id = order_product.product_id
    where order_id = $id";
    $result = mysqli_query($connect,$sql);
    ?>
    <table  border="1" width="100%">
    <tr>
        <th>Ảnh</th>
        <Th>Tên sản phẩm</Th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Tổng tiền</th>

    </tr> 
<?php 
    $sum = 0;
        foreach($result as $each): ?>
        <tr>
            <td><img src="../products/photos/<?php echo $each['photo']?>" alt=""></td>
            <td><?php echo $each['name']?></td>
            <td><?php echo $each['price']?></td>
            <td>
                <?php echo $each['quantity']?>
            </td>
            <?php $result = $each['price'] * $each['quantity'];
            $sum += $result; ?>
            <td><?php echo $result . "$" ?></td>
        </tr>
    <?php endforeach?>
    </table>
    <h1>Tổng hóa đơn:<?php echo " " . $sum ?></h1>
</body>
</html>

