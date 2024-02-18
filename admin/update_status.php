<?php 

    require("dbconnectadmin.php");
    session_start();
    $order_status = $_POST['p1'];
    $sql = "UPDATE order_user SET order_status='$order_status' WHERE order_id='".$_SESSION["order_id"]."'";
    $resulet = mysqli_query($con,$sql);
    if($resulet){
        header("location:report_order.php");
        exit(0);
    }
    unset($_SESSION["order_id"]);

?>