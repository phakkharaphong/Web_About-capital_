<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <title>เพิ่มประเภทของสินค้า</title>
    <link rel="stylesheet" href="insesrfrom.css">
</head>

<body>
    <div class="container my-2 container-main">
        <h2 class="text-center text-header">แบบฟอร์มบันทึกข้อมูล</h2>
        <form action="insert_Data.php" method="POST" enctype="multipart/form-data" class="main-form">
            <div class="from-group textbox-one">
                <label for="">รหัสสินค้า</label>
                <input type="text" name="p_id" id="name" class="form-control">
            </div>
            <div class="from-group textbox-one">
                <label for="pname">ชื่อสินค้า</label>
                <input type="text" name="p_name" id="" class="form-control">
            </div>
            <div class="from-group textbox-two">
                <label for="">รายละเอียดสินค้า</label>
                <input type="text" name="des" id="" class="form-control">
            </div>
            <div class="from-group textbox-one">
                <label for="price" class="my-2">ราคาสินค้า</label>
                <input type="text" name="price" id="" class="form-control">
            </div>
            <div class="from-group textbox-one">
                <label for="type" class="my-2">ประเภทสินค้า</label>
                <input type="text" name="type_id" id="" class="form-control">
            </div>
            <div class="from-group textbox-one">
                <label for="img" class="my-2">เพิ่มไฟล์รูปภาพ</label>
                <input type="file" name="file1" id="" class="form-control">
                <input type="submit" name="submit" value="upload" id="" class="form-control">
            </div>
            <div class="from-group textbox-one">
                <label for="type" class="my-2">เพิ่มจำนวนสินค้า</label>
                <input type="text" name="amount" id="" class="form-control">
            </div>
            <div class="btn-class2">
                <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
            </div>
            <div class="btn-class1">
                <input type="submit" value="บันทึกข้อมูล" onclick="check()" class="btn btn-success my-3 btn-kub">
            </div>




        </form>
        <div class="outer-form">
            <a href="index.php" class="btn btn-primary " name="home">กลับหน้าแรก</a>
            <a href="admin/index.php" class="btn btn-primary " name="home">กลับยังหน้าแอดมิน</a>
        </div>


    </div>
</body>
<script>
    function check() {
        var name = document.getElementById("name");
        var home = document.getElementById("home");
        if (name.value == null || name.value == '') {
            alert("NOOO");
        }
    }
</script>

</html>