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
                <a href="sh_product_detail.php?p_id=<?php echo $row["p_id"];?>"><img src="<?php echo $row["p_img"]; ?>"
                        width="230px" height="280" class="mb-4 image">
                </a>
                <br>

                <h7 class="text-success name text-dark fw-bold"><?= $row['p_name']?></h7><br>
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
            <br>
        </div>
        <?php
                //ตัวปิดคำสั่งวนลูป
                }
                mysqli_close($con);
                ?>
    </div>
</div>