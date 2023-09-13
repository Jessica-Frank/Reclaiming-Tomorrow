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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">


</head>
<body>
    <h1>Signup</h1>

    <?php include('header.php')?>

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
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email">
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" id="username" name="username"> 
        </div>
        <div>
            <label for="password">Password</label>
            <input type="text" id="password" name="password">
        </div>
        <div>
            <label for="password2">Confirm password</label>
            <input type="text" id="password2" name="password2"> 
        </div>
        
        <button type="submit" class="btn btn-success">Submit</button>
        </form>

    </div>
</body>
</html>   
