<?php

require "functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $errors = signup($_POST);
    
    if(count($errors) == 0)
    {
        header("Location: login.php");
        die;
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="signup.css">

 
  
    



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
        <div class="signup-wrapper">
                <div class="form-box register">
                    <h2>Signup</h2>
                    <form action="#" method="post">
                    <div class="signup-input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="name" name="name">
                    <label>Name</label>
                </div>
                    <div class="signup-input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" id="email" name="email">
                    <label>Email</label>
                </div>
                    <div class="signup-input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="username" name="username">
                    <label>Username</label>
                </div>
                    <div class="signup-input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" name="password">
                    <label>Password</label>
                </div>
                    <div class="signup-input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password2" name="password2">
                    <label>Confirm password</label>
                </div>

                <div class="signup-remember-forgot">
                </div>
                <button type="submit" class="btn">Signup</button>
                <div class="signup-login-register">
                <p>Already have an account?<a href="login.php" class="login-link">Login</a></p>

            </div>
        </form>
    </div>
    </div>

    </div>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



        

    </div>
</body>
</html> 

