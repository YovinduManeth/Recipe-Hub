<?php


function requireLogin()
{
    if (!isset($_SESSION["username"])) {
        header("Location: auth/Login.php");
        exit();
    }
}


function getUsername()
{
    return $_SESSION["username"] ?? "";
}


function getUserEmail()
{
    return $_SESSION["email"] ?? "";
}

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

?>