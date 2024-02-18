<?php
    require('dbconnect.php');
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = md5($_POST["password"]);
    //$sql = "SELECT * FROM user WHERE user.member_code = type_member.member_code AND username = '$username' and  password = '$password'";
    $sql = "SELECT * FROM user,type_member  WHERE username = '$username' and  password = '$password' AND user.member_code = type_member.member_code";
    $resulet = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($resulet);
    if($row >0){
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row["password"];
        $_SESSION["f_name"] = $row['f_name'];
        $_SESSION["l_name"] = $row['l_name'];
        $_SESSION["address"] = $row['address'];
        $_SESSION["member_code"] = $row['member_code'];
        $_SESSION["number_phone"] = $row['number_phone'];
        $_SESSION["member_detail"] = $row['member_detail'];
        $_SESSION["member_name"] = $row['member_name'];
        $_SESSION["dis"]=$row["discount"];
        $_SESSION["address"] = $row['address'];
        header("location:home.php");
        
    }
    else{
        $_SESSION["Error"] ="<p> YOU username or password is Wrong </p>";
        $show = header("location:login.php");

    }//echo $row;
    echo $show;




?>