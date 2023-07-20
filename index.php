<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        *{
            border: 0;
            margin: 0;
        }
        #tong{
            width: 100%;
            height: 700px;
            background: black;
            
        }
        #tren{
            width: 100%;
            height: 10%;
            background: pink;
        }
        #giua{
            width: 100%;
            height: 80%;
            background: red;
        }
        #duoi{
            width: 100%;
            height: 10%;
            background: purple;
        }
    </style>
</head>
<body>
    <div id="tong">
        <?php include 'menu.php'; ?>
        <?php include 'products.php'; ?>
        <?php include 'footer.php'; ?>


    </div>
</body>
</html>