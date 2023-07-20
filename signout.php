<?php
session_start();
require 'check_login.php';
unset($_SESSION['id']);
unset($_SESSION['name']);
setcookie('remember',null,-1);

header('location:index.php');