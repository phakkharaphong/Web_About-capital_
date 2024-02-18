<?php
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
    <title>Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="show_product.css">
</head>

<body>
    <?php   include 'menu.php' ?>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <?php
                    //ดึงข้อมูลเเเละจัดเรียงตามรหัสproduct
                    $sql = "SELECT * FROM product ORDER BY p_id";
                    $resulet =  mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($resulet)){
                ?>
            <!--ส่วนของการแสดงของข้อมูล-->
            <div class="col-sm-3 warp">
                <div class="show">
                    <a href="sh_product_detail.php?p_id=<?php echo $row["p_id"];?>"><img
                            src="img/<?php echo $row["p_img"]; ?>" class="mb-4 image">
                    </a>
                    <br>
                    <h7 class="text-success name text-dark fw-bold"><?= $row['p_name']?></h7><br>
                    <div class="iconaprice">
                        <b class="text-danger price"><?= $row['price']?> ฿ </b>
                        <?php
                            if($row['amount']!=0){
                        ?>
                        <a href="order.php?p_id=<?=$row["p_id"];?>" class="btn btn-success cart"><i
                                class="fa-solid fa-cart-shopping"></i></a>
                        <?php
                            }
                            else{
                        ?>
                        <div class="text-danger non">สินค้าหมดชั่วคราว</div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <br>
            </div>
            <?php
                //ตัวปิดคำสั่งวนลูป
                }
                mysqli_close($con);
                ?>
        </div>
    </div>
    <!-- <?php   include 'footer.php' ?> -->
</body>

</html>