<?php
    require("dbconnect.php");
    $order_ud  = $_POST['order_id'];
    $pay_money = $_POST['pay_money'];
    $pay_date = $_POST['pay_date'];
    $pay_time = $_POST['pay_time'];

    if(is_uploaded_file($_FILES["file1"]["tmp_name"])){
        $new_image_name = 'b_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
        $image_upload_path = "payment/".$new_image_name;
        move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
    }else{
        $new_image_name="";
    }
    $sql = "INSERT INTO payment(pay_money,order_id,pay_date,pay_time,pay_image)
    VALUES('$pay_money','$order_ud','$pay_date','$pay_time','$new_image_name')";
    $resulet = mysqli_query($con,$sql);
    if($resulet){
        echo "<script>window.location='orderuser.php'</script>";
        echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
    }else{
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
    }


?>