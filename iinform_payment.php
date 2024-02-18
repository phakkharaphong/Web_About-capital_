<?php
    require("dbconnect.php");
    $order_id = $_GET["order_id"];
    $sql = "SELECT * FROM order_user WHERE order_id = '$order_id'";
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
    <title>แจ้งชำระเงิน</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="alert alert-info  text-center mt-4 mx-2" role="alert">
                    แจ้งชำระเงิน
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
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql1 = "SELECT * FROM order_detail ord,product p WHERE ord.p_id = p.p_id 
                            AND  ord.order_id='$order_id'";
                            $result1 = mysqli_query($con,$sql1);
                            //$row = mysqli_fetch_array($result1);
                            while($row = mysqli_fetch_array($result1)){
                            ?>
                                <tr>
                                <td><?= $row['p_id']?></td>
                                <td><?= $row['p_name']?></td>
                                <td><?= $row['orderQty']?></td>
                                <td><?= $row['orderPrice']?></td>
                                <td><?= $row['Total']?></td>
                                </tr>
                            </tbody>

                            <?php
                            }
                            ?>
                        </table> 
                    </div>
                        <h6 class="text-end">รวมเป็นเงิน <?php echo number_format($totalpirce,2)?> บาท</h6>
                    </div>
                </div>
            </div>
            <div>***************การุณาแจ้งชำระเงินภายในเวลา 3 วันหลังจาการทำรายการ ธนาคาร กรุงไทย ชื่อบัญชี นายภัครพงศ์ เจริญผล บัญชีออมทรัพย์ เลขที่บัญชี 9541-5475-9452 ***************<div>
            <div class = "text-center">
                <div>
                    <a href="orderuser.php"class="btn btn-primary mt-5">กลับไปยังหน้าสินค้า</a>
                    <button class="btn btn-secondary mt-5 mx-2" onclick="window.print()">สั่งPrint</button>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
 <div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <form method="POST" action="insert_payment.php" enctype="multipart/form-data">
                <div class="from-group mt-2">
                    <label for="">เลขที่ใบสั่งซื้อ</label>
                    <input type="text" name = "order_id" id = "order_id" value="<?php echo $rs["order_id"];?>" class = "form-control">
                </div>
                <div class="from-group mt-2">
                    <label for="">ชื่อ-นามสกุล</label>
                    <input type="text" name = "f_nameandl_name" id = "f_nameandl_name" value="<?php echo $rs["f_name"] ." ".$rs["l_name"];?>" class = "form-control">
                </div>
                <div class="from-group mt-2">
                    <label for="">จำนวนยอดสุทธิ</label>
                    <input type="text" name = "pay_money" id = "name" value="<?php echo $rs["total_price"];?>" class = "form-control">
                </div>
                
                <div class="from-group mt-2">
                    <label for="">วันที่โอน</label>
                    <input type="date" name = "pay_date"  class = "form-control">
                </div>
                <div class="from-group mt-2">
                    <label for="">เวลาที่โอน</label>
                    <input type="time" name = "pay_time" class = "form-control">
                </div>
                <label for="" calss = "mt-2">หลักฐานการชำระเงิน</label>
                <div class="input-group mb-3">
                    <input type="file" name="file1" class="form-control" >
                </div>
                <div class="from-group mt-2">
                    <button type="submit" name = "btn2" id = "btn2" class="btn btn-outline-success">ยืนยัน</button>
                </div>
            </form>
        </div>
    </div>
 </div>
</body>
</html>