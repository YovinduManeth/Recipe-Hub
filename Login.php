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


    <img src="Images/Logo/Recipe_Hub_logo.png"
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

            <form id="loginForm">

                <div class="input-box">

                    <i class="fa-solid fa-user"></i>

                    <input type="text" id="username" placeholder="Email or Username" required>

                </div>


             <div class="input-box">

    <i class="fa-solid fa-lock"></i>

    <input 
    type="password"
    id="password"
    placeholder="Password"
    required>

    <button type="button" class="password-eye" id="toggleLoginPassword">

    <i class="fa-solid fa-eye" id="loginEye"></i>

</button>

</div>
                <div class="form-options">


                    <label>

                        <input type="checkbox">

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


                <a href="Register.php" class="create-account">
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


<script src = "js/script.js"></script>

