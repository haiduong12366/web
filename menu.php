
<div id="tren"  >
    <ol style="position:relative ; left :-30px;">
        <li >
            <a  href="index.php">Trang chủ</a>
            <a  style="<?php if(!isset($_SESSION['level'])){?> display :none <?php }?>;direction:rtl;position:absolute ;right: 10px;color:red;" href="admin/root/">Trang người quản lý</a>
             
        </li>
        
        <li class="menu-guest" style="<?php if(isset($_SESSION['id'])){?> display:none <?php } ?>">
            <a href="signin.php">Đăng nhập</a>
        </li>
        <li class="menu-guest" style="<?php if(isset($_SESSION['id'])){?> display:none <?php } ?>">
            <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal-signup"> Đăng kí</button>
            
        </li>
        <li class="menu-user" style="<?php if(empty($_SESSION['id'])){?> display:none <?php } ?>" >
            Chào, 
            <span id="span-name">
                <?php echo $_SESSION['name'] ?? ''?>
            </span>
            <a href="signout.php">Đăng xuất</a>
        </li>
        <li class="menu-user" style="<?php if(empty($_SESSION['id'])){?> display:none <?php } ?>">
            <a href="view_cart.php">Xem giỏ hàng</a>
        </li>
    </ol>
</div>
<?php 
if(empty($_SESSION['id'])){
    include 'signup.php';
    //include 'signup.php';

}?>
