<style type="text/css">
    #giua >.tren{
        width: 100%;
        height: 7%;
        background: white;
    }
    #giua >.giua{
        width: 100%;
        height: 90%;
        background: red;
    }
    #giua >.giua > .tung_san_pham{
        width: 33%;
        border: 1px solid black;
        height: 250px;
        float: left;
    }
    #giua >.duoi {
        background: white;
        width: 100%;
        height: 3%;     
    }
</style>


<?php 
$find = '';

if(isset($_GET['find']))
{
    $find = $_GET['find'];
}


$page = 1;
if(isset($_GET['page']))
{
    $page = $_GET['page'];
}

require 'admin/connect.php';


$sql = "select count(id) from products
where name like '%$find%'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
$result = $each['count(id)'];

$number_product_per_page = 6;
$page_number = ceil($result/$number_product_per_page);
$skip = $number_product_per_page  *  ($page - 1);


$sql = "SELECT * from products 
where
name like '%$find%'
order by id
limit $number_product_per_page offset $skip
";
$result =  mysqli_query($connect,$sql);

?>

<div id="giua" >
    <div class="tren" style="text-align: center;">
    <form action="">
            <input type="search" name="find" value="<?php echo $find?>" size="100" >
        </form>
    </div>
    <div class="giua" style="text-align: center;">
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
    <div class="duoi">
    <?php for($i=1; $i <= $page_number; $i++){?>
        <a style="text-decoration: none;" href="?page=<?php echo $i ?>&find=<?php echo $find ?>"> <?php echo $i ?> </a>
     <?php } ?>

    </div>
    <?php mysqli_close($connect) ?>
</div>