<?php
    //session_start();
    require('dbconnect.php');

    if(isset($_SESSION["username"])){
        $sqlmem = "SELECT * FROM user,type_member WHERE user.member_code = type_member.member_code AND user.member_code='".$_SESSION["member_code"]."'";
        $resultmem = mysqli_query($con,$sqlmem);
        $rowmem = mysqli_fetch_array($resultmem);
        if($_SESSION["member_code"] == $rowmem["member_code"]){
            //$desle = $sumPrice /100;
            //$deessum = $rowmem["discount"] * $sumPrice ;//$desle;
            //$_SESSION["dis"]=$rowmem["discount"];
        
    }
   
    }

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
    <script src="https://kit.fontawesome.com/2db00bb8e9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cart.css">
    <title>My cart</title>
</head>

<body>
    <?php   include 'menu.php' ?>
    <br>
    <div class="container">
        <div class="alert alert-success p-2 head_shop">
            Shopping Cart
        </div>
    </div>
    <div class="container">
        <form action="insert_cart.php" method="POST">
            <div calss="row">
                <div calss="col-md-7">
                    <table class="table table-hover">
                        <tr class="header_name">
                            <th>No.</th>
                            <th></th>
                            <th>Name Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                        <?php
                        $Total = 0;
                        $sumPrice = 0;
                        //ตัววนลูป
                        $m = 1;
                        if(isset($_SESSION["intLine"])){
                        //ถ้าไม่เป็นว่างให้ทำงานใน {}
                        for($i = 0;$i<= (int) $_SESSION["intLine"];$i++){
                            if(isset($_SESSION["strProductID"][$i])){
                            if($_SESSION["strProductID"][$i] != ""){
                                $sql = "SELECT * FROM product WHERE p_id = '".$_SESSION["strProductID"][$i]."'";
                                $result = mysqli_query($con,$sql);
                                $row = mysqli_fetch_array($result);
                                $_SESSION["price"] = $row["price"];
                                //ควบคุมindexแต่ละรอบ
                                $Total = $_SESSION["strQty"] [$i];
                                $sum = $Total*$row["price"];
                                //ราคารวม
                                $sumPrice = (float)$sumPrice+$sum;
                               // $_SESSION["sum_price"] = $sumPrice;
                        ?>
                        <tr class="detail">
                            <td><?php echo $m ;?></td>
                            <td><img src="/img/<?php echo $row["p_img"]; ?>" heigth="100" width="80" class="border"></td>
                            <td><?php echo $row["p_name"] ;?></td>
                            <td><?php echo $row["price"];?></td>
                            <!--ปุ่มเพิ่มลด------------------------------------------------------------------>
                            <td>
                                <?php  if($_SESSION["strQty"] [$i]<$row['amount']){
                                ?>
                                <a href="order.php?p_id=<?=$row["p_id"];?>"
                                    class="btn btn-outline-success text-dark plus">+</a>
                                <!---เป็นการใช้ if ครอบ ปุ่มลบเพื่อถ้าสินค้ามีจำนวนเท่ากับ1จะไม่แสดงปุ่มลบ โดยใช้ตัวแปร$_SESSION["strQty"][$i] ในการเช็ค-->
                                <?php echo $_SESSION["strQty"] [$i]; ?>
                                <?php
                                }
                                
                                    if($_SESSION["strQty"][$i] > 0){
                                ?>
                                <a href="oderdel.php?p_id=<?=$row["p_id"];?>"
                                    class="btn btn-outline-danger text-dark reduce">-</a>
                                <?php
                                    }if($_SESSION["strQty"][$i]==$row['amount']){
                                ?>
                                <div class="text-danger">สินค้าเกินจำนวนที่กำหนดแล้ว</div>
                                <?php
                                    }
                                ?>
                            </td>
                            <!---------------------------------------------------------------------------->
                            <td><a href="de.php?Line=<?=$i?>" class="btn btn-danger mt-1">DELETE</a></td>
                        </tr>
                        <?php
                            $m = $m+1;
                        //ปิดลูป
                                }
                                if(isset($_SESSION["f_name"])){
                                $sums = $_SESSION["dis"] * $sumPrice;
                                $sumPrice = $sumPrice - $sums;
                                $_SESSION["sumprice"] = $sumPrice;
                                }
                                }
                                
                            }
                        }
                        ?>
                        <td></td>
                        <td class="text-end" colspan="4">TOTAL COST</td>
                        <td class="text-center"><?php echo $sumPrice;?>THB</td>
                    </table>
                    <br>
                </div>
        </form>

        <br>
        <?php
            if(isset($_SESSION["f_name"])){
            ?>
        <div class="btn-bottom">
            <a href="show_product.php" class="btn btn-outline-success mx-3 go-shop text-danger"><i
                    class="fa-solid fa-arrow-left"></i> Continue to Shopping</a>
            <button type="submit" class="btn btn-outline-success mx-3 confirm text-light">order confirmation</button>
        </div>
        <?php
            }if(!isset($_SESSION["f_name"])){

            ?>
             <div class="btn-bottom">
                <a href="show_product.php" class="btn btn-outline-success mx-3 go-shop text-danger"><i
                        class="fa-solid fa-arrow-left"></i> Continue to Shopping</a>
                        <div class="alert alert-danger mt-2" role="alert">
                                    **********การุณาล็อคอิน************
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
             </div>
            <?php
                }
            
            ?>
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success" h4 role="alert">
                    ข้อมูลการจัดส่ง

                    <?php
                        if(isset($_SESSION["f_name"])){
                        ?>
                </div>
                <div>
                        <label for=""class="from-group">UID</label>
                        <input type="text" name = "id_user" value="<?php echo  $_SESSION['id_user'];?>" class = "form-control" required>
                </div>       
                <div>
                    <label for="" class="from-group">ชื่อ</label>
                    <input type="text" name="f_name" value="<?php echo $_SESSION["f_name"];?>" class="form-control"
                         required>
                </div>
                <div>
                    <label for="" class="from-group">นามสกุล</label>
                    <input type="text" name="l_name" value="<?php echo $_SESSION["l_name"];?>" class="form-control"
                        required>
                </div>
                <div>
                    <label for="" class="from-group">ที่อยู่</label>
                    <!--<textarea class ></textarea>-->
                    <input type="text" name="add" value="<?php echo $_SESSION["address"];?>" class="form-control"
                        required>
                </div>
                <div>
                    <label for="" class="from-group">เบอร์โทรศัพท์</label>
                    <input type="tel" name="number_phone" maxlength="10" value="<?php echo $_SESSION["number_phone"];?>"
                        class="form-control" required>
                </div>
                <?php
                    //สิ้นสุด
                        }
                    ?>
            </div>
        </div>
        <br>
    </div>
</body>

</html>