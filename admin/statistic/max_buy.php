<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require '../connect.php';
    $sql = "SELECT 
    products.id,
    products.name,
    products.photo,
    ifnull(sum(quantity),0) as quantity_sales
    from products
    left join order_product on order_product.product_id = products.id
    left join orders on orders.id = order_product.order_id
    where status = 1 or orders.id is NULL
    group by products.id
    order by quantity_sales desc, products.id asc";
    
    $result = mysqli_query($connect,$sql);
    ?>
    <table border="1" width = "100%">
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng bán được</th>
            <th>Ảnh</th>
        </tr>
        <?php foreach($result as $each): ?>
            <tr>
                <td><?php echo $each['name']?></td>
                <td><?php echo $each['quantity_sales']?></td>
                <td><img src="../products/photos/<?php echo $each['photo']?>" alt=""></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>