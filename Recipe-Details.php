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


<title>Recipe Hub - Recipe Details</title>


<!-- Font Awesome -->

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">


</head>



<body>


<header>


<!-- ================= NAVBAR ================= -->

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
    href="#"
    onclick="logout()">

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
    
</header>

<section class="breadcrumb">


<a href="home.php">
Home
</a>


<span>
>
</span>

<span id="recipeCategory">

</span>

<span>
>
</span>

<span class="current-page" id="recipeBreadcrumb">

</span>

</section>

<main>

<section class="recipe-details">


<!-- Recipe Image -->


<div class="recipe-image">


<img id="recipeImage" 
alt="Recipe Image">

</div>

<!-- Recipe Information -->

<div class="recipe-content">


<h3 id="recipeTitle"></h3>

<div class="recipe-meta">

<span>

<i class="fa-regular fa-clock"></i>

<span id="recipeTime"></span>

</span>

<span>

<i class="fa-solid fa-utensils"></i>

<span id="recipeServings"></span>

</span>


</div>


<p id="recipeDescription"></p>

<button id="addFavouriteBtn" class="fav-btn">

<i class="fa-solid fa-heart"></i>

Add to Favourite

</button>

<button id="shareRecipeBtn" class="btn btn-warning">
    <i class="fa-solid fa-share"></i> Share
</button>

</div>

</div>


<!-- Ingredients -->


<aside class="ingredients-box">


<h2>
Ingredients
</h2>


<ul id="recipeIngredients">

</ul>

<div class="recipe-time">

    <p>
        <i class="fa-regular fa-clock"></i>
        <strong>Prep Time:</strong>
        <span id="prepTime"></span>
    </p>

    <p>
        <i class="fa-solid fa-fire"></i>
        <strong>Cook Time:</strong>
        <span id="cookTime"></span>
    </p>

    <p>
        <i class="fa-solid fa-hourglass-half"></i>
        <strong>Total Time:</strong>
        <span id="totalTime"></span>
    </p>

</div>


</aside>


</section>


<section class="instructions">

<h2>
Instructions
</h2>


<ol id="recipeInstructions">

</ol>

</section>

</main>


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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="js/recipeData.js"></script>
<script src="js/script.js"></script>

</body>

</html>