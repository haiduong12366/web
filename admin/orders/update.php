<?php

$id = $_GET['id'];
$status = $_GET['status'];
require '../connect.php';

$sql = "UPDATE orders 
set
status = $status where id=$id";
mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');

