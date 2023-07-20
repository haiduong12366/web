<style type="text/css">
    .tung_san_pham{
        width: 33%;
        border: 1px solid black;
        height: 250px;
        float: left;
    }
</style>


<?php 
require 'admin/connect.php';
$sql = "select * from products";
$result =  mysqli_query($connect,$sql);
?>

<div id="giua" style="text-align: center;">
    <?php foreach($result as $each): ?>
        <div class="tung_san_pham">
            <h1>
                <?php echo $each['name'] ?>
            </h1>
                <img height="100" src="admin/products/photos/<?php echo $each['photo']?>">
            <p><?php echo $each['price'] ?>$</p>
            <a href="product.php?id=<?php echo $each['id']?>">Xem chi tiết</a>
            <?php if(isset($_SESSION['id'])) { ?>
                <br>
                <a href="add_to_cart.php?id=<?php echo $each['id']?>">Thêm vào giỏ hàng</a>
    
            <?php } ?>
        </div>
    <?php endforeach ?>
</div>