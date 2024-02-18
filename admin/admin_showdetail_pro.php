<?php
    require('dbconnectadmin.php');
    $p_id = $_GET["p_id"];
    $sql = "SELECT * FROM product,type_product WHERE product.type_id = type_product.type_id AND  p_id='$p_id'";
    $resulet = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($resulet);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="sb-nav-fixed">
    <?php include'menu.php';?>

    <!--เมนูส่วนล่าง-->
    <div id="layoutSidenav_content">
        <br><br>
        <main>
            <div class="container-fluid px-4">
                <div class="card mb-4">
                    <!--ครอบตาราง-->
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        แสดงข้อมูลการสั่งซื้อสินค้า
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="alert alert-success">
                                <div class="text-center">
                                    <img src="../img/<?php echo $row["p_img"]?>" alt="" width="200">

                                </div><br>
                                <div class="row">
                                    <div class="col">
                                        <br>
                                        ชื่อเรื่อง : <?php echo $row["p_name"]?> <br><br>
                                        ประเภทสินค้า : <?php echo $row["type_name"]?><br><br>
                                        รายละเอียดสินค้า :<br> <?php echo $row["des"]?>
                                    </div>
                                </div>
                                <br><br>
                                <a href="adminshow_product.php" class="btn btn-outline-primary">BACK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include'footer.php';?>
    </div>
    </div>


</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>