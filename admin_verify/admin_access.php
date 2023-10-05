<?php

function access($role)
{
    if (isset($_SESSION["ACCESS"][$role]) && !$_SESSION["ACCESS"][$role]) {
        header("Location: /admin_verify/denied.php");
        exit;
    }
}

$_SESSION["ACCESS"] = array(
    "ADMIN" => isset($_SESSION['admin']) && $_SESSION['admin'] === true,
    "USER" => isset($_SESSION['admin']) && $_SESSION['admin'] === false
);

 