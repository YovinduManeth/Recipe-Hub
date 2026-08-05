<?php

session_start();

include "../includes/db.php";

$message = "";

$rememberedUser = "";

if (isset($_COOKIE["username"])) {

    $rememberedUser = $_COOKIE["username"];

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $username = trim($_POST["username"]);
    $password = $_POST["password"];


    $sql = "SELECT * FROM users
            WHERE username = ?
            OR email = ?";


    $stmt = $conn->prepare($sql);

    $stmt->execute([
        $username,
        $username
    ]);


    $user = $stmt->fetch(PDO::FETCH_ASSOC);



    if ($user) {


        if (password_verify($password, $user["password"])) {


            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];


            if(isset($_POST["remember"])){

                setcookie(
                    "username",
                    $user["username"],
                    time() + (86400 * 30),
                    "/"
                );

            }


            header("Location: ../home.php");
            exit();


        }
        else{

            $message = "Incorrect password.";

        }


    }
    else{


        $message = "User not found.";

    }


}




?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Recipe Hub</title>

    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="../css/style.css">

</head>


<body class="login-body">

<div class="login-page">

    <div class="login-container">

    <div class="login-left">


        <p class="tagline">
    Taste the Joy of Cooking.
        </p>


    <img src="../Images/Logo/Recipe_Hub_logo.png"
    alt="Recipe Hub Logo"
    class="logo-image">


<h1>
    Recipe Hub
</h1>


        <p class="description">
            Your favorite recipes,<br>
            all in one place.
        </p>


    </div>

    <div class="login-right">


        <div class="login-box">


            <h2 class="welcome">
                Welcome Back!
            </h2>


            <p class="subtitle">
                Login to continue to Recipe Hub
            </p>

            <?php
if ($message != "") {

    if ($message == "Login successful!") {

        echo "<div class='success-message'>$message</div>";

    } else {

        echo "<div class='warning-message'>$message</div>";

    }

}
?>

            <form method="POST" action="Login.php">

                <div class="input-box">

                    <i class="fa-solid fa-user"></i>

                    <input type="text"id="username"name="username"placeholder="Email or Username"value="<?php echo $rememberedUser; ?>"required>

                </div>


                <div class="input-box">

                    <i class="fa-solid fa-lock"></i>

                    <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Password"
                    required>


                    <i class="fa-solid fa-eye" id="togglePassword"></i>


                </div>


                <div class="form-options">


                    <label>

                        <input type="checkbox"name="remember"id="remember">  

                        Remember me

                    </label>



                    <a href="#">
                        Forgot Password?
                    </a>

                </div>


                <button type="submit">

                    Login

                </button>

                <div class="separator">

                    <span>
                        OR
                    </span>

                </div>


                <a href="register.html" class="create-account">
                Create New Account
            </a>

            </form>

        </div>



    </div>

    </div>

</div>


<footer>

© 2026 Recipe Hub. All Rights Reserved.

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script src="../js/script.js"></script>

