<?php
    session_start();
    require('dbconnect.php');

    $sql = "SELECT * FROM order_user,type_member,user WHERE order_id = '".$_SESSION["order_id"]."' AND user.member_code = type_member.member_code AND order_user.id_user = user.id_user";
    $result = mysqli_query($con,$sql);
    $rs = mysqli_fetch_array($result);
    $totalpirce = $rs['total_price'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>order_details</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="alert alert-info  text-center mt-4 mx-2" role="alert">
                    การสั่งซื้อเสร็จสมบูรณ์
                </div>

                    เลขที่ใบสั่งซื้อ : <?php echo $rs['order_id'];?> <br><br>
                    UID User : <?php echo $rs['id_user'];?> <br><br>
                    ชื่อ - นามสกุล : <?php echo $rs['f_name'];?>   <?php echo $rs['l_name'];?> <br>
                    ที่อยู่ :<?php echo $rs['address'];?> <br>
                    เบอร์โทรศัพท์ : 0<?php echo $rs['number_phone'];?> <br>
                    วันสั่งซื้อ : <?php echo $rs['reg_date'];?> <br><br>
                <div class ="card mb-4 mt-4">
                    <div class = "card-body">
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th >รหัสสินค้า</th>
                                <th >ชื่อสินค้า</th>
                                <th >จำนวน</th>
                                <th >ราคาสินค้า</th>
                                <th >ราคารวม</th>
                                <th >รายละเอียดส่วนลด</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql1 = "SELECT * FROM order_detail ord,product p WHERE ord.p_id = p.p_id 
                            AND  ord.order_id = '".$_SESSION['order_id']."'";
                            $result1 = mysqli_query($con,$sql1);
                            //$row = mysqli_fetch_array($result1);
                            while($row = mysqli_fetch_array($result1)){
                            ?>
                                <tr>
                                <td><?= $row['p_id']?></td>
                                <td><?= $row['p_name']?></td>
                                <td><?= $row['orderQty']?></td>
                                <td><?= $row['price']?></td>
                                <td><?= $_SESSION["sumprice"]?></td>
                                <td><?= $rs["member_detail"];?></td>
                                </tr>
                            </tbody>

                            <?php
                            }
                            ?>
                        </table> 
                    </div>
                        <h6 class="text-end">รวมเป็นเงิน <?php echo number_format($_SESSION["sumprice"],2)?> บาท</h6>
                    </div>
                </div>
            </div>
            <div>***************การุณาแจ้งชำระเงินภายในเวลา 3 วันหลังจาการทำรายการ ธนาคาร กรุงไทย ชื่อบัญชี นายภัครพงศ์ เจริญผล บัญชีออมทรัพย์ เลขที่บัญชี 9541-5475-9452 ***************<div>
            <div class = "text-center">
                <div>
                    <a href="show_product.php"class="btn btn-primary mt-5">กลับไปยังหน้าสินค้า</a>
                    <button class="btn btn-secondary mt-5 mx-2" onclick="window.print()">สั่งPrint</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>