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
    <div class="ui-widget">
        <img id="project-icon" src="images/transparent_1x1.png" class="ui-state-default" alt>
        <input id="project" type="search" name="find" value="<?php echo $find?>" size="100">
        <input type="hidden" id="project-id">

    </div>


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
                    <button class="btn-add-to-cart" data-id="<?php echo $each['id']?>">Thêm vào giỏ hàng</button>
                    <br>
                    <!-- <a href="add_to_cart.php?id=<?php echo $each['id']?>">Thêm vào giỏ hàng</a> -->
        
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
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $( "#project" ).autocomplete({
                minLength: 0,
                source: 'search.php',
                focus: function( event, ui ) {
                    $( "#project" ).val( ui.item.label );
                    return false;
                },
                select: function( event, ui ) {
                    $( "#project" ).val( ui.item.label );
                    $( "#project-id" ).val( ui.item.value );
                    $( "#project-icon" ).attr( "src", "admin/products/photos/" + ui.item.photo );
                    
                    return false;
                }
            })
            .autocomplete( "instance" )._renderItem = function( ul, item ) {
                return $( "<li>" )
                    .append("<div>" + item.label + "<br>" + "<img src='admin/products/photos/"+ item.photo +"' height= '50'>" + "</div>")
                    .appendTo( ul );
            };
        } );
    </script>