<?php

session_start();

include "includes/db.php";

if (!isset($_SESSION["username"])) {
    header("Location: auth/Login.php");
    exit();
}

$username = $_SESSION["username"];
$email = $_SESSION["email"];

$recipeKey = isset($_GET["recipe"]) ? trim($_GET["recipe"]) : "";

if ($recipeKey === "") {
    die("Invalid recipe key.");
}


// Get recipe

$sql = "SELECT id, recipe_key, title, description, image,
               ingredients, instructions,
               prep_time, cook_time, total_time, servings
        FROM recipes
        WHERE recipe_key = ?";

$stmt = $conn->prepare($sql);

$stmt->execute([$recipeKey]);

$recipe = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$recipe) {
    die("Recipe not found.");
}


// Check favourite status

$userId = $_SESSION["user_id"];

$sql = "SELECT id
        FROM favourites
        WHERE user_id = ?
        AND recipe_id = ?";

$stmt = $conn->prepare($sql);

$stmt->execute([
    $userId,
    $recipe["id"]
]);

$isFavourite = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo htmlspecialchars($recipe["title"]); ?> - Recipe Hub
    </title>

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    >

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Recipe Hub CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>


<body>


<header>

    <!-- ================= NAVBAR ================= -->

    <nav class="navbar navbar-expand-lg bg-white border rounded">

        <div class="container-fluid">

            <!-- Logo -->

            <a class="navbar-brand d-flex align-items-center"
               href="home.php">

                <img
                    src="Images/Logo/Recipe_Hub_logo.png"
                    width="40"
                    height="40"
                    class="me-2"
                    alt="Recipe Hub Logo"
                >

                <span>
                    Recipe Hub
                </span>

            </a>


            <!-- Mobile Button -->

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >

                <span class="navbar-toggler-icon"></span>

            </button>


            <!-- Menu -->

            <div
                class="collapse navbar-collapse"
                id="navbarMenu"
            >

                <ul class="navbar-nav mx-auto">

                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="home.php"
                        >
                            Home
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="recipes.php"
                        >
                            Recipes
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="favourites.php"
                        >
                            Favourites
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link"
                            href="Contacts.php"
                        >
                            Contact Us
                        </a>

                    </li>

                </ul>


                <!-- User Dropdown -->

                <div class="dropdown">

                    <a
                        href="#"
                        class="user-icon dropdown-toggle"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >

                        <i class="fa-solid fa-user"></i>

                    </a>


                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <h6
                                class="dropdown-header"
                                id="dropdownUsername"
                            >
                                <?php echo htmlspecialchars($username); ?>
                            </h6>

                        </li>


                        <li>

                            <span
                                class="dropdown-item-text"
                                id="dropdownEmail"
                            >
                                <?php echo htmlspecialchars($email); ?>
                            </span>

                        </li>


                        <li>

                            <hr class="dropdown-divider">

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="profile.php"
                            >

                                <i class="fa-solid fa-user-pen me-2"></i>

                                My Profile

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="favourites.php"
                            >

                                <i class="fa-solid fa-heart me-2"></i>

                                My Favourites

                            </a>

                        </li>


                        <li>

                            <a
                                class="dropdown-item"
                                href="#"
                                onclick="logout(); return false;"
                            >

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



<!-- ================= BREADCRUMB ================= -->

<section class="breadcrumb">

    <span
        class="current-page"
        id="recipeBreadcrumb"
    >
        <?php echo htmlspecialchars($recipe["title"]); ?>
    </span>

</section>



<!-- ================= MAIN CONTENT ================= -->

<main>

    <section class="recipe-details">


        <!-- Recipe Image -->

        <div class="recipe-image">

            <img
                id="recipeImage"
                src="<?php echo htmlspecialchars($recipe["image"]); ?>"
                alt="<?php echo htmlspecialchars($recipe["title"]); ?>"
            >

        </div>


        <!-- Recipe Information -->

        <div class="recipe-content">

            <h3 id="recipeTitle">

                <?php echo htmlspecialchars($recipe["title"]); ?>

            </h3>


            <div class="recipe-meta">

                <span>

                    <i class="fa-solid fa-hourglass-half"></i>

                    <?php echo htmlspecialchars($recipe["total_time"]); ?>

                </span>


                <span>

                    <i class="fa-solid fa-utensils"></i>

                    <?php echo htmlspecialchars($recipe["servings"]); ?>

                </span>

            </div>


            <p id="recipeDescription">

                <?php echo htmlspecialchars($recipe["description"]); ?>

            </p>


            <div class="favourite-actions">

    <?php if ($isFavourite): ?>

        <form method="POST" action="Favourites.php">

            <input
                type="hidden"
                name="recipe_id"
                value="<?php echo $recipe["id"]; ?>"
            >

            <input
                type="hidden"
                name="action"
                value="remove"
            >

            <button
                type="submit"
                class="fav-btn"
            >

                <i class="fa-solid fa-heart-crack"></i>

                Remove Favourite

            </button>

        </form>

    <?php else: ?>

        <form method="POST" action="Favourites.php">

            <input
                type="hidden"
                name="recipe_id"
                value="<?php echo $recipe["id"]; ?>"
            >

            <input
                type="hidden"
                name="action"
                value="add"
            >

            <button
                type="submit"
                class="fav-btn"
            >

                <i class="fa-solid fa-heart"></i>

                Add Favourite

            </button>

        </form>

    <?php endif; ?>


    <button
        id="shareRecipeBtn"
        class="btn btn-warning"
        type="button"
    >

        <i class="fa-solid fa-share"></i>

        Share

    </button>

</div>


        </div>


        <!-- ================= INGREDIENTS ================= -->

        <aside class="ingredients-box">

            <h2>
                Ingredients
            </h2>


            <ul id="recipeIngredients">

            <?php
                $ingredients = preg_split('/\r\n|\r|\n|,/', $recipe["ingredients"]);

            foreach ($ingredients as $ingredient):

             $ingredient = trim($ingredient);

             if ($ingredient !== ""):
                ?>

        <li>
            <?php echo htmlspecialchars($ingredient); ?>
        </li>

    <?php
        endif;
    endforeach;
    ?>

</ul>


            <!-- Recipe Information -->

            <div class="recipe-info">

                <p>

                    <i class="fa-regular fa-clock"></i>

                    <strong>Prep Time:</strong>

                    <?php echo htmlspecialchars($recipe["prep_time"]); ?>

                </p>


                <p>

                    <i class="fa-solid fa-fire"></i>

                    <strong>Cook Time:</strong>

                    <?php echo htmlspecialchars($recipe["cook_time"]); ?>

                </p>


                <p>

                    <i class="fa-solid fa-hourglass-half"></i>

                    <strong>Total Time:</strong>

                    <?php echo htmlspecialchars($recipe["total_time"]); ?>

                </p>


            </div>

        </aside>

    </section>



    <!-- ================= INSTRUCTIONS ================= -->

    <section class="instructions">

        <h2>
            Instructions
        </h2>


        <ol id="recipeInstructions">

    <?php
    $instructions = preg_split(
        '/\r\n|\r|\n/',
        $recipe["instructions"]
    );

    foreach ($instructions as $instruction):

        $instruction = trim($instruction);

        if ($instruction !== ""):
    ?>

        <li>
            <?php echo htmlspecialchars($instruction); ?>
        </li>

    <?php
        endif;
    endforeach;
    ?>

</ol>

    </section>

</main>



<!-- ================= FOOTER ================= -->

<footer>

    © 2026 Recipe Hub. All Rights Reserved.

</footer>



<!-- ================= FAVOURITE MODAL ================= -->

<div
    class="modal fade"
    id="favouriteModal"
    tabindex="-1"
    aria-labelledby="favouriteModalLabel"
    aria-hidden="true"
>

    <div class="modal-dialog">

        <div class="modal-content">


            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="favouriteModalLabel"
                >
                    Recipe Hub
                </h5>


                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>


            <div class="modal-body">

                <span id="favouriteRecipeName"></span>

                has been added to your favourites ❤️

            </div>


            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>

            </div>

        </div>

    </div>

</div>



<!-- Bootstrap -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>


<!-- Recipe Hub JavaScript -->

<script src="js/script.js"></script>


</body>

</html>