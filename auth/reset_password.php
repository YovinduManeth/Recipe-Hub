<?php

session_start();

include "../includes/db.php";


$message = "";


$email = $_GET["email"] ?? "";



if(isset($_POST["resetPassword"])){


    $password = $_POST["password"];

    $confirmPassword = $_POST["confirmPassword"];



    if($password !== $confirmPassword){


        $message = "Passwords do not match.";


    }

    else{


        $hashedPassword =
        password_hash($password, PASSWORD_DEFAULT);



        $sql = "
        UPDATE users
        SET password=?
        WHERE email=?
        ";


        $stmt = $conn->prepare($sql);


        $stmt->execute([

            $hashedPassword,
            $email

        ]);



        header("Location: Login.php?reset=success");

        exit();


    }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Reset Password | Recipe Hub</title>


<link rel="stylesheet" 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<link rel="stylesheet" href="../css/style.css">


</head>


<body class="login-body">


<div class="login-page">


<div class="login-container">



<!-- LEFT SIDE -->

<div class="login-left">


<p class="tagline">
Taste the Joy of Cooking.
</p>



<img src="../Images/Logo/Recipe_Hub_logo.png"
alt="Recipe Hub Logo"
class="logo-image">



<h1>
Recipe Hub
</h1>



<p class="description">

Create a new password<br>
and continue cooking.

</p>



</div>





<!-- RIGHT SIDE -->


<div class="login-right">


<div class="login-box">



<h2 class="welcome">

Reset Password

</h2>



<p class="subtitle">

Enter your new password below

</p>



<?php

if($message != ""){

    if($message == "Password reset successful!"){

        echo "
        <div class='success-message'>
        $message
        </div>";

    }

    else{

        echo "
        <div class='warning-message'>
        $message
        </div>";

    }

}

?>





<form method="POST">

<input 
type="hidden"
name="email"
value="<?php echo $email; ?>">




<div class="input-box">

    <i class="fa-solid fa-lock"></i>

    <input
    type="password"
    name="password"
    id="newPassword"
    placeholder="New Password"
    required>

    <i class="fa-solid fa-eye"
    id="toggleNewPassword">
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





<button type="submit" name="resetPassword">

Reset Password

</button>



<div class="separator">

<span>
OR
</span>

</div>



<a href="Login.php" class="create-account">

Back to Login

</a>



</form>



</div>


</div>



</div>


</div>





<footer>

© 2026 Recipe Hub. All Rights Reserved.

</footer>

<script>

const toggleNewPassword =
document.getElementById("toggleNewPassword");

const newPassword =
document.getElementById("newPassword");


if(toggleNewPassword && newPassword){

    toggleNewPassword.addEventListener("click",function(){

        if(newPassword.type==="password"){

            newPassword.type="text";

            toggleNewPassword.classList.remove("fa-eye");
            toggleNewPassword.classList.add("fa-eye-slash");

        }

        else{

            newPassword.type="password";

            toggleNewPassword.classList.remove("fa-eye-slash");
            toggleNewPassword.classList.add("fa-eye");

        }

    });

}


// Confirm password eye

const toggleConfirmPassword =
document.getElementById("toggleConfirmPassword");

const confirmPassword =
document.getElementById("confirmPassword");


console.log(toggleConfirmPassword);
console.log(confirmPassword);


if(toggleConfirmPassword && confirmPassword){

    toggleConfirmPassword.addEventListener("click",function(){

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