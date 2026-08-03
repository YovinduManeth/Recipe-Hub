<?php
include "../includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $email = $_POST["email"];
    $username = $_POST["username"];
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

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password)
                VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            $username,
            $email,
            $hashedPassword
        ]);

        $message = "Registration successful!";
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
        <input type="password"
        name="password"
        id="registerPassword"
        placeholder="Password"
        required>
    </div>


    <div class="input-box">
        <i class="fa-solid fa-lock"></i>
        <input type="password"
        name="confirmPassword"
        id="confirmPassword"
        placeholder="Confirm Password"
        required>
    </div>


    <label>
        <input type="checkbox" name="terms" id="termsCheck">
        I agree to the Terms and Conditions
    </label>


    <button type="submit">
        Create Account
    </button>

</form>


<p class="login-link">

Already have an account?

<a href="login.html">
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


</body>

</html>