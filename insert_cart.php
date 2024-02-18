<?php
session_start();
require('dbconnect.php');
$id_user = $_POST['id_user'];
$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$add = $_POST['add'];
$number_phone = $_POST['number_phone'];
$sql = "INSERT INTO order_user(id_user,f_name,l_name,number_phone,address,total_price,order_status)
VALUES($id_user,'$f_name','$l_name','$number_phone','$add','".$_SESSION["sumprice"]."','1')";

mysqli_query($con,$sql);
$orderID = mysqli_insert_id($con);
//เอาคำสั่งsqlมาฝากไว้ที่$_SESSION["order_id"] = $orderID; เพื่อที่จะอ้างไปยังprintorder
$_SESSION["order_id"] = $orderID;
#วนลูปแถวสินค้าในตระกร้า
for($i = 0;$i<= (int) $_SESSION["intLine"];$i++){
    #เช็คsessionรหัสสินค้าเท่ากับค่าว่างหรือไม่
    if($_SESSION["strProductID"][$i] != ""){
        //ดึงข้อมูลสินค้า
        $sql2 = "SELECT * FROM product WHERE p_id = '".$_SESSION["strProductID"][$i]."'";
        $resulet1 = mysqli_query($con,$sql2);
        $row = mysqli_fetch_array($resulet1);
        $price = $row['price'];
        

    }
        #เอาอะไรบ้าง

       // $total = $_SESSION["strQty"] [$i] * $_SESSION["sumprice"]; 
        $sql3 = "INSERT INTO order_detail(order_id,p_id,orderPrice,orderQty,Total) 
        VALUES('$orderID','".$_SESSION["strProductID"][$i]."','".$_SESSION["price"]."','".$_SESSION["strQty"] [$i]."','".$_SESSION["sumprice"]."')";


        if(mysqli_query($con,$sql3)){
            //ตัดสต็อกสินค้า
            $sql4 = "UPDATE product SET amount = amount-'".$_SESSION["strQty"] [$i]."' WHERE p_id = '".$_SESSION["strProductID"][$i]."'";
            mysqli_query($con,$sql4);
            echo "<script> alert('สั่งซื้อสำเร็จ') </script>";
            echo "<script> window.location='print_order.php'; </script>";
        }

    }

mysqli_close($con);

#เคลียร์ค่าตัวแปรsessionทีละตัว    
unset($_SESSION["intLine"]);
unset($_SESSION["sum_price"]);
unset($_SESSION["strProductID"]);
unset($_SESSION["strQty"]);

#เคลียร์ค่าตัวแปรsessionทั้งหมดแล้วเริ่มข้อมูลใหม่
//session_destroy();

?>