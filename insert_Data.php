<?php
  //connect
    //con = mysqli_connect("localhost","root","","mydata");
    //หรือ
    require('dbconnect.php');
    ////////////////////////////
        //importdbconnect
        $p_id = $_POST["p_id"];
        $p_name  = $_POST["p_name"];
        $des= $_POST["des"];
        $price = $_POST["price"];
        $type_id= $_POST["type_id"];
        ///$p_img = $_POST["file"];
        $amount = $_POST["amount"];
        if(is_uploaded_file($_FILES["file1"]["tmp_name"])){
          $new_image_name = 'b_'.uniqid().".".pathinfo(basename($_FILES['file1']['name']), PATHINFO_EXTENSION);
          $image_upload_path = "img/".$new_image_name;
          move_uploaded_file($_FILES['file1']['tmp_name'],$image_upload_path);
      }else{
          $new_image_name="";
      }
          $sql = "INSERT INTO product (p_id, p_name,des,price,type_id,p_img,amount) VALUES ('$p_id', '$p_name','$des', $price,'$type_id','$new_image_name',$amount)";
          $resulet =  mysqli_query($con , $sql);
            if($resulet){
                header("location:admin/adminshow_product.php");
                exit(0);
            }

    #save
    //$sql = "INSERT INTO product (p_id, p_name,des,price,type_id,p_img,amount) VALUES ('$p_id', '$p_name','$des', $price,'$type_id','$fileImage',$amount)";

    //mysqli_qurery($con , $sql); //สั่งรันคำสั่งsql
    



?>