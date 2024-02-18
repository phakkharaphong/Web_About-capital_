<?php
//ติดต่อฐานข้อมูลจากไฟล์dbconnect.php
    require('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="homecss.css" />
    <title>Home</title>
</head>

<body>
    <?php   include 'show_product.php' ?>
    <br>
    <divc class="container">
        <div class="text-center">
            <!--<img src="img/c1.png" class="img-fluid" alt="...">-->
            <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel" style="width = 1px">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                        aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner" width="10px">
                    <div class="carousel-item active">
                        <img src="img/ads1.png" class="text-center" alt="..." width="80%">
                    </div>
                    <div class="carousel-item">
                        <img src="img/ads2.png" class="text-center" alt="..." width="80%">
                    </div>
                    <div class="carousel-item">
                        <img src="img/ads3.png" class="text-center" alt="..." width="80%">
                    </div>
                    <div class="carousel-item">
                        <img src="img/ads4.png" class="text-center" alt="..." width="80%">
                    </div>
                    <div class="carousel-item">
                        <img src="img/ads5.png" class="text-center" alt="..." width="80%">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </divc>
    <?php   include 'footer.php' ?>
</body>

</html>