<?php
require "functions.php";
check_login();

// Get the list of logged-in users
$loggedInUsers = getLoggedInUsers();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <title>Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>
<body>
    <h1>Profile</h1>
    

    <?php if (check_login(false)): ?>
        Hi, <?=$_SESSION['USER']->username?>!

        <br><br>

        <?php if (!check_verification()): ?>
            <a href="verify.php">
                <button>Verify Profile</button>
            </a>
        <?php endif; ?>

        <a href="inbox.php">
                <button>Inbox</button>
            </a>

        <br><br>

        <?php if (!empty($loggedInUsers)): ?>
            <h2>Logged-In Users:</h2>
            <ul>
                <?php foreach ($loggedInUsers as $user): ?>
                    <li><?=$user->username?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No users are currently logged in.</p>
        <?php endif; ?>

    <?php endif; ?>

</body>
</html>

