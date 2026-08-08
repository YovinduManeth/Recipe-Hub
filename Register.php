<?php

$message = "";

if(isset($_POST["createAccount"])){

    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];


    if($password != $confirmPassword){

        $message = "Passwords do not match!";

    }

    else{

        include "includes/db.php";


        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO users(email, username, password)
                VALUES(?,?,?)";


        $stmt = $conn->prepare($sql);


        try{

            $stmt->execute([
                $email,
                $username,
                $hashedPassword
            ]);


            $message = "Account created successfully!";

        }

        catch(PDOException $e){

            $message = "Email already exists!";

        }

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

<link rel="stylesheet" href="css/style.css">

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

<form id="registerForm" method="POST" action="register.php">

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

    <input type="password"
    name="password"
    id="registerPassword"
    placeholder="Password"
    required>

    <i class="fa-solid fa-eye password-eye"
    onclick="togglePassword('registerPassword', this)">
    </i>

    </div>

    <div class="input-box">

    <i class="fa-solid fa-lock"></i>

    <input type="password"
    name="confirmPassword"
    id="confirmPassword"
    placeholder="Confirm Password"
    required>

    <i class="fa-solid fa-eye password-eye"
    onclick="togglePassword('confirmPassword', this)">
    </i>

</div>
    

    <label>
        <input type="checkbox" id="termsCheck">
        I agree to the Terms and Conditions
    </label>


    <button type="submit" name = "createAccount">
        Create Account
    </button>

    <?php

        if($message!=""){

        echo "
        <div class='alert alert-info mt-3'>
        $message
        </div>";

        }

        ?>

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


<script src="js/recipeData.js"></script>
<script src="js/script.js"></script>


</body>

</html>