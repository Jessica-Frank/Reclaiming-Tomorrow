<?php
require "functions.php";
check_login();

$loggedInUsers = getLoggedInUsers();
?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins');

    * {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
    }

    body {
        background-color: #FAF1E4;
        background-color: #FAF1E4;
        background-size: cover;
        background-position: center;

        padding-top: 64px;
        flex-direction: column;

        min-height: 100vh;
    }

    header {
        top: 0;
        left: 0;
        width: 100%;
        padding: 10px 100px;
        background: #40513B;
        display: flex;
        position: fixed;
        justify-content: space-between;
        align-items: center;
        z-index: 99;
    }

    .logo {
        font-size: 1.2em; /* Adjust font size here */
        color: #FAF1E4;
        user-select: none;
    }

    .navigation {
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .navigation a {
        position: relative;
        font-size: 1em;
        color: #FAF1E4;
        text-decoration: none;
        margin-right: 40px;
        margin: 0 auto 0 60px;
    }

    .navigation a::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -6px;
        width: 100%;
        height: 3px;
        background: #FAF1E4;
        border-radius: 5px;
        transform-origin: right;
        transform: scaleX(0);
        transition: transform .5s;
    }

    .navigation a:hover::after {
        transform: scaleX(1);
    }

    .navigation .btnLogin-popup {
        font-size: 1em;
        color: #FAF1E4;
        background: transparent;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        justify-content: flex-end;
        transition: .5s;
        text-decoration: none;
    }

    .navigation .btnLogin-popup:hover {
        background: #CEC5B7;
        color: #162938;
    }

    .profile-container {
        max-width: 500px;
        margin: 50px auto;
        background-color: #9DC08B;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .profile-container h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    .profile-greeting {
        font-size: 18px;
        color: #333;
        margin-bottom: 20px;
    }

    .profile-options {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .profile-options a {
        text-decoration: none;
        margin: 10px;
    }

    .profile-options button {
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .profile-options button:hover {
        background-color: #1e87d1;
    }
</style>
</head>
    <meta charset="UTF-8">
    <title>Reclaiming Tomorrow</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="styles.css">
    
<body>
<header>
    <h2 class="logo">Reclaiming Tomorrow</h2>
    <nav class="navigation">
        <a href="../index.php">Home</a>
        <a href="../county_search/search">Search</a>
        <a href="#">Local Information</a>
        <a href="/rewards/redemption">Rewards</a>
        <a href="#">Contact Us</a>
        <a href="../verify/login" class="btnLogin-popup">Login</a>
    </nav>
</header>

<div class="profile-container">
    <h2>Profile</h2>

    <?php if (check_login(false)): ?>
        <p class="profile-greeting">Hi, <?=$_SESSION['USER']->username?>!</p>

        <?php if (!check_verification()): ?>
            <div class="profile-options">
                <a href="verify.php"><button>Verify Profile</button></a>
            </div>
        <?php endif; ?>

        <div class="profile-options">
            <a href="inbox.php"><button>Inbox</button></a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
