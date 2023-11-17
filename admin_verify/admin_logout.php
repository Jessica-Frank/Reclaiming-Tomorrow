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

if(isset($_SESSION['current']))
{
    unset($_SESSION['current']);
}

if(isset($_SESSION['current_role']))
{
    unset($_SESSION['current_role']);
}

session_destroy();

header("Location: ../index.php");
die;