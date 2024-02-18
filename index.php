<?php
    require('dbconnect.php');
    $sql = "SELECT * FROM product INNER JOIN type_product ON product.type_id = type_product.type_id";
    $resulet =  mysqli_query($con,$sql);
    $order = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb1d8accb0.js" crossorigin="anonymous"></script>
    <title>ระบบเพิ่มสินค้าในคลัง</title>
    <link rel="stylesheet" href="index.css">
</head>

<body class="p-3 mb-2 text-emphasis-success ">
    <div class="container">
        <h1 class="text-center" style="font-weight: 800;">ระบบเพิ่มสินค้า</h1>
        <hr>
        <br>
        <form action="deletText.php" method="post" class="index-main">
            <div class="container-emp">
                <lable for="" class="la-empid"> รหัสพนักงาน</lable>
                <input type="text" placeholder="ป้อนรหัส USER เพื่อลบ" name="p_id" class="form-control stafid">
                <!-- <input type="submit" value="ลบข้อมูล" class="btn btn-outline-danger my-2"> -->
                <button type="submit" value="ลบข้อมูล" class="btn btn-outline-danger my-2"><i
                        class="fa-solid fa-trash"></i></button>
            </div>
            <form>
                <br>
                <form action="searchData.php" method="post">
                    <div class="container-book">
                        <lable for="" class="search-book">ค้นหาหนังสือ</lable>
                        <input type="text" placeholder="ป้อนชื่อหนังสือ" name="p_id" class="form-control add-namebook">
                        <!-- <input type="submit" value="ลบข้อมูล" class="btn btn-outline-danger my-2"> -->
                        <button type="submit" value="ลบข้อมูล" class="btn btn-outline-danger my-2"> <i
                                class="fa-solid fa-trash"></i></button>
                    </div>

                    <form>

                    </form>
                    <table class="form-control">
                        <thead>
                            <tr>
                                <th class="ordernum">ลำดับ</th>
                                <th class="centerfix">ประเภทสินค้า</th>
                                <th class="centerfix">ชื่อประเภท</th>
                                <th class="centerfix">รหัสสินค้า</th>
                                <th class="centerfix">ชื่อสินค้า</th>
                                <th class="centerfix">รายละเอียดสินค้า</th>
                                <th class="centerfix">ราคาสินค้า</th>
                                <th class="centerfix">จำนวนสินค้า</th>
                                <th class="centerfix">รูปภาพ</th>
                                <th class="centerfix">แก้ไขข้อมูล</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!----สร้างเทเบิลแสดงข้อมูล--->
                            <?php   while($row =  mysqli_fetch_assoc($resulet)){?>
                            <tr>
                                <td class="ordernum">
                                    <?php echo $order++; ?>
                                </td>
                                <td class="centerfix">
                                    <?php echo $row["type_id"]; ?>
                                </td>
                                <td class="centerfix">
                                    <?php echo $row["type_name"]; ?>
                                </td>
                                <td class="centerfix">
                                    <?php echo $row["p_id"]; ?>
                                </td>
                                <td class="centerfix">
                                    <?php echo $row["p_name"]; ?>
                                </td>
                                <td class="centerfix">
                                    <?php echo $row["des"]; ?>
                                </td>
                                <td class="centerfix">
                                    <?php echo $row["price"]; ?>
                                </td>
                                <td class="centerfix">
                                    <?php echo $row["amount"]; ?>
                                </td>
                                <td class="centerfix"><img src="<?php echo $row["p_img"]; ?>" class="w-50 p-3"></td>
                                <td><a href="update_producr.php?p_id=<?php echo $row["p_id"];?>"
                                    class="btn btn-outline-success my-3">อัพเดตสินค้า</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="bottom-menu">
                        <a href="admin/index.php" class="btn btn-primary my-3 btn-backhome" name="home">กลับหน้าแรก</a>
                        <a href="insesrfrom.php" class="btn btn-outline-success my-3 btn-add">เพิ่มประเภทของสินค้า</a>
                    </div>

                </form>
            </form>
    </div>
</body>

</html>