<?php

session_start();

require_once "includes/db.php";


// ==============================
// CHECK LOGIN
// ==============================

if (!isset($_SESSION["user_id"])) {

    header("Location: auth/Login.php");
    exit();

}


$userId = $_SESSION["user_id"];

$username = $_SESSION["username"] ?? "";

$email = $_SESSION["email"] ?? "";


// ==============================
// ADD / REMOVE FAVOURITE
// ==============================

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $recipeId = isset($_POST["recipe_id"])
        ? (int) $_POST["recipe_id"]
        : 0;

    $action = $_POST["action"] ?? "";


    // ==========================
    // ADD
    // ==========================

    if ($recipeId > 0 && $action === "add") {

        // Check if already exists

        $sql = "SELECT id
                FROM favourites
                WHERE user_id = ?
                AND recipe_id = ?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            $userId,
            $recipeId
        ]);

        $existing = $stmt->fetch(PDO::FETCH_ASSOC);


        // Insert only if not already favourite

        if (!$existing) {

            $sql = "INSERT INTO favourites
                    (user_id, recipe_id)
                    VALUES (?, ?)";

            $stmt = $conn->prepare($sql);

            $stmt->execute([
                $userId,
                $recipeId
            ]);
        }
    }


    // ==========================
    // REMOVE
    // ==========================

    elseif ($recipeId > 0 && $action === "remove") {

        $sql = "DELETE FROM favourites
                WHERE user_id = ?
                AND recipe_id = ?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            $userId,
            $recipeId
        ]);
    }


    // ==========================
    // RETURN TO RECIPE
    // ==========================

    if ($recipeId > 0) {

        $sql = "SELECT recipe_key
                FROM recipes
                WHERE id = ?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([$recipeId]);

        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($recipe) {

            header(
                "Location: recipe-details.php?recipe=" .
                urlencode($recipe["recipe_key"])
            );

            exit();
        }
    }
}


// ==============================
// GET FAVOURITE RECIPES
// ==============================

$sql = "SELECT recipes.*
        FROM favourites
        INNER JOIN recipes
        ON favourites.recipe_id = recipes.id
        WHERE favourites.user_id = ?
        ORDER BY favourites.created_at DESC";

$stmt = $conn->prepare($sql);

$stmt->execute([$userId]);

$favouriteRecipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Favourites | Recipe Hub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<link rel="stylesheet" href="css/style.css">

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

                    <a class="nav-link active" href="favourites.php">
                        Favourites
                    </a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="Contacts.php">
                        Contact Us
                    </a>

                </li>


            </ul>




            <!-- Account Icon -->

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

            <a class="dropdown-item" href="profile.php">

                <i class="fa-solid fa-user-pen me-2"></i>
                My Profile

            </a>

        </li>

        <li>

            <a class="dropdown-item" href="favourites.php">

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


<section class="recipes-banner">

<div class="banner-content">

<h1>
My Favourite Recipes ❤️
</h1>


<p>
Your saved recipes are displayed here.
</p>


</div>


</section>


<!-- FAVOURITE RECIPES -->


<section class="all-recipes">


<h2>
Saved Recipes
</h2>


<div class="row row-cols-1 row-cols-md-3 g-4">

<?php

$sql = "SELECT recipes.*
        FROM favourites
        INNER JOIN recipes
        ON favourites.recipe_id = recipes.id
        WHERE favourites.user_id = ?
        ORDER BY favourites.created_at DESC";

$stmt = $conn->prepare($sql);

$stmt->execute([$userId]);

$favouriteRecipes = $stmt->fetchAll();

if (empty($favouriteRecipes)) {

    echo "
    <div class='col-12'>
        <div class='alert alert-info text-center'>
            <i class='fa-solid fa-heart'></i>
            You haven't added any favourite recipes yet.
        </div>
    </div>
    ";

} else {

    foreach ($favouriteRecipes as $recipe) {

?>

    <div class="col">

        <div class="card h-100">

            <img
                src="<?php echo htmlspecialchars($recipe['image']); ?>"
                class="card-img-top"
                alt="<?php echo htmlspecialchars($recipe['title']); ?>"
            >

            <div class="card-body">

                <h5 class="card-title">
                    <?php echo htmlspecialchars($recipe['title']); ?>
                </h5>

                <p class="card-text">
                    <?php echo htmlspecialchars($recipe['description']); ?>
                </p>

                <a href="recipe-details.php?recipe=<?php echo urlencode($recipe['recipe_key']); ?>"
                class="btn btn-warning">
                    View Recipe
                </a>

                <a
                    href="Favourites.php?recipe_id=<?php echo $recipe['id']; ?>&action=remove"
                    class="btn btn-outline-danger"
                >
                    <i class="fa-solid fa-heart-crack"></i>
                    Remove
                </a>

            </div>

        </div>

    </div>

<?php

    }

}

?>

</div>

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