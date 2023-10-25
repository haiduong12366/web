<?php require '../check_admin_login.php';?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
</head>
<body>
<?php require '../menu.php'; 
    require '../connect.php';
    $sql = "select * from manufacturers";
    $result_manufacturers = mysqli_query($connect,$sql);
    $sql = "select * from type";
    ?>
<form action="process_insert.php" method="post" enctype="multipart/form-data">
    
    Tên
    <input type="text" name="name">
    <br>
    Ảnh
    <input type="file" name="photo">
    <br>
    Giá
    <input type="price" name="price" id="">
    <br>
    Mô tả
    <textarea name="description" id="" cols="30" rows="10"></textarea>
    <br>
    Nhà sản xuất
    <select name="manufacturer_id">
        <?php foreach($result_manufacturers as $each): ?>
            <option value="<?php echo $each['id'] ?>">
                <?php echo $each['name'] ?>
            </option>
        <?php endforeach ?>
    </select>
    <br>
    Thể loại:
    <input type="text" name="type_id[]" id="type">
    <br>
    <button>Thêm</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>
<script src="typeahead.bundle.js"></script>
<script>
    $(document).ready(function(){
        $('#input').tagsinput({
        typeahead: {
            source: function(query) {
            return $.get('list_type.php');
            }
        }
        });

    })
</script>
</body>
</html>