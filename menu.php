<?php
    session_start();
    //$sql = "SELECT * FROM"
    //$order_id = $_GET["order_id"];
    if(isset($_SESSION["f_name"])){
    $sql = "SELECT * FROM order_detail,product,order_user WHERE order_detail.order_id = order_user.order_id 
    AND order_detail.p_id = product.p_id AND f_name='".$_SESSION["f_name"]."'";
    $resulet =  mysqli_query($con,$sql);
    $order = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/eb1d8accb0.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="menu.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bgnavbar">
        <div class="container" style="padding-left: 4rem; padding-right: 4rem;">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="home.php">
                <img src="./img/brandlogo.png" height="50" alt="" loading="lazy" />
            </a>
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light font-weight-bold" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-product" href="show_product_only.php">Product</a>
                    </li>
                </ul>

                <!-- ************************************* -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link hidden-arrow" href="cart.php" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bag-shopping" style="font-size: 1.6rem; padding-right: 0.6rem;"></i>
                        </a>
                    </li>
                    <?php
        if(isset($_SESSION["username"])){
      ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="logout.php" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-right-from-bracket" style="font-size: 1.5rem; padding-right: 1rem;"></i>
                        </a>
                    </li>

                    <?php
          }else{
        ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="login.php" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user" style="font-size: 1.5rem; padding-right: 1rem;"></i>
                        </a>
                    </li>
                    <?php
          }if(isset($_SESSION["username"])){
          ?>
                    <a href="orderuser.php?f_name=<?php echo $_SESSION["f_name"];?>" class="btn btn-primary">
                        Order
                        <?php
            while($row =  mysqli_fetch_array($resulet)){
          ?>
                        <?php
               $order++;
            }
          ?>
                        <span class="badge bg-secondary"><?php echo $order;?></span>

                    </a>
                    <?php
          }
        ?>
                </ul>

                <!-- Search form -->
                <form class="d-flex input-group w-auto">
                    <input type="search" class="form-control" placeholder="Search" aria-label="Search"
                        style="border-radius: 18px 0 0 18px;" />
                    <button class="btn btnsearch" type="button" data-mdb-ripple-color="dark"
                        style="border-radius: 0 18px 18px 0;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</body>

</html>