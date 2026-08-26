<?php

include "../includes/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data safely
    $email = trim($_POST["email"] ?? "");
    $username = trim($_POST["username"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirmPassword = $_POST["confirmPassword"] ?? "";


    // 1. Check empty fields
    if (
        $email === "" ||
        $username === "" ||
        $password === "" ||
        $confirmPassword === ""
    ) {

        $message = "Please fill in all fields.";

    }


    // 2. Validate email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Please enter a valid email address.";

    }


    // 3. Check Terms and Conditions
    elseif (!isset($_POST["terms"])) {

        $message = "Please accept the Terms and Conditions.";

    }


    // 4. Check password confirmation
    elseif ($password !== $confirmPassword) {

        $message = "Passwords do not match.";

    }

    elseif (strlen($password) < 8) {

    $message = "Password must be at least 8 characters.";

}


    else {

        // 5. Check duplicate username or email
        $sql = "SELECT id
                FROM users
                WHERE username = ?
                OR email = ?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            $username,
            $email
        ]);


        if ($stmt->fetch()) {

            $message = "Username or email already exists.";

        }


        else {

            // 6. Hash password using bcrypt
            $hashedPassword = password_hash(
                $password,
                PASSWORD_BCRYPT
            );


            // 7. Insert user
            $sql = "INSERT INTO users
                    (username, email, password)
                    VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);

            $stmt->execute([
                $username,
                $email,
                $hashedPassword
            ]);


            // Registration successful
            header("Location: login.php?register=success");

            exit();

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
        <input type="checkbox" name="terms" id="terms" required>

        I agree to the
        <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">
            Terms and Conditions
        </a>
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

<!-- ================= TERMS AND CONDITIONS MODAL ================= -->

<div
    class="modal fade"
    id="termsModal"
    tabindex="-1"
    aria-labelledby="termsModalLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <div class="modal-content">

            <div class="modal-header">

                <h5
                    class="modal-title"
                    id="termsModalLabel"
                >
                    Recipe Hub - Terms and Conditions
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>

            </div>


            <div class="modal-body">

                <h6>1. Account Registration</h6>

                <p>
                    Users must provide accurate and valid information
                    when creating a Recipe Hub account.
                </p>


                <h6>2. Account Security</h6>

                <p>
                    Users are responsible for keeping their account
                    information and password secure.
                </p>


                <h6>3. Favourite Recipes</h6>

                <p>
                    Users may save recipes to their favourites list
                    for personal use. Favourite recipes are associated
                    with the user's account.
                </p>


                <h6>4. Recipe Information</h6>

                <p>
                    Recipe Hub provides recipes for informational and
                    educational purposes. Users should verify
                    ingredients and cooking instructions before use.
                </p>


                <h6>5. User Conduct</h6>

                <p>
                    Users should use the Recipe Hub system responsibly
                    and must not attempt to misuse or damage the system.
                </p>


                <h6>6. Privacy</h6>

                <p>
                    User information submitted through registration
                    and contact forms is stored in the Recipe Hub
                    database and should be handled responsibly.
                </p>


                <h6>7. Acceptance</h6>

                <p>
                    By creating an account, the user confirms that
                    they have read and agreed to these Terms and
                    Conditions.
                </p>

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

<footer>

© 2026 Recipe Hub. All Rights Reserved.

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script src="../js/recipeData.js"></script>
<script src="../js/script.js"></script>

<script>
function setupPasswordToggle(inputId, eyeId) {

    const input = document.getElementById(inputId);
    const eye = document.getElementById(eyeId);

    if (!input || !eye) {
        return;
    }

    eye.addEventListener("click", function () {

        if (input.type === "password") {

            input.type = "text";

            eye.classList.remove("fa-eye");
            eye.classList.add("fa-eye-slash");

        } else {

            input.type = "password";

            eye.classList.remove("fa-eye-slash");
            eye.classList.add("fa-eye");

        }

    });
}


setupPasswordToggle("password", "togglePassword");

setupPasswordToggle("confirmPassword", "toggleConfirmPassword");
</script>

</body>

</html>