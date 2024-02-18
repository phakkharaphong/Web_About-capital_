<?php
    require("dbconnect.php");
    $order_id = $_GET["order_id"];
    $sql = "SELECT * FROM order_detail,product,order_user,user,type_member WHERE order_detail.order_id = order_user.order_id AND user.member_code = type_member.member_code AND order_user.id_user = user.id_user AND order_detail.p_id = product.p_id AND order_detail.order_id='$order_id'";
    $resulet =  mysqli_query($con,$sql);
    $order = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <title>รายละเอียด</title>
</head>
<body>
    <br><br><br>
    <div class="container">
            <table class="table">
            <thead class="table-dark">
                <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">รหัสใบสั่งซื้อ</th>
                <th scope="col">ชื่อสินค้า</th>
                <th scope="col">จำนวน</th>
                <th scope="col">ราคารวม</th>
                <th>รายละเอียดส่วนลด</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row  = mysqli_fetch_array($resulet)){
                        $sum = $row["Total"];
                ?>
                <tr>
                    <th scope="row"><?php echo $order;?></th>
                    <td><?php echo $row["order_id"];?></td>
                    <td><?php echo $row["p_name"];?></td>
                    <td><?php echo $row["orderQty"];?></td>
                    <td><?php echo $row["Total"];?></td>
                    <td><?= $row["member_detail"];?></td>
                    
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
            <div>***************การุณาแจ้งชำระเงินภายในเวลา 3 วันหลังจาการทำรายการ ธนาคาร กรุงไทย ชื่อบัญชี นายภัครพงศ์ เจริญผล บัญชีออมทรัพย์ เลขที่บัญชี 9541-5475-9452 ***************<div>
            <a href="orderuser.php"class="btn btn-primary mt-5">กลับไปยังหน้าออเดอร์</a>
        </div>
</body>
</html>