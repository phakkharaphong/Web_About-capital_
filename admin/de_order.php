<?php
    session_start();
    require('dbconnectadmin.php');
    /*$p_id = $_GET["p_id"];
    $sql = "SELECT * FROM product WHERE p_id ='$p_id'";*/
    $order_id = $_GET["order_id"];
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
                        <i class="fas fa-table me-1"></i>
                        <?php
                                    $sql2 = "SELECT * FROM order_user,user WHERE order_user.id_user = user.id_user AND order_user.order_id='$order_id'";
                                    $resulet2 = mysqli_query($con,$sql2);
                                    $row2 = mysqli_fetch_array($resulet2);

                                ?>
                        แสดงข้อมูลการสั่งซื้อสินค้า ของ <?php echo $row2["username"];?>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รหัสใบสั่งซื้อ</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>จำนวนสินค้า</th>
                                    <th>ราคารวมต่อหน่วย</th>
                                </tr>
                            </thead>
                            <!--ส่วนของการแสดงตาราง-->

                            <tbody>
                                <?php
                                        while($row =  mysqli_fetch_array($resulet)){
                                        $sum = $row["total_price"];
                                        $_SESSION['sump'] = $row["total_price"];
                                    ?>
                                <tr>
                                    <td><?php echo $order;?></td>
                                    <td><?php echo $row["order_id"];?></td>
                                    <td><?php echo $row["p_name"];?></td>
                                    <td><?php echo $row["orderQty"];?></td>
                                    <td><?php echo $row["Total"];?></td>
                                </tr>
                                <?php
                                                $order++;
                                            }
                                        ?>
                                <td class="text-end" colspan="4">รวมเป็นเงิน</td>
                                <td class="text-center"><?php echo $sum;?></td>
                                <td calss="text-center">บาท</td>
                            </tbody>
                        </table>
                        <?php
                                $sqlpay = "SELECT * FROM payment WHERE order_id='$order_id'";
                                $resuletpay =  mysqli_query($con,$sqlpay);
                                $rowss =  mysqli_fetch_array($resuletpay);
                            ?><br>
                            <label for="">หลักฐานการชำระเงิน</label><br>
                            <img src="../payment/<?php echo $rowss['pay_image'];?>" width="300px" alt="" class="mt-2"><br><br>
                            <a href="status_order.php?order_id=<?php echo $order_id?>" class="btn btn-outline-primary">ปรับสถานะ</a><br><br>
                            <label for="">รายละเอียดการจัดส่ง</label><br>
                            <a href="devi.php?order_id=<?php echo $order_id?>" class="btn btn-outline-secondary">เพิ่มเลขพัสดุ</a><br><br>
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