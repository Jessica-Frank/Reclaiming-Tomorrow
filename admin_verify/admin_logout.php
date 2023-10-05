<?php

session_start();

if(isset($_SESSION['USER']))
{
    unset($_SESSION['USER']);
}

if(isset($_SESSION['LOGGED_IN']))
{
    unset($_SESSION['LOGGED_IN']);
}

/*if(isset($_SESSION['admin']))
{
    unset($_SESSION['admin']); // Unset the admin session variable
}*/

header("Location: admin_login.php");
die;