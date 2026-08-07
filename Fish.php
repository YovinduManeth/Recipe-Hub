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

<title>Fish & Meat Recipes - Recipe Hub</title>

<link rel="stylesheet" href="css/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

<span>
Recipe Hub
</span>

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

<i class="fa-solid fa-moon mode-icon"></i>

</div>

</div>

</nav>


</header>


<!-- ================= FISH / MEAT RECIPES ================= -->

<section class="container my-5">


<h1 class="text-center mb-5">

Sri Lankan Fish & Meat Recipes

</h1>


<div class="row g-4">

<!-- Spicy Tuna Fish Curry -->


<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">


<img src="Images/Recipes/Tuna_Fish_Curry.avif"
class="card-img-top"
alt="Spicy Tuna Fish Curry">

<div class="card-body">

<h5 class="card-title">

Spicy Tuna Fish Curry

</h5>

<p class="card-text">

A spicy Sri Lankan tuna curry cooked with aromatic spices and coconut milk, creating a rich and flavorful dish best enjoyed with rice or roti.

</p>

<a href="recipe-details.php?recipe=tunafishcurry"
class="btn btn-warning">
View Recipe
</a>


</div>


</div>

</div>

<!-- Sailfish Curry -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">


<img src="Images/Recipes/Sailfish_Curry.jpg"
class="card-img-top">


<div class="card-body">


<h5 class="card-title">
Sri Lankan Sailfish Curry
</h5>

<p class="card-text">

A traditional Sri Lankan fish curry prepared with tender sailfish pieces, coconut milk, and aromatic curry spices.

</p>

<a href="recipe-details.php?recipe=sailfishcurry"
class="btn btn-warning">

View Recipe

</a>

</div>

</div>

</div>


<!-- Chicken Curry -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">

<img src="Images/Recipes/Chicken_Curry.jpg"
class="card-img-top">


<div class="card-body">

<h5 class="card-title">
Sri Lankan Chicken Curry
</h5>

<p class="card-text">

A classic Sri Lankan chicken curry cooked with spicy roasted curry powder, coconut milk, and aromatic herbs.

</p>


<a href="recipe-details.php?recipe=chickencurry"
class="btn btn-warning">

View Recipe

</a>


</div>

</div>

</div>

<!-- Beef Curry -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">

<img src="Images/Recipes/Beef_Curry.jpg"
class="card-img-top">


<div class="card-body">

<h5 class="card-title">
Sri Lankan Beef Curry
</h5>

<p class="card-text">

A rich and spicy Sri Lankan beef curry prepared with tender beef pieces, roasted spices, and a flavorful coconut-based gravy.

</p>


<a href="recipe-details.php?recipe=beefcurry"
class="btn btn-warning">

View Recipe

</a>


</div>

</div>

</div>

<!-- Fish Ambul Thiyal -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">


<img src="Images/Recipes/Malu.jpg"
class="card-img-top">


<div class="card-body">


<h5 class="card-title">
Fish Ambul Thiyal
</h5>

<p class="card-text">

A famous Sri Lankan sour fish curry made with tuna pieces, goraka, and traditional spices for a unique tangy flavour.

</p>


<a href="recipe-details.php?recipe=fish"
class="btn btn-warning">

View Recipe

</a>


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