<?php  
    require '../check_admin_login.php';

    $id = $_GET['id'];
    
    include '../connect.php';
    $sql = "SELECT * from order_product
    where product_id = $id";
    $result = mysqli_query($connect,$sql);

    if(mysqli_num_rows($result) > 0)
    {
        $sql = "delete from order_product 
    where product_id = $id";
        mysqli_query($connect,$sql);
    }

    $sql = "SELECT * from orders 
    left join order_product on orders.id = order_product.order_id";
    $result = mysqli_query($connect,$sql);
    foreach($result as $each){
        if(isset($each['id'])&&empty($each['product_id']))
        {
            $each_id = $each['id'];
            $sql = "delete from orders 
                where id =  $each_id";
            mysqli_query($connect,$sql);
        }
    }
    $sql = "select photo from products
    where id = $id";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result)['photo'];

    $sql = "delete from products
    where id = $id";
    mysqli_query($connect,$sql);
    mysqli_close($connect);
    $file = "photos/$each";
    if(!unlink($file)){
        $_SESSION['error'] = "Chưa xóa được ảnh";
    }
    else{
        $_SESSION['success'] = "Xóa thành công";
    }
    header('location:index.php');
    exit;