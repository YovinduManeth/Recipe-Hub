<?php

include "../includes/db.php";

$message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Get form data
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];



    // Check Terms and Conditions
    if (!isset($_POST["terms"])) {


        $message = "Please accept the Terms and Conditions";


    }


    // Check password confirmation
    else if ($password !== $confirmPassword) {


        $message = "Passwords do not match";


    }


    // Insert user only if no errors
    else {


        $hashedPassword = password_hash(
            $password,
            PASSWORD_DEFAULT
        );


        $sql = "INSERT INTO users 
                (username, email, password)
                VALUES (?, ?, ?)";


        $stmt = $conn->prepare($sql);


        $stmt->execute([

            $username,
            $email,
            $hashedPassword

        ]);



        header("Location: Login.php?register=success");

        exit();


    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Create Account | Recipe Hub</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<section class="register-section">

<div class="register-card">

<h1>
Create Your Account
</h1>

<p>
Join Recipe Hub and save your favourite recipes
</p>

<?php
if ($message != "") {

    if ($message == "Registration successful!") {
        echo "<div class='success-message'>$message</div>";
    } else {
        echo "<div class='warning-message'>$message</div>";
    }

}
?>

<form id="registerForm" method="POST">

    <div class="input-box">
        <i class="fa-solid fa-envelope"></i>
        <input type="email" 
        name="email"
        id="registerEmail"
        placeholder="Email"
        required>
    </div>


    <div class="input-box">
        <i class="fa-solid fa-user"></i>
        <input type="text" 
        name="username"
        id="registerUsername"
        placeholder="Username"
        required>
    </div>


    <div class="input-box">

    <i class="fa-solid fa-lock"></i>

    <input
    type="password"
    name="password"
    id="password"
    placeholder="Password"
    required>


    <i class="fa-solid fa-eye"
     id="togglePassword">
    </i>


</div>


   <div class="input-box">

    <i class="fa-solid fa-lock"></i>

    <input
    type="password"
    name="confirmPassword"
    id="confirmPassword"
    placeholder="Confirm Password"
    required>


    <i class="fa-solid fa-eye"
        id="toggleConfirmPassword">
    </i>


    </div>

    <label>
        <input type="checkbox" name="terms"id="terms"required>
        I agree to the Terms and Conditions
    </label>


    <button type="submit">
        Create Account
    </button>

</form>


<p class="login-link">

Already have an account?

<a href="login.php">
Login
</a>

</p>


</div>

</section>

<footer>

© 2026 Recipe Hub. All Rights Reserved.

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script src="../js/recipeData.js"></script>
<script src="../js/script.js"></script>

<script>


const toggleConfirmPassword =
document.getElementById("toggleConfirmPassword");


const confirmPassword =
document.getElementById("confirmPassword");



if(toggleConfirmPassword && confirmPassword){


    toggleConfirmPassword.addEventListener("click", function(){


        if(confirmPassword.type === "password"){


            confirmPassword.type = "text";


            toggleConfirmPassword.classList.remove("fa-eye");

            toggleConfirmPassword.classList.add("fa-eye-slash");


        }

        else{


            confirmPassword.type = "password";


            toggleConfirmPassword.classList.remove("fa-eye-slash");

            toggleConfirmPassword.classList.add("fa-eye");


        }


    });


}

</script>

</body>

</html>