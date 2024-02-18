<?php
    //session_start();
    if(isset($_SESSION["username"]))
        header("location:home.php");
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
    <link rel="stylesheet" href="admin_log.css">
    <title>Log in Admin</title>
</head>
<body>
    <?php   include 'menu_login.php' ?>
    <br><br><br>
    <div class="desk">

        <div class="bedkit-body">
            <div class="bedkit">
                <div class="bedkit-text">
                    <div class="wrapform">
                        <h2>Admin Sign In</h2>
                        <br>
                        <form action="admincheck.php" method="POST" class="form-user">
                            <input type="text" name="admin_username" placeholder="Username"><br>
                            <input type="password" name="admin_password" placeholder="Password"><br>
                            <button type="submit" class="btn-signin">Sign In</button><br>
                            <span class="or">or</span><br>
                            <?php
            if(isset($_SESSION["Error"])){
                echo "<div class = 'text-danger'>";
                echo $_SESSION["Error"];
                echo "</div>";
            }
            ?>
                            <span class="admin">Back to <a href="login.php">User Sign In</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>