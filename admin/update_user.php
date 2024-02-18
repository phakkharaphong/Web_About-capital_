<?php
    require('dbconnectadmin.php');
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = md5($_POST["password"]);
    $sqli = "UPDATE user  SET  password='$password' WHERE username ='$username'";
    $resulet =  mysqli_query($con,$sqli);
    if($resulet){
        echo "<script> alert('รีเซ็ทสำเร็จ') </script>";
        header("location:recro.php");
        exit(0);
    }else{
        echo "เกิดข้อผิดพลาด";
    }
?>