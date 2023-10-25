<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        *{

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
            height: 85%;
            background: red;
        }
        #duoi{
            width: 100%;
            height: 5%;
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".btn-add-to-cart").click(function(){
                let id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    contentType: "application/json; charset=utf-8",
                    //dataType: "dataType",
                    url: "add_to_cart.php",
                    data: {id},
                    success: function (response) {
                        if(response == 1){
                            alert("Thành công");
                        }
                        else{
                            alert(response);

                        }
                    }
                    
                })
                
            });

        });
    </script>
</body>
</html>