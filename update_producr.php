<?php
    require('dbconnect.php'); 
    $p_id = $_GET["p_id"];
    $sql = "SELECT * FROM product WHERE p_id ='$p_id'";
    $resulet =  mysqli_query($con,$sql);
    $row = mysqli_fetch_assoc($resulet);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>อัพเดตสินค้า</title>
</head>
<body>
<div class  =  "container my-2">
        <h2 class = "text-center">แบบฟอร์มบันทึกข้อมูล</h2>
        <form action="update_data.php" method="POST" enctype="multipart/form-data" class="main-form">
                <input type = "hidden" value="<?php echo $row["p_id"];?>" name ="p_id">
                <div class="from-group">
                    <label for="pname" class = "my-2">ชื่อสินค้า</label>
                    <input type="text" name = "p_name" id = "name" value="<?php echo $row["p_name"]; ?>" class = "form-control">
                </div>
                <div class="from-group">
                    <label for="">รายละเอียดสินค้า</label>
                    <input type="text" name = "des" id = "" value="<?php echo $row["des"]; ?>" class = "form-control">
                </div>
                <div class="from-group">
                    <label for="price" class = "my-2">ราคาสินค้า</label>
                    <input type="text" name = "price" id = "" value="<?php echo $row["price"]; ?>" class = "form-control">
                </div>
                <div class="from-group">
                    <label for="type" class = "my-2">ประเภทสินค้า</label>
                    <input type="text" name = "type_id" id = "" value="<?php echo $row["type_id"]; ?>" class = "form-control">
                </div>
                <div class="from-group">
                    <label for="img" class = "my-2">เพิ่มไฟล์รูปภาพ</label>
                    <input type="file" name = "file1" id = "file1" class = "form-control">
                </div>
                <div class="from-group">
                    <label for="type" class = "my-2">เพิ่มจำนวนสินค้า</label>
                    <input type="text" name = "amount" id = "" value="<?php echo $row["amount"]; ?>" class = "form-control">
                </div>
                <input type="submit" value="บันทึกข้อมูล" onclick="check()" class = "btn btn-success my-3">
                <input type="reset" value="ล้างข้อมูล" class = "btn btn-danger">
            <a href="admin/product_update.php" class = "btn btn-primary ">กลับหน้าแรก</a>
        </form>        
    </div>
</body>
</html>