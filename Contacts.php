<?php

session_start();

include "includes/db.php";


if(!isset($_SESSION["username"])){

    header("Location: auth/Login.php");
    exit();

}


$username = $_SESSION["username"];
$email = $_SESSION["email"];


$message = "";


if(isset($_POST["sendMessage"])){

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $msg = trim($_POST["message"] ?? "");


    // Server-side validation

    if($name === "" || $email === "" || $msg === ""){

        $message = "Please fill in all fields.";

    }


    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

    $message = "Please enter a valid email address.";

}

elseif(!checkdnsrr(substr(strrchr($email, "@"), 1), "MX")){

    $message = "Please enter an email address with a valid domain.";

}


    else{

        // Insert message into database

        $sql = "INSERT INTO messages
                (name, email, message)
                VALUES (?, ?, ?)";


        $stmt = $conn->prepare($sql);


        $stmt->execute([

            $name,
            $email,
            $msg

        ]);


        $message = "Message sent successfully!";

    }

}


?>



<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Us | Recipe Hub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<!-- ================= NAVBAR ================= -->

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

                    <a class="nav-link active" href="Contacts.php">
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

            <h6 class="dropdown-header" id="dropdownUsername">
                <?php echo $username; ?>
            </h6>

        </li>
            <span class="dropdown-item-text" id="dropdownEmail">
                <?php echo $email; ?>
            </span>

        <li>

            

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


<section class="recipes-banner">

    <div class="banner-content">

        <h1>
            Contact Recipe Hub 📞
        </h1>

        <p>
            Have questions, suggestions, or feedback?
            <br>
            We would love to hear from you.
        </p>

    </div>

</section>



<section class="contact-section">


<div class="container">


<div class="row g-4">


<!-- Contact Information -->

<div class="col-md-5">


<div class="contact-info">


<h2>
Get In Touch
</h2>


<p>
Feel free to contact us for any recipe suggestions,
questions, or feedback.
</p>



<div class="contact-item">

<i class="fa-solid fa-location-dot"></i>

<span>
Sri Lanka
</span>

</div>



<div class="contact-item">

<i class="fa-solid fa-envelope"></i>

<span>
recipehub@gmail.com
</span>

</div>



<div class="contact-item">

<i class="fa-solid fa-phone"></i>

<span>
+94 77 123 4567
</span>

</div>

</div>


</div>


<!-- Contact Form -->


<div class="col-md-7">


<div class="contact-form">

<h2>
Send Message
</h2>


<form method="POST" action="Contacts.php">


<div class="mb-3">


<label>
Full Name
</label>

    <input type="text"
    name="name"
    id="contactName"
    class="form-control"
    placeholder="Enter your name"
    required>

</div>


<div class="mb-3">


<label>
Email Address
</label>

<input type="email"
name="email"
id="contactEmail"
class="form-control"
placeholder="Enter your email"
required>


</div>


<div class="mb-3">


<label>
Message
</label>

<textarea 
name="message"
id="contactMessage"
class="form-control"
rows="5"
placeholder="Write your message"
required></textarea>


</div>

<button type="submit"
    name="sendMessage"
    class="btn btn-warning">

<i class="fa-solid fa-paper-plane"></i>

Send Message

</button>

<?php

if($message != ""){

    if($message == "Message sent successfully!"){

        echo "
        <div class='success-message mt-4'>
            <i class='fa-solid fa-circle-check'></i>
            $message
        </div>";

    }

    else{

        echo "
        <div class='warning-message mt-4'>
            <i class='fa-solid fa-triangle-exclamation'></i>
            $message
        </div>";

    }

}

?>


</form>


</div>


</div>

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
