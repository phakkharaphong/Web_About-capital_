<?php
    session_start();
    require('dbconnect.php');
    //$f_name = $_GET["f_name"];
    /*$sql = "SELECT * FROM order_detail,product,order_user WHERE order_detail.order_id = order_user.order_id 
    AND order_detail.p_id = product.p_id AND f_name='".$_SESSION["f_name"]."' order by order_detail.order_id";
    */
    $sql = "SELECT * FROM order_user,user WHERE order_user.id_user = user.id_user AND order_user.id_user='".$_SESSION['id_user']."'";
    $resulet =  mysqli_query($con,$sql);
    $order = 1;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Oder</title>
</head>
<body>
        <?php //include'menu.php';?>
            <!--เมนูส่วนล่าง-->
            <div id="layoutSidenav_content">
                <br><br>
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <!--ครอบตาราง-->
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                แสดงข้อมูลการสั่งซื้อสินค้าของคุณ <?php echo $_SESSION["f_name"]."  ".$_SESSION["l_name"] ;?>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr class = "text-center">
                                            <th>ลำดับ</th>
                                            <th>รหัสใบสั่งซื้อ</th>
                                            <th>ราคารวม</th>
                                            <th>สถานะ</th>
                                            <th>แจ้งชำระเงิน</th>
                                            <th>ยกเลิกการสั่งซื้อ</th>
                                            <th>รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <!--ส่วนของการแสดงตาราง orderQty-->
                                   
                                    <tbody class="text-center">
                                    <?php
                                        while($row =  mysqli_fetch_array($resulet)){
                                        $sum = $row["total_price"];
                                    ?>
                                        <tr calss="text-center">
                                            <td><?php echo $order;?></td>
                                            <td><?php echo $row["order_id"];?></td>
                                            <td><?php echo $row["total_price"];?></td>
                                            <?php
                                                if($row['order_status'] == 1){
                                            ?>
                                            <td><button type="button" class="btn btn-danger" style="width: 15rem;" >ยังไม่ชำระสินค้า</button></td>
                                            <td><div class="input-group mb-3 my-2">
                                               <!-- <input type="file" class="form-control my-2" id="inputGroupFile02" style="width: 15rem;">
                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>-->
                                                <a href="iinform_payment.php?order_id=<?php echo $row["order_id"];?>" class="btn btn-outline-info">แจ้งชำระเงิน</a>
                                                
                                                </div>
                                            </td>
                                            <td>
                                                <a href="cancle.php?order_id=<?php echo $row["order_id"];?>" class="btn btn-outline-warning">ยกเลิกการสั่งซื้อ</a>
                                            </td>
                                            <?php
                                                }if($row['order_status'] == 2){
                                            ?>
                                            <td><button type="button" class="btn btn-success" style="width: 15rem;" >ชำระสินค้าแล้ว</button></td>
                                            <?php
                                                }if($row['order_status'] == 0){
                                            ?>
                                            <td><button type="button" class="btn btn-warning" style="width: 15rem;" >ยกเลิกการสั่งซื้อ</button></td>
                                            <?php
                                                }
                                            ?>
                                            <td><a href="orderde_user.php?order_id=<?php echo $row["order_id"];?>" class="btn btn-outline-secondary">รายละเอียด</a></td>
                                        </tr> 
                                       <?php
                                                $order++;
                                            }
                                        ?>
                                    </tbody> 
                                   
                                </table> 
                                
                                <a href="home.php" class="btn btn-primary mt-3">ย้อนกลับ</a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    
</body>
</html>