<ul>
    <li>
        <a href="http://localhost/web/">
            Trang chủ
        </a>
    </li>
    <li>
        <a href="../statistic">
            Thống kê
        </a>
    </li>
    <li>
        <a href="../manufacturers">
            Quản lý nhà sản xuất
        </a>
    </li>
    <li>
        <a href="../products">
            Quản lý nhà sản phẩm
        </a>
    </li>
    <li>
        <a href="../orders">
            Quản lý nhà đơn hàng
        </a>
    </li>
</ul>

<?php 
    if(isset($_SESSION['error'])){ ?>
        <span style="color:red"><?php echo $_SESSION['error']?></span>

<?php
    unset($_SESSION['error']);
}?>

<?php 
    if(isset($_SESSION['success'])){ ?>
        <span style="color:green"><?php echo $_SESSION['success']?></span>

<?php 
    unset($_SESSION['success']);
}?>