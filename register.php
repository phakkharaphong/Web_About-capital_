<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <title>Register User</title>
</head>
<body>
<?php   include 'menu.php' ?>
<div class="main-create">
        <div class="content">
            <div class="form-data">
                <form action="insert_register.php" method="POST">
                    <h1>Create Account</h1>
                    <div class="information">
                        <input type="text" name="username" placeholder="Username" class="form-control" required> <br>
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <div class="information2">
                        <input type="text" name="f_name" placeholder="Name" class="form-control" required>
                        <input type="text" name="l_name" placeholder="Lastname" class="form-control" required>
                    </div>
                    <div class="information">
                        <input type="text" name="add" placeholder="Address" class="form-control" required> <br>
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="information2">
                        <input type="tel" name="number_phone" maxlength="10" placeholder="Phone Number"
                            class="form-control" required>
                        <input type="date" name="birthday" placeholder="Birthday Date" class="form-control" required>
                    </div>
                    <input type="submit" name="submit" value="Create Account" class="submit-create">
                    <!-- <input type="reset" name="cancel" value="ยกเลิก" class="btn btn-primary my-3"> -->
                </form>
            </div>
            <span>Back to <a href="login.php">Login</a></span>
        </div>



    </div>
    
</body>
</html>