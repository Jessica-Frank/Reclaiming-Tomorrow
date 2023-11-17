<?php


require "functions.php";
check_login();

$loggedInUsers = getLoggedInUsers();
$userProfile = getUserProfile($_SESSION['current']);
$loggedIn = isset($_SESSION['LOGGED_IN']);

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
        background-size: cover;
        background-position: center;

        padding-top: 64px;
        flex-direction: column;
        
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
    .user-icon {
            font-size: 1.2em; 
            color: #333;
            margin-right: 10px;
            cursor: pointer;
        }
    .edit-button {
        position: relative;
        top: -60px;
        right: -195px;
        font-size: 16px;
        color: #666;
        font-weight: 500;
        cursor: pointer;
        background-color: #000000; 
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        border: none;
        justify-content: flex-end;
        transition: .5s;
     }

    .edit-button:hover {
        background-color: #FAF1E4;
        color: #000000;
    }
    
.wrapper{     
  display: flex;
  position: relative;

}

.wrapper .sidebar{ /*Used to maintain content within the sidebar*/
  width: 200px;
  height: 200%;
  background: #609966;
  padding: 30px 0px;
  position: fixed;
  top: 50px;
}

.wrapper .sidebar h2{
  color: #FAF1E4;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;
}

.wrapper .sidebar ul li{
  padding: 10px;
  border-bottom: 1px solid #CEC5B7;
  border-bottom: 1px solid rgba(0,0,0,0.05);
  border-top: 1px solid rgba(255,255,255,0.05);
}    

.wrapper .sidebar ul li a{
  color: #FAF1E4;
  display: block;
}

.wrapper .sidebar ul li a .fas{
  width: 25px;
}

.wrapper .sidebar ul li:hover{ /*Used to modify the hovering style on the sidebar*/
  background-color: #9DC08B;
}
    
.wrapper .sidebar ul li:hover a{
  color: #FAF1E4;
} 

.wrapper .main_content{ /*Contains the main page content*/

  width: 100%;
  margin-left: 150px;
  margin-right: 20px;
}

.wrapper .main_content .info{
  margin: 20px;
  color: #717171;
  line-height: 25px;
}

.wrapper .main_content .info div{
  margin-bottom: 20px;
}

        
</style>

</head>
    <meta charset="UTF-8">
    <title>Reclaiming Tomorrow</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="styles.css">
    <body style="background-color: #FAF1E4;">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">



<body>
<header>
<h2 class="logo">Reclaiming Tomorrow</h2>
    <nav class="navigation">
        <a href="../index.php">Home</a>
        <a href="../maps/search">Search</a>
        <a href="../county_search/county">County Information</a>
        <a href="/rewards/redemption">Rewards</a>
        <a href="../verify/inbox">Contact Us</a>

        <?php if ($loggedIn): ?>
            <a href="../verify/logout" class="btnLogin-popup">Logout</a>
        <?php else: ?>
            <a href="../verify/login" class="btnLogin-popup">Login</a>
        <?php endif; ?>

    </nav>
</header>

<div class="profile-container">
    <h2><i class="fas fa-user user-icon"></i>Profile</h2>
   
    <a href="edit_profile.php" class="edit-button">EDIT</a>


    <?php if (check_login(false)): ?>
        <p class="profile-greeting">Hi, <?=$_SESSION['USER']->username?>!</p>

        

        <div class="profile-options">
    <a href="inbox.php">
        <button class="inbox-button" style="background-color: #000000; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Inbox</button>
    </a>
</div>
    <?php endif; ?>
</div>
    
<div class="wrapper">
    <div class="sidebar">
        <i class=""></i>
        <ul>
            <li><a href="/verify/dashboard"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="/verify/profile"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="/verify/display_reviews"><i class="fas fa-thin fa-comments"></i>Locations reviews</a></li>
            <li><a href="/verify/faq"><i class="fas fa-regular fa-question"></i>FAQ</a></li>
        </ul>
    </div>
    <div class="main_content">
        <div class="info">
            <div></div>
        </div>
    </div>
</div>
</body>
</html>

