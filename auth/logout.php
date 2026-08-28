<?php

session_start();

session_unset();
session_destroy();

// Delete Remember Me username cookie
setcookie(
    "username",
    "",
    time() - 3600,
    "/"
);

header("Location: Login.php");
exit();

?>