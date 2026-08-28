<?php

session_start();

if(!isset($_SESSION["username"])){

    header("Location: auth/Login.php");
    exit();

}

$username = $_SESSION["username"];
$email = $_SESSION["email"];

?>




<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Curries Recipes - Recipe Hub</title>

<link rel="stylesheet" href="css/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

<header>

<nav class="navbar navbar-expand-lg bg-white border rounded">

    <div class="container-fluid">

        <!-- Logo -->

        <a class="navbar-brand d-flex align-items-center" href="home.php">

            <img src="Images/Logo/Recipe_Hub_logo.png"
            width="40"
            height="40"
            class="me-2">

            <span>
                Recipe Hub
            </span>

        </a>
        <!-- Mobile Button -->

        <button class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <!-- Menu -->

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

                    <a class="nav-link" href="Contacts.php">
                        Contact Us
                    </a>

                </li>


            </ul>
    

<div class="dropdown">

    <a href="#"
       class="user-icon dropdown-toggle"
       data-bs-toggle="dropdown"
       aria-expanded="false">

        <i class="fa-solid fa-user"></i>

    </a>

    <ul class="dropdown-menu dropdown-menu-end">

        <li>

            <h6 class="dropdown-header" id="dropdownUsername">
                <?php echo htmlspecialchars($username); ?>
            </h6>

        </li>

        <li>

            <span class="dropdown-item-text" id="dropdownEmail">
                <?php echo htmlspecialchars($email); ?>
            </span>

        </li>

        <li>
            <hr class="dropdown-divider">
        </li>

        <li>
            <a class="dropdown-item"
            href="profile.php">

                <i class="fa-solid fa-user-pen me-2"></i>
                My Profile

            </a>

        </li>

        <li>

            <a class="dropdown-item"
            href="favourites.php">

                <i class="fa-solid fa-heart me-2"></i>
                My Favourites

            </a>

        </li>

        <li>

    <a class="dropdown-item"
    href="auth/logout.php">

        <i class="fa-solid fa-right-from-bracket me-2"></i>
        Logout

    </a>

</li>

    </ul>

</div>

    <!-- Dark Mode Icon -->

    <i class="fa-solid fa-moon mode-icon"></i>

        </div>


    </div>


</nav>
    

<section class="container my-5">


<h1 class="text-center mb-5">
Sri Lankan Curry Recipes
</h1>

<div class="row g-4">


<!-- Dhal Curry -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">


<img src="Images/Recipes/Dhal.jpg"
class="card-img-top">


<div class="card-body">


<h5 class="card-title">
Dhal Curry
</h5>

<p class="card-text">

A creamy Sri Lankan lentil curry cooked with coconut milk and traditional spices, commonly served with rice or roti.

</p>


<a href="recipe-details.php?recipe=dhal"
class="btn btn-warning">

View Recipe

</a>


</div>


</div>

</div>

<!-- Potato Curry -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">

<img src="Images/Recipes/Potato_Curry.jpg"
class="card-img-top">

<div class="card-body">

<h5 class="card-title">
Potato Curry
</h5>

<p class="card-text">

A simple and delicious Sri Lankan curry made with tender potatoes, coconut milk, and aromatic spices.

</p>

<a href="recipe-details.php?recipe=potatocurry"
class="btn btn-warning">

View Recipe

</a>

</div>

</div>

</div>

<!-- Brinjal Curry -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">


<img src="Images/Recipes/Brinjal_Curry.jpg"
class="card-img-top">

<div class="card-body">

<h5 class="card-title">
Brinjal Curry
</h5>

<p class="card-text">

A delicious Sri Lankan eggplant curry prepared with crispy brinjal pieces, spicy roasted spices, and a rich coconut-based gravy.

</p>

<a href="recipe-details.php?recipe=brinjalcurry"
class="btn btn-warning">

View Recipe

</a>

</div>

</div>

</div>

<!-- Pumpkin Curry -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">


<img src="Images/Recipes/Pumpkin_Curry.webp"
class="card-img-top">


<div class="card-body">

<h5 class="card-title">
Pumpkin Curry
</h5>

<p class="card-text">

A mild and creamy Sri Lankan pumpkin curry prepared with coconut milk and aromatic spices.

</p>

<a href="recipe-details.php?recipe=pumpkincurry"
class="btn btn-warning">

View Recipe

</a>

</div>


</div>

</div>


<!-- Jackfruit Curry -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">


<img src="Images/Recipes/Jackfruit_Curry.jpg"
class="card-img-top">


<div class="card-body">


<h5 class="card-title">
Jackfruit Curry
</h5>

<p class="card-text">

A traditional Sri Lankan young jackfruit curry cooked with roasted spices and coconut milk, creating a rich meat-like texture.

</p>


<a href="recipe-details.php?recipe=jackfruitcurry"
class="btn btn-warning">

View Recipe

</a>


</div>

</div>

</div>

</div>


</section>


<!-- ================= FOOTER ================= -->

<footer>

© 2026 Recipe Hub. All Rights Reserved.

</footer>

<!-- Favourite Modal -->

<div class="modal fade" id="favouriteModal" tabindex="-1">


    <div class="modal-dialog">


        <div class="modal-content">


            <div class="modal-header">

                <h5 class="modal-title">
                    Recipe Hub
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <div class="modal-body">

                <span id="favouriteRecipeName"></span>
                has been added to your favourites ❤️

            </div>

            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                    Close

                </button>

            </div>


        </div>


    </div>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<script src="js/recipeData.js"></script>
<script src="js/script.js"></script>

</body>

</html>