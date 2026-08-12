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

<title>Recipe Hub - Home</title>


<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">


</head>

<body>

<header>

<nav class="navbar navbar-expand-lg border rounded">

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

                    <a class="nav-link active" href="home.php">
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


            <!-- Search -->

            <div class="search-container">

                 <input
                    type="text"
                    id="searchInput"
                    class="form-control"
                    placeholder="Search recipes...">

                <div id="searchSuggestions"></div>

            </div>

            <!-- Account Icon -->

            <!-- USER DROPDOWN -->

<div class="dropdown">

    <a href="#"
       class="user-icon dropdown-toggle"
       data-bs-toggle="dropdown"
       aria-expanded="false">

        <i class="fa-solid fa-user"></i>

    </a>


    <ul class="dropdown-menu dropdown-menu-end">


        <li>

            <h6 class="dropdown-header">
                <?php echo $username; ?>
            </h6>

        </li>


        <li>

            <span class="dropdown-item-text">
                <?php echo $email; ?>
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

</header>






<!-- ================= MAIN CONTENT ================= -->


<main>





<!-- ================= HERO SECTION ================= -->


<section class="hero">



<div class="hero-text">



<h1>
Discover Delicious Recipes
</h1>




<p>
Find, cook and share delicious Sri Lankan recipes with people around the world.
</p>




<div class="hero-search">


<input 
type="text"
placeholder="Search recipes or ingredients" id="heroSearchInput">



<button>


<i class="fa-solid fa-magnifying-glass"></i>

Search


</button>



</div>



</div>





<div class="hero-image">


<img src="Images/Recipes/Recipe_Table.jpg"
alt="Sri Lankan Food Table">


</div>


</section>


<div class="container my-5">


    <div id="recipeCarousel" 
         class="carousel slide"
         data-bs-ride="carousel"
         data-bs-interval="4000">


        <!-- Indicators -->

        <div class="carousel-indicators">

            <button type="button"
                    data-bs-target="#recipeCarousel"
                    data-bs-slide-to="0"
                    class="active">
            </button>


            <button type="button"
                    data-bs-target="#recipeCarousel"
                    data-bs-slide-to="1">
            </button>


            <button type="button"
                    data-bs-target="#recipeCarousel"
                    data-bs-slide-to="2">
            </button>


            <button type="button"
                    data-bs-target="#recipeCarousel"
                    data-bs-slide-to="3">
            </button>

        </div>



        <!-- Carousel Images -->

        <div class="carousel-inner">


            <!-- Image 1 -->

            <div class="carousel-item active">

                <img src="Images/Recipes/Carousel_1.webp"
                     class="d-block w-100"
                     alt="Sri Lankan Milk Rice">

            </div>



            <!-- Image 2 -->

            <div class="carousel-item">

                <img src="Images/Recipes/Carousel_2.jpg"
                     class="d-block w-100"
                     alt="Kottu">

            </div>



            <!-- Image 3 -->

            <div class="carousel-item">

                <img src="Images/Recipes/Carousel_3.webp"
                     class="d-block w-100"
                     alt="Hoppers">

            </div>


            <!-- Image 4 -->

            <div class="carousel-item">

                <img src="Images/Recipes/Carousel_4.jpg"
                     class="d-block w-100"
                     alt="Rice and Curry">

            </div>


        </div>

        <!-- Previous Button -->

        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#recipeCarousel"
                data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>

        <!-- Next Button -->

        <button class="carousel-control-next"
                type="button"
                data-bs-target="#recipeCarousel"
                data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>


    </div>


</div>


<!-- ================= CATEGORIES ================= -->


<section class="categories">

<div class="section-title">


<h2>
Categories
</h2>

<a href="#">
View All
</a>


</div>


<div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4">

<div class="col">

    <div class="card h-100">

        <a href = "Rice.php">
        <img src="Images/Recipes/Rice.jpg"
             class="card-img-top"
             alt="Rice">
        </a>

        <div class="card-body">

            <h5 class="card-title text-center">
                Rice
            </h5>

        </div>

    </div>

</div>



<div class="col">

    <div class="card h-100">


        <a href = "Curries.php">
            <img src="Images/Recipes/Curries.jpg"
            class="card-img-top"
            alt="Curries">
        </a>

        <div class="card-body">

            <h5 class="card-title text-center">
                Curries
            </h5>

        </div>

    </div>

</div>



<div class="col">

    <div class="card h-100">

        <a href="fish.php">
        <img src="Images/Recipes/Fish.jpg"
             class="card-img-top"
             alt="Fish Meat">
        </a>

        <div class="card-body">

            <h5 class="card-title text-center">
                Fish / Meat
            </h5>

        </div>

    </div>

</div>


<div class="col">

    <div class="card h-100">

        <a href="Cake.php">
        <img src="Images/Recipes/Cake.jpg"
             class="card-img-top"
             alt="Cake">
        </a>

        <div class="card-body">

            <h5 class="card-title text-center">
                Cake
            </h5>

        </div>

    </div>

</div>


<div class="col">

    <div class="card h-100">

        <a href="Juices.php">
        <img src="Images/Recipes/Juice.jpg"
             class="card-img-top"
             alt="Juice">
           </a>  

        <div class="card-body">

            <h5 class="card-title text-center">
                Juice
            </h5>

        </div>

    </div>

</div>


</div>

</section>


<!-- ================= SEASONAL RECIPES ================= -->

<section class="seasonal">



<div class="section-title">



<h2>
Seasonal Recipes
</h2>


</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">


<div class="col">

    <div class="card h-100">

        <a href="aurudu.php">
        <img src="Images/Recipes/Aurudu.webp"
             class="card-img-top"
             alt="Aurudu Recipes">
            </a>

        <div class="card-body">

            <h5 class="card-title text-center">
                Aurudu Recipes
            </h5>

        </div>

    </div>

</div>


<div class="col">

    <div class="card h-100">

        <a href="Thai_pongal.php">
        <img src="Images/Recipes/ThaiPongal.png"
             class="card-img-top"
             alt="Thai Pongal Recipes">
        </a>

        <div class="card-body">

            <h5 class="card-title text-center">
                Thai Pongal Recipes
            </h5>

        </div>

    </div>

</div>



<div class="col">

    <div class="card h-100">

        <a href="Ramadan.php">
        <img src="Images/Recipes/Ramadan.png"
             class="card-img-top"
             alt="Ramadan Recipes">
        </a>     

        <div class="card-body">

            <h5 class="card-title text-center">
                Ramadan Recipes
            </h5>

        </div>

    </div>

</div>



<div class="col">

    <div class="card h-100">

        <a href="Christmas.php">
        <img src="Images/Recipes/Christmas.png"
             class="card-img-top"
             alt="Christmas Recipes">
        </a>

        <div class="card-body">

            <h5 class="card-title text-center">
                Christmas Recipes
            </h5>

        </div>

    </div>

</div>


</div>

</section>

</main>


<!-- ================= FOOTER ================= -->

<footer>


© 2026 Recipe Hub. All Rights Reserved.


</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/recipeData.js"></script>
<script src="../js/script.js"></script>

</body>
</html>