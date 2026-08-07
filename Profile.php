<?php

session_start();

if(!isset($_SESSION["username"])){

    header("Location: auth/Login.php");
    exit();

}

$username = $_SESSION["username"];
$email = $_SESSION["email"];

?>

<?php

$message = "";

if(isset($_POST["saveChanges"])){

    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmNewPassword"];


    if($newPassword != $confirmPassword){

        $message = "Passwords do not match!";

    }

    else{

        if(!empty($newPassword)){

            include "includes/db.php";


            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);


            $sql = "UPDATE users 
                    SET password=? 
                    WHERE email=?";


            $stmt = $conn->prepare($sql);


            $stmt->execute([
                $hashedPassword,
                $email
            ]);


            $message = "Profile updated successfully!";

        }

    }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile | Recipe Hub</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<header>

<nav class="navbar navbar-expand-lg bg-white border rounded">

    <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center" href="home.php">

            <img src="Images/Logo/Recipe_Hub_logo.png"
            width="40"
            height="40"
            class="me-2">

            <span>Recipe Hub</span>

        </a>

        <button class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
        id="navbarMenu">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link" href="home.php">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="recipes.php">
                        Recipes
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="favourites.php">
                        Favourites
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">
                        Contact Us
                    </a>
                </li>

            </ul>

            <i class="fa-solid fa-user user-icon"></i>

            <i class="fa-solid fa-moon mode-icon"></i>

        </div>

    </div>

</nav>

</header>

<section class="register-section">

<div class="register-card">

    <i class="fa-solid fa-circle-user profile-avatar"></i>

    <h1>My Profile</h1>

    <p>
        Manage your Recipe Hub account information.
    </p>

    <form id="profileForm" method="POST" action="profile.php">

        <!-- Username -->

        <div class="register-input">

            <i class="fa-solid fa-user"></i>

            <input
                type="text"
                id="profileUsername"
                value="<?php echo htmlspecialchars($username); ?>"
                placeholder="Username">

        </div>


        <!-- Email -->

        <div class="register-input">

            <i class="fa-solid fa-envelope"></i>

            <input
                type="email"
                id="profileEmail"
                value="<?php echo htmlspecialchars($email); ?>"
                placeholder="Email">

        </div>


        <!-- New Password -->

        <div class="register-input">

            <i class="fa-solid fa-lock"></i>

            <input
                type="password"
                id="newPassword"
                name="newPassword"
                placeholder="New Password (Optional)">

                <i class="fa-solid fa-eye password-eye"
                onclick="togglePassword('newPassword', this)">
            </i>

</div>


        <!-- Confirm Password -->

       <div class="register-input">

    <i class="fa-solid fa-lock"></i>

    <input
        type="password" 
        id="confirmNewPassword"
        name="confirmNewPassword"
        placeholder="Confirm Password">

        <i class="fa-solid fa-eye password-eye"
        onclick="togglePassword('confirmNewPassword', this)">
        </i>

</div>


        <!-- Save -->

        <button type="submit" name="saveChanges">

            <i class="fa-solid fa-floppy-disk"></i>

             Save Changes

        </button>
            <?php

                if($message!=""){

                echo "
                <div class='alert alert-info mt-3'>
                $message
                </div>";

                }

                ?>

        <br><br>


        <a href="home.php"
        class="btn btn-secondary w-100">

            <i class="fa-solid fa-house"></i>

            Back to Home

        </a>

    </form>

</div>

</section>



<footer>

© 2026 Recipe Hub. All Rights Reserved.

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="js/recipeData.js"></script>
<script src="js/script.js"></script>

</body>

</html>