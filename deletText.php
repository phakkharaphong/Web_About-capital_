<?php


require('dbconnect.php');
$id = $_POST["p_id"];
//echo $id;
$sql = "DELETE FROM product WHERE p_id = '$id'";
mysqli_query($con,$sql);
if($sql){
    header("location:index.php");
    exit(0);

}else{
    echo "เกิดข้อผิดพลาด";
}


?>