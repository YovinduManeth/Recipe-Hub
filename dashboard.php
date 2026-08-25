<?php

session_start();

require_once "includes/functions.php";

requireLogin();

$username = getUsername();
$email = getUserEmail();

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Recipe Hub</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- ================= DASHBOARD ================= -->

<section class="dashboard-section">

    <div class="dashboard-card">

        <!-- Logo -->

        <div class="dashboard-logo">

            <img src="Images/Logo/Recipe_Hub_logo.png"
                 alt="Recipe Hub Logo">

            <span>Recipe Hub</span>

        </div>


        <!-- Welcome -->

        <div class="dashboard-welcome">

            <i class="fa-solid fa-circle-user dashboard-avatar"></i>

            <h1>
                Welcome back, <?php echo e($username); ?>
            </h1>

            <p>
                Manage your recipes and account from your dashboard.
            </p>

        </div>


        <!-- Dashboard Options -->

        <div class="dashboard-options">

            <!-- Profile -->

            <a href="profile.php" class="dashboard-option">

                <i class="fa-solid fa-user"></i>

                <div>
                    <h3>My Profile</h3>

                    <p>
                        View and manage your account.
                    </p>
                </div>

            </a>


            <!-- Recipes -->

           <a href="home.php" class="dashboard-option">

    <i class="fa-solid fa-house"></i>

    <div>
        <h3>Home</h3>

        <p>
            Explore Recipe Hub and discover delicious recipes.
        </p>
    </div>

</a>

            <!-- Favourites -->

            <a href="favourites.php" class="dashboard-option">

                <i class="fa-solid fa-heart"></i>

                <div>
                    <h3>My Favourites</h3>

                    <p>
                        View your saved recipes.
                    </p>
                </div>

            </a>

        </div>


        <!-- Logout -->

        <a href="auth/logout.php" class="dashboard-logout">

            <i class="fa-solid fa-right-from-bracket"></i>

            Logout

        </a>

    </div>

</section>


<!-- ================= FOOTER ================= -->

<footer>

    © 2026 Recipe Hub. All Rights Reserved.

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

<script src="js/recipeData.js"></script>

<script src="js/script.js"></script>

</body>

</html>