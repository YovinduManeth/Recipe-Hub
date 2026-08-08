<!DOCTYPE html>
<html lang="en">

<head>

<title>Thai Pongal Recipes - Recipe Hub</title>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

User

</h6>

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


<i class="fa-solid fa-moon mode-icon ms-3"></i>

</div>


</div>

</nav>

</header>

<section class="container my-5">


<h1 class="text-center mb-5">

Thai Pongal Recipes

</h1>


<div class="row g-4">

<!-- Sweet Pongal -->


<div class="col-lg-4 col-md-6 col-sm-12 fade-in">


<div class="card recipe-card h-100">


<img src="Images/Recipes/Sweet_Pongal.jpg"
class="card-img-top"
alt="Sweet Pongal">

<div class="card-body">


<h5 class="card-title">

Sweet Pongal (Sakkarai Pongal)

</h5>

<p class="card-text">

A traditional Tamil festival sweet prepared with rice, yellow moong dal, jaggery, ghee, cashews, raisins, and cardamom. 

</p>

<a href="recipe-details.php?recipe=sweetpongal"
class="btn btn-warning">

View Recipe

</a>

</div>


</div>


</div>

<!-- Savory Pongal -->


<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">

<img src="Images/Recipes/Savory_Pongal.webp"
class="card-img-top"
alt="Savory Pongal">


<div class="card-body">

<h5 class="card-title">

Savory Pongal (Ven Pongal)

</h5>

<p class="card-text">

A traditional South Indian savory dish made with rice, moong dal, ghee, black pepper, cumin, ginger, and curry leaves. 

</p>


<a href="recipe-details.php?recipe=savorypongal"
class="btn btn-warning">

View Recipe

</a>

</div>

</div>


</div>

<!-- Vegetable Stew (Pongal Kootu) -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">


<div class="card recipe-card h-100">


<img src="Images/Recipes/Vegetable_Stew.jpg"
class="card-img-top"
alt="Vegetable Stew Pongal Kootu">

<div class="card-body">


<h5 class="card-title">

Vegetable Stew (Pongal Kootu)

</h5>


<p class="card-text">

A traditional Pongal side dish prepared with seasonal vegetables, fresh coconut, cumin, and green chilies. 
</p>


<a href="recipe-details.php?recipe=vegetablestew"
class="btn btn-warning">

View Recipe

</a>

</div>

</div>

</div>
<!-- Medu Vada -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">

<div class="card recipe-card h-100">

<img src="Images/Recipes/Medu_Vada.jpg"
class="card-img-top"
alt="Medu Vada Crispy Lentil Fritters">

<div class="card-body">

<h5 class="card-title">

Medu Vada (Crispy Lentil Fritters)

</h5>

<p class="card-text">

A popular South Indian crispy snack made with urad dal, green chilies, black pepper, and curry leaves. 

</p>


<a href="recipe-details.php?recipe=meduvada"
class="btn btn-warning">

View Recipe

</a>

</div>

</div>

</div>

<!-- Paal Payasam -->

<div class="col-lg-4 col-md-6 col-sm-12 fade-in">


<div class="card recipe-card h-100">


<img src="Images/Recipes/Paal_Payasam.jpg"
class="card-img-top"
alt="Paal Payasam Festive Rice Kheer">

<div class="card-body">

<h5 class="card-title">

Paal Payasam (Festive Rice Kheer)

</h5>

<p class="card-text">

A traditional festive rice pudding prepared with milk, rice, sugar, ghee, and saffron. 

</p>

<a href="recipe-details.php?recipe=paalpayasam"
class="btn btn-warning">

View Recipe

</a>

</div>

</div>

</div>

</div>

</section>

<footer>

© 2026 Recipe Hub. All Rights Reserved.

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="js/script.js"></script>
<script src="js/recipeData.js"></script>
</body>

</html>