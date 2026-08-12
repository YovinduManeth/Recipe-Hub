<?php

// ==============================
// CHECK USER LOGIN
// ==============================

function requireLogin()
{
    if (!isset($_SESSION["username"])) {
        header("Location: auth/Login.php");
        exit();
    }
}


// ==============================
// GET LOGGED-IN USERNAME
// ==============================

function getUsername()
{
    return $_SESSION["username"] ?? "";
}


// ==============================
// GET LOGGED-IN EMAIL
// ==============================

function getUserEmail()
{
    return $_SESSION["email"] ?? "";
}


// ==============================
// SAFE OUTPUT
// ==============================

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
}

?>