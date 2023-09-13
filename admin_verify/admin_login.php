<?php

require "admin_functions.php";

$errors = array();

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $errors = login($_POST);
    
    if(count($errors) == 0)
    {
        header("Location: admin_profile.php");
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">


</head>
<body>
    <h1>Login</h1>

    <?php include('admin_header.php')?>

    <div>
        <div>
            <?php if(count($errors) > 0):?>
                <?php foreach ($errors as $error):?>
                    <?= $error?> <br>
                <?php endforeach;?>
            <?php endif;?>

        </div>
        <form method="post">  
        <div>
            <label for="email_or_username">Email or Username</label>
            <input type="text" id="email_or_username" name="email_or_username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password"> 
        </div>
            <button type="submit" class="btn btn-success">Login</button>
        </form>

    </div>
</body>
</html>   
