<?php
require "functions.php";

$errors = array();


// Create the "Edit Profile" form in your HTML
// Use $_SESSION['USER'] to pre-fill the form with the user's current information

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

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <?php include 'index.php'; ?>

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

                <!-- Other fields and user information can be added here -->

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
</body>
</html>
