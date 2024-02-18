<?php
    require('dbconnectadmin.php');
    session_start();
    $track_num = $_POST['track_num'];
    $status_deli = $_POST['status_deli'];
    $order_id = $_POST['order_id'];
    $delivery_code = $_POST['delivery_code'];
    if($delivery_code !=0){
        $sql2 = "SELECT  * FROM delivery_company WHERE delivery_code = '$delivery_code'";
        $resulet2 = mysqli_query($con,$sql2);
        $row = mysqli_fetch_array($resulet2);
        $sss = $_SESSION['sump'] + $row["delivery_price"];
    }
    
   
    $sql = "INSERT INTO delively (track_num,status_deli,order_id,delivery_code,sum_de) 
    VALUES ('$track_num', '$status_deli','$order_id','$delivery_code','$sss')";
    $resulet = mysqli_query($con,$sql);

    if($resulet){
        header("location:index.php");
        exit(0);
    }


?>