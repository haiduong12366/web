<style type="text/css">
    .tung_san_pham{
        width: 33%;
        height: 200px;
        float: left;
    }
</style>


<?php 
$id = $_GET['id'];
require 'admin/connect.php';
$sql = "select * from products
where id =$id";

$result =  mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
$number_rows = mysqli_num_rows($result);
if($number_rows > 0){
?>

<div id="giua">

    <div class="tung_san_pham">
        <h1>
            <?php echo $each['name'] ?>
        </h1>
            <img height="100" src="admin/products/photos/<?php echo $each['photo']?>">
        <p><?php echo $each['price'] ?>$</p>
        <p><?php echo $each['description']?></p>
    </div>

</div>
<?php }
else{
    header('location:index.php');
}
