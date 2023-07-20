
<style>
    li{
        list-style-type: none;
    }

</style>
<div id="tren"  >
    <ol style="position:relative ; left :-30px;">
        <li>
            <a  href="index.php">Trang chủ</a>
            <?php 
            if(isset($_SESSION['level'])){?>
            <a  style="direction:rtl;position:absolute ;right: 20px;color:red;" href="admin/root/">Trang người quản lý</a>
            <?php }?> 
        </li>
        <?php 
 
        if(empty($_SESSION['id'])){?>
        <li>
            <a href="signin.php">Đăng nhập</a>
        </li>
        <li>
            <a href="signup.php">Đăng Ký</a>
        </li>
        <?php } 
        else{ ?>
        
        <li>
            <?php echo "Chào, ". $_SESSION['name'];?>
            <a href="signout.php">Đăng xuất</a>
        </li>
        <li>
            <a href="view_cart.php">Xem giỏ hàng</a>
        </li>
        <?php }?>
        
    </ol>
</div>