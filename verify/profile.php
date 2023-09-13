<?php

    require "functions.php";
    check_login();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">


</head>
<body>
    <h1>Profile</h1>

    <?php include('header.php');?>

    <?php if(check_login(false)):?>
        Hi, <?=$_SESSION['USER']->username?>!

        <br><br>
        <?php if(!check_verification()):?>
            <a href="verify.php">
                <button>Verify Profile</button>
            </a>
        <?php endif;?>
    <?php endif;?>


</body>
</html>   

