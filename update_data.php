<?php
require('dbconnect.php');
$p_id = $_POST["p_id"];
$p_name  = $_POST["p_name"];
$des= $_POST["des"];
$price = $_POST["price"];
$type_id= $_POST["type_id"];
$amount = $_POST["amount"];
if(is_uploaded_file($_FILES["file1"]["tmp_name"])){
   $new_image_name = 'b_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
   $image_upload_path = "img/".$new_image_name;
   move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
}else{
   $new_image_name="";
}
$sql = "UPDATE product  SET  p_name = ' $p_name' ,des = '$des', 
               price = '$price' ,type_id =  '$type_id' , amount = '$amount' ,p_img='$new_image_name' WHERE p_id ='$p_id'";
$resulet =  mysqli_query($con,$sql);
if($resulet){
   header("location:admin/product_update.php");
   exit(0);
}else{
   echo "เกิดข้อผิดพลาด";
}


?>