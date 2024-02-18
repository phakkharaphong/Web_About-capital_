<?php
    require('dbconnectadmin.php');
    $sql = "SELECT * FROM user,type_member WHERE user.member_code = type_member.member_code";
    $resulet =  mysqli_query($con,$sql);
    //$order = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="sb-nav-fixed">
    <?php include'menu.php';?>

    <!--เมนูส่วนล่าง-->
    <div id="layoutSidenav_content">
        <br><br>
        <main>
            <div class="container-fluid px-4">
                <div class="card mb-4">
                    <!--ครอบตาราง-->
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        แสดงข้อมูลผู้ใช้
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>UID</th>
                                    <th>Username</th>
                                    <th>สถานะสมาชิก</th>
                                    <th>ชื่อจริง</th>
                                    <th>นามสกุล</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>อีเมลล์</th>
                                    <th>วันเกิด</th>
                                </tr>
                            </thead>
                            <!--ส่วนของการแสดงตาราง-->

                            <tbody>
                                <?php
                                        while($row =  mysqli_fetch_array($resulet)){
                                    ?>
                                <tr>
                                    <td><?php echo $row['id_user'];?></td>
                                    <td><?php echo $row['username'];?></td>
                                    <td><?php echo $row['member_name'];?></td>
                                    <td><?php echo $row['f_name'];?></td>
                                    <td><?php echo $row['l_name'];?></td>
                                    <td><?php echo $row['address'];?></td>
                                    <td><?php echo $row['number_phone'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['birthday'];?></td>
                                </tr>
                                <?php
                                            }
                                        ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </main>
        <?php include'footer.php';?>
    </div>
    </div>


</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>