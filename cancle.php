<?php
    require("dbconnect.php");
    $order_id = $_GET["order_id"];
    $sql = "UPDATE order_user SET order_status = '0' WHERE order_id='$order_id'";
    $resulet = mysqli_query($con,$sql);
    if($resulet){
        header("location:orderuser.php");
        exit(0);
    }
?>