<?php
    require('dbconnect.php');
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $fname = $_POST["f_name"];
    $lname = $_POST["l_name"];
    $add = $_POST["add"];
    $number = $_POST["number_phone"];
    $email = $_POST["email"];
    $birthday = $_POST["birthday"];
    $pass = md5($_POST["password"]);

    $sql  = "INSERT INTO user(username,password,f_name,l_name,address,number_phone,email,birthday,member_code)  
    VALUES('$user','$pass','$fname','$lname','$add','$number','$email','$birthday','V003')";
    $resulet =  mysqli_query($con, $sql);
    if($resulet){
       echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
       echo "<script> window.location='register.php'; </script>";
    }else{
        //echo "EER : ".$sql."<br>".mysqli_connect_error($con);
        echo "<script> alert('บันทึกถูกปฏิเสธ'); </script>";

    }
    mysqli_close($con);



?>