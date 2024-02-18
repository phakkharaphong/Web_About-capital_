<?php
//ติดต่อฐานข้อมูลจากไฟล์dbconnect.php
    require('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="sh_product_detail.css">
    <title>My Shop</title>
</head>
<body>
    <?php   include 'menu.php' ?>
    <div class="container wraper">
        <div class="row mt-5">
            <?php
                $p_id = $_GET["p_id"];
                //เป็นการจอยตาราง2ตาราง
                $sql = "SELECT * FROM product,type_product WHERE p_id = '$p_id' and product.type_id = type_product.type_id";
                $resulet =  mysqli_query($con,$sql);
                $row = mysqli_fetch_array($resulet);
            ?>
            <div class="col-md-4 image">
                <img src="img/<?php echo $row["p_img"]; ?>" width="230px" height="280" class="border">
            </div>
            <div class="col-md-6 detail">
                ID : <?php echo $row["p_id"];?><br>
                <h7 class="text-success text-dark fs-2 text fw-bold"><?php echo $row["p_name"]; ?></h7> <br>
                ประเภทสินค้า : <?=$row['type_name']?> <br>
                <br>
                <b class="fs-4 text">Detail</b><br><br> <?php echo $row["des"]; ?>
                <br><br>
                <b class="text-danger bath"><?php echo $row["price"]; ?> THB </b>
                <?php
                        if($row['amount']!=0){
                    ?>
                <a href="order.php?p_id=<?=$row["p_id"];?>" class="btn btn-success cart">Add cart</a>
                <?php
                        }else{
                    ?>
                <div class="text-danger">สินค้าหมดชั่วคราว</div>
                <?php
                        }
                    ?>
            </div>
        </div>
    </div>
    <?php
                mysqli_close($con);
            ?>
</body>
</html>