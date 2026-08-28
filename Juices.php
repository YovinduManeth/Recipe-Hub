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

<title>Juice Recipes - Recipe Hub</title>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

<div class="dropdown ms-3">


<a href="#"
class="user-icon dropdown-toggle"
data-bs-toggle="dropdown">

<i class="fa-solid fa-user"></i>

</a>

<ul class="dropdown-menu dropdown-menu-end">


<li>

<h6 class="dropdown-header">
<?php echo htmlspecialchars($username); ?>
</h6>

</li>
<li>

<span class="dropdown-item-text">

<?php echo htmlspecialchars($email); ?>

</span>

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

<!-- Dark Mode -->

<i class="fa-solid fa-moon mode-icon ms-3"></i>


</div>


</div>

</nav>

</header>


<section class="container my-5">


<h1 class="text-center mb-5">

Sri Lankan Juice Recipes

</h1>


<div class="row g-4">


<!-- Wood Apple Juice -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">

<img src="Images/Recipes/Wood_Apple_Juice.jpg"
class="card-img-top"
alt="Wood Apple Juice">

<div class="card-body">

<h5 class="card-title">

 Wood Apple Juice

</h5>


<p class="card-text">

A traditional Sri Lankan refreshing drink made with ripe wood apple, jaggery, and coconut milk, offering a sweet and tangy flavour.

</p>

<a href="recipe-details.php?recipe=woodapplejuice"
class="btn btn-warning">

View Recipe

</a>

</div>


</div>


</div>

<!-- Mango Juice -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">


<img src="Images/Recipes/Mango_Juice.jpg"
class="card-img-top"
alt="Sri Lankan Mango Juice">


<div class="card-body">


<h5 class="card-title">

 Mango Juice

</h5>

<p class="card-text">

A refreshing tropical drink made with ripe mangoes and chilled water, offering a naturally sweet and creamy flavour.

</p>

<a href="recipe-details.php?recipe=mangojuice"
class="btn btn-warning">

View Recipe

</a>

</div>


</div>

</div>

<!-- Orange Juice -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">


<img src="Images/Recipes/Orange_Juice.jpg"
class="card-img-top"
alt="Fresh Orange Juice">


<div class="card-body">


<h5 class="card-title">

Orange Juice

</h5>

<p class="card-text">

A refreshing citrus drink made with fresh oranges, offering a naturally sweet and tangy flavour perfect for any time of the day.

</p>


<a href="recipe-details.php?recipe=orangejuice"
class="btn btn-warning">

View Recipe

</a>


</div>


</div>

</div>

<!-- Watermelon Juice -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">


<img src="Images/Recipes/Watermelon_Juice.jpg"
class="card-img-top"
alt="Sri Lankan Watermelon Juice">


<div class="card-body">


<h5 class="card-title">

Watermelon Juice

</h5>


<p class="card-text">

A refreshing chilled drink made with fresh watermelon, lemon juice, and a hint of sweetness, perfect for hot Sri Lankan days.

</p>


<a href="recipe-details.php?recipe=watermelonjuice"
class="btn btn-warning">

View Recipe

</a>

</div>


</div>

</div>

<!-- Avocado Juice -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">


<img src="Images/Recipes/Avocado_Juice.jpg"
class="card-img-top"
alt="Avocado Juice">


<div class="card-body">


<h5 class="card-title">

Avocado Juice

</h5>


<p class="card-text">

A creamy and healthy drink made with ripe avocados, milk, sugar, and vanilla, offering a rich and smooth flavour.

</p>


<a href="recipe-details.php?recipe=avocadojuice"
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


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="js/recipeData.js"></script>
<script src="js/script.js"></script>


</body>

</html>