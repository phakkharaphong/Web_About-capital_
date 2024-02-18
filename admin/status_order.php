<?php
    require('dbconnectadmin.php');
    /*$p_id = $_GET["p_id"];
    $sql = "SELECT * FROM product WHERE p_id ='$p_id'";*/
    $order_id = $_GET["order_id"];
    session_start();
    $sql = "SELECT * FROM order_detail,product,order_user WHERE order_detail.order_id = order_user.order_id AND order_detail.p_id = product.p_id AND order_detail.order_id='$order_id'";
    $resulet =  mysqli_query($con,$sql);
    $order = 1;
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
                    <form action="update_status.php" method="POST">
                        <i class="fas fa-table me-1"></i>
                        <?php
                                    $sql2 = "SELECT * FROM order_user,user WHERE order_user.id_user = user.id_user AND order_user.order_id='$order_id'";
                                    $resulet2 = mysqli_query($con,$sql2);
                                    $row2 = mysqli_fetch_array($resulet2);
                                    $_SESSION["order_id"] = $row2['order_id'];

                                ?>
                        ปรับสถานะ ของ <?php echo $row2["username"];?>
                    </div>
                    <br>
                        <br>
                   
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                <select class="form-select" name="p1" id="inputGroupSelect01" required>
                                    <option  value="">Choose...</option>
                                    <option  value="1" >ยังไม่ชำระสินค้า</option>
                                    <option value="0" >ยกเลิกการสั่งซื้อ</option>
                                    <option value="2" >ชำระสินค้าแล้ว</option>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-outline-primary">ยืนยัน</button>
                            </div>
                </form>
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