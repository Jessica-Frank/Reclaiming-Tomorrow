<?php

require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $errors = login($_POST);
    
    if(count($errors) == 0)
    {
        header("Location: /rewards/redemption.php");
        die;
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">



</head>
<body>
    <?php include 'index.php';?>

    <h1></h1>

    

    <div>
        <div>
            <?php if(count($errors) > 0):?>
                <?php foreach ($errors as $error):?>
                    <?= $error?> <br>
                <?php endforeach;?>
            <?php endif;?>

        </div>

            <div class="wrapper">
                <div class="form-box login">
                    <h2>Login</h2>
                    <form action="#" method="post">
                    <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" id="email_or_username" name="email_or_username">
                    <label>Email/Username</label>
                </div>
                    <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" name="password">
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">
                    Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account?<a href="signup.php" class="register-link">Signup</a></p>
                </div>
    </form>
    </div>
    </div>

    </div>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>   

