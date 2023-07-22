<?php
$date = $_POST['date'];
$month = $_POST['month'];
$year = $_POST['year'];
if($month < 10 && $date <10)
    $day= $year.'-'  . '0'.$month .'-'.'0'.$date;
elseif($month < 10)
    $day= $year.'-'  . '0'.$month .'-'.$date;
elseif($date < 10)
    $day= $year.'-'  .$month .'-'.'0'.$date;
else
    $day= $year.'-'  .$month .'-'.$date;


$check =true;

    switch($month){
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            if($date > 31)
                 $check = false;
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            if($date > 30)
                 $check = false ;
            break;
        case 2:
            if(($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0){
                if($date > 29)
                    $check = false;

            }
            else if($date > 28)
                $check = false;
            break;
        }
if($check){
    header("location:index.php?date=$day");
    exit;
}
else{
    session_start();
    $_SESSION['error'] = "Ngày không hợp lệ";
    header("location:index.php");
    exit;
}