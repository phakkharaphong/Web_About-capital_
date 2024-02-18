<?php
    require('dbconnectadmin.php');
    $username = $_GET["username"];
    $sql = "SELECT * FROM user WHERE username='$username'";
    $resulet =  mysqli_query($con,$sql);
    $row = mysqli_fetch_array($resulet);
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
                    <div class="container my-2">
                        <h2 class="text-center">แบบฟอร์มบันทึกข้อมูล</h2>
                        <form action="update_user.php" method="POST">
                            <input type="hidden" value="<?php echo $row["username"];?>" name="username">
                            <div class="from-group">
                                <label for="pname" class="my-2">Username</label>
                                <input type="text" name="username" id="username" value="<?php echo $row["username"]; ?>"
                                    class="form-control" aria-label="Disabled input example" disabled>
                            </div>
                            <div class="from-group">
                                <label for="">password</label>
                                <input type="password" name="password" id="" class="form-control">
                            </div>

                            <input type="submit" value="บันทึกข้อมูล" onclick="check()" class="btn btn-success my-3">
                            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php include'footer.php';?>
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