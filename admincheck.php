<?php
   require('dbconnect.php');
   session_start();
   $admin_username = $_POST["admin_username"];
   $admin_password = $_POST["admin_password"];
   //$admin_password = hash('sha512',$admin_password);
   $sql = "SELECT * FROM admin_tb WHERE admin_username = '$admin_username' and  admin_password = '$admin_password'";
   $resulet = mysqli_query($con,$sql);
   $row = mysqli_fetch_array($resulet);
   if($row >0){
       $_SESSION['admin_username'] = $row['admin_username'];
       $_SESSION['admin_password'] = $row['admin_password'];
       $_SESSION['adf_name'] = $row['adf_name'];
       $_SESSION['adl_name'] = $row['adl_name'];
       $_SESSION['position'] = $row['position'];
       header("location:admin/index.php");
       
   }
   else{
       $_SESSION["Error"] ="<p> YOU username or password is Wrong </p>";
       $show = header("location:admin_log.php");

   }
   echo $show;

?>