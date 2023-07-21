<?php 
session_start();
//empty kiem tra co gia tri do hoac gia tri do có = 0 không
if(empty($_SESSION['level']))
{
    $_SESSION['error'] = "Cần tài khoản admin cao hơn";

    header('location:../index.php');
    exit;
}