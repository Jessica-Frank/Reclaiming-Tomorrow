<?php
session_start();

// Check if the user is not logged in
if (isset($_SESSION['current'])) {
    // Redirect to the login page
    header('Location: /verify/inbox');
    exit(); // Ensure that the script stops here
} else {
    header('Location: /verify/login');
}
?>