<?php

session_start();

include "includes/db.php";


if (!isset($_SESSION["username"])) {

    header("Location: auth/Login.php");
    exit();

}


$username = $_SESSION["username"];
$email = $_SESSION["email"];


// ==========================
// GET RECIPES FROM DATABASE
// ==========================

$sql = "SELECT id, recipe_key, title, description, image, ingredients, instructions
        FROM recipes
        WHERE recipe_key IN (
            'chickenkottu',
            'stringhoppers',
            'hoppers',
            'ambulthiyal',
            'ambulthiyal2',
            'dhal',
            'watalappan'
)
        ORDER BY id ASC";

$stmt = $conn->prepare($sql);

$stmt->execute();

$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>

<html lang="en">

<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Recipes | Recipe Hub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet"
      href="css/style.css">


</head>

<body>

<!-- ================= NAVBAR ================= -->

<header>

<nav class="navbar navbar-expand-lg bg-white border rounded">


<div class="container-fluid">


    <!-- Logo -->

    <a class="navbar-brand d-flex align-items-center"
       href="home.php">

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

                <a class="nav-link"
                   href="home.php">

                    Home

                </a>

            </li>


            <li class="nav-item">

                <a class="nav-link active"
                   href="recipes.php">

                    Recipes

                </a>

            </li>


            <li class="nav-item">

                <a class="nav-link"
                   href="favourites.php">

                    Favourites

                </a>

            </li>


            <li class="nav-item">

                <a class="nav-link"
                   href="Contacts.php">

                    Contact Us

                </a>

            </li>


        </ul>


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

                        <?php echo htmlspecialchars($username); ?>

                    </h6>


                    <span class="dropdown-item-text">

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

</header>

<!-- ================= BANNER ================= -->

<section class="recipes-banner">


<div class="banner-content">


    <h1>

        Explore Delicious Recipes 🍜

    </h1>


    <p>

        Discover traditional Sri Lankan dishes and favourite meals.

        <br>

        From authentic classics to modern favourites.

    </p>


</div>


</section>

<!-- ================= SEARCH ================= -->

<section class="recipe-search">


<div class="search-container">


    <input
        type="text"
        id="recipeSearch"
        placeholder="Search your favourite recipe...">


    <button>

        <i class="fa-solid fa-magnifying-glass"></i>

    </button>


</div>


</section>

<!-- ================= RECIPES ================= -->

<section class="all-recipes">


<h2>

    Popular Recipes

</h2>


<div class="row row-cols-1 row-cols-md-3 g-4">

    <?php foreach ($recipes as $recipe): ?>

<?php
$image = $recipe["image"];
$description = $recipe["description"];


?>

<div class="col recipe-card">

    <div class="card h-100">

    <img
        src="<?php echo htmlspecialchars($recipe["image"]); ?>"
        class="card-img-top"
        alt="<?php echo htmlspecialchars($recipe["title"]); ?>">

    <div class="card-body">

        <h5 class="card-title recipe-name">
            <?php echo htmlspecialchars($recipe["title"]); ?>
        </h5>


        <a href="recipe-details.php?recipe=<?php echo urlencode($recipe["recipe_key"]); ?>"
            class="btn btn-warning">
            View Recipe
        </a>

    </div>

</div>

</div>

<?php endforeach; ?>
    


</div>


</section>

<!-- ================= FOOTER ================= -->

<footer>


© 2026 Recipe Hub. All Rights Reserved.


</footer>

<!-- ================= SEARCH MODAL ================= -->

<div class="modal fade"
     id="searchModal">

```
<div class="modal-dialog modal-dialog-centered">


    <div class="modal-content">


        <div class="modal-header">


            <h5 class="modal-title">

                Search Recipes

            </h5>


            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="modal">

            </button>


        </div>


        <div class="modal-body">


            <input
                type="text"
                id="modalSearchInput"
                placeholder="Search your favourite recipe...">


            <br>


            <p>

                Popular Searches:

            </p>


            <span class="badge bg-warning popular-search">

                Kottu

            </span>


            <span class="badge bg-warning popular-search">

                Hoppers

            </span>


            <span class="badge bg-warning popular-search">

                Watalappam

            </span>


        </div>


        <div class="modal-footer">


            <button class="btn btn-warning">

                Search

            </button>


        </div>


    </div>


</div>
```

</div>

<!-- ================= JAVASCRIPT ================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

<script src="js/recipeData.js"></script>

<script src="js/script.js"></script>

</body>

</html>
