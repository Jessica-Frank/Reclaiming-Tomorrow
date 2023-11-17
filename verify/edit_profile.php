<?php


require "functions.php";

$errors = array();


// Process the form submission and call updateProfile with the POST data
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $errors = updateProfile($_POST);

    if (count($errors) == 0) {
        // Profile updated successfully, update the session variable
        $_SESSION['USER']->username = $_POST['username'];
        // Redirect the user to their profile page or a success page
        header("Location: profile.php");
        die;
    }
}

// Fetch the user's current profile information
$userProfile = getUserProfile($_SESSION['current']);

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
  margin-left: 1326px;
  top: 25px;
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
<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="signup.css">
 
</head>
<body>

    <?php include "../include/header.php"; ?>

     <div class="signup-wrapper">
        <div class="form-box register">
            <h2>Edit Profile</h2>
            <form action="#" method="post">
                <div class="signup-input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="name" name="name" value="<?= $userProfile['name'] ?>">
                    <label>Name</label>
                </div>
                <div class="signup-input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" id="email" name="email" value="<?= $userProfile['email'] ?>">
                    <label>Email</label>
                </div>
                <div class="signup-input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="username" name="username" value="<?= $userProfile['username'] ?>">
                    <label>Username</label>
                </div>

                <div class="signup-remember-forgot">
                </div>
                <button type="submit" class="btn">Update Profile</button>
                <div class="signup-login-register">
                    <p>Want to go back to your <a href="profile.php">profile</a>?</p>
                </div>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <div class="wrapper">
    <div class="sidebar">
        <i class=""></i>
        <ul>
            <li><a href="/verify/dashboard"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="/verify/profile"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="/verify/inbox"><i class="fas fa-envelope"></i>Inbox</a></li>
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
