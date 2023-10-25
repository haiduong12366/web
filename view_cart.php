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
                <tr class="products">
                    <td><img src="admin/products/photos/<?php echo $each['photo']?>" alt=""></td>
                    <td><?php echo $each['name']?></td>
                    <td>
                        <span class="span-price">
                            <?php echo $each['price']?>
                        </span>
                        
                    </td>
                    <td>

                    <button data-type="decrease" class="btn-update-quantity" data-id="<?php echo $id?>">-</button>

                        <!-- <a class="adjust" href="update_quantity_in_cart.php?id=<?php echo $id?>&type=decrease">-</a> -->
                        <span class="span-quantity">
                            <?php echo $each['quantity']?>
                        </span>
                        
                        
                        <!-- <a class="adjust" href="update_quantity_in_cart.php?id=<?php echo $id?>&type=increase">+</a> -->
                        <button data-type="increase" class="btn-update-quantity" data-id="<?php echo $id?>">+</button>
                    </td>
                    <?php $result = $each['price'] * $each['quantity'];
                    $sum += $result; ?>
                    <td>
                        <span class="span-sum">
                            <?php echo $result . "$" ?>
                        </span>
                    </td>
                    <td><button data-type="1" class="btn-delete" data-id="<?php echo $id?>">X</button></td>
                    <!-- <td><a class="adjust2" href="delete_from_cart.php?id=<?php echo $id?>">Xóa</a></td>   -->
                </tr>
                
            <?php endforeach?>
        
    <?php }?>
</table>

<?php if(isset($_SESSION['cart'])){ ?>

    <button style="direction:rtl;position:absolute ;right: 30px;color:red;" data-type="0" class="btn-delete" >Xóa tất cả</button>
    <!-- <a style="direction:rtl;position:absolute ;right: 30px;color:red;" class="adjust2"   href="delete_from_cart.php?type=deleteall">Xóa tất cả</a> -->

<?php }?>

    <h1 >Tống hóa đơn:
        <span id="span-total"><?php echo " " . $sum ?></span>  
        $
    </h1>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".btn-update-quantity").click(function () { 
            let btn = $(this)
            let id = btn.data('id');
            let type = $(this).data('type');
            $.ajax({
                type: "GET",
                url: "update_quantity_in_cart.php",
                data: {id, type},
                
            })
            .done(function(){
                let parent_tr = btn.parents('tr');
                let price = parent_tr.find('.span-price').text();
                let quantity = parent_tr.find('.span-quantity').text();
                if(type == 'increase'){
                    if(quantity < 10){
                        quantity++;
                    }
                }
                else{
                    quantity--;
                }
                if(quantity == 0){
                    parent_tr.remove();
                }
                else{
                    parent_tr.find('.span-quantity').text(quantity);
                    let sum = price * quantity;
                    parent_tr.find('.span-sum').text(sum + '$');
                }
                
            })
            
         })
         $(".btn-delete").click(function () { 
            let btn = $(this)
            let type = $(this).data('type');
            if(type == '1'){
               
                let id = btn.data('id');
                $.ajax({
                    type: "GET",
                    url: "delete_from_cart.php",
                    data: {id, type},
                    success: function (response) {
                        btn.parents('tr').remove();
                        getTotal();
                    }
                })
                
            }
            else{
                //document.getElementById("my-element").remove();
                $.ajax({
                    type: "GET",
                    url: "delete_from_cart.php",
                    data: {type},
                    success: function (response) {
                        $(".products").remove();     
                        getTotal();
                    }       
                })
                
                    
            }
         })
         function getTotal(){
            let total = 0
                $(".span-sum").each(function(){
                    total += parseFloat($(this).text());

                })
                $("#span-total").text(total);
         }
    })
</script>
</body>
</html>