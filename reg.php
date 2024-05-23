<?php
session_start();

include("connection.php");
include("functions.php");

// Define the validate function
function validate($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['sign-in'])) {
        // Sign-In
        $user_nameInput = validate($_POST['user_name']);
        $passwordInput = validate($_POST['password']);

        $user_name = filter_var($user_nameInput, FILTER_SANITIZE_STRING);
        $password = filter_var($passwordInput, FILTER_SANITIZE_STRING);

        if ($user_name != '' && $password != '') {
            $query = "SELECT * FROM users WHERE user_name = ? LIMIT 1";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "s", $user_name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $hashedPassword = $row['password'];
                if (!password_verify($password, $hashedPassword)) {
                    echo '<div class="error-message">Invalid Password. Please try again.</div>';
                } else {
                    $_SESSION['user_name'] = $user_name;
                    if ($row['role'] == 'admin') {
                        header("Location: admin.php");
                    } else {
                        header("Location: index.php");
                    }
                    die;
                }
            } else {
                echo '<div class="error-message">Invalid username or password. Please try again.</div>';
            }
        } else {
            echo '<div class="error-message">Please fill in all fields.</div>';
        }
    } elseif (isset($_POST['sign-up'])) {
        // Sign-Up
        $user_name = validate($_POST['user_name']);
        $password = validate($_POST['password']);
        $email = validate($_POST['email']);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        if (!empty($user_name) && !empty($email) && !empty($password) && !is_numeric($user_name)) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<div class="error-message">Invalid email address. Please try again.</div>';
            } else {
                $user_id = random_num(20);
                $query = "INSERT INTO users (user_id, user_name, password, email) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($con, $query);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "ssss", $user_id, $user_name, $hashedPassword, $email);
                    mysqli_stmt_execute($stmt);
                    header("Location: reg.php");
                    die;
                } else {
                    echo '<div class="error-message">Failed to prepare the SQL statement.</div>';
                }
            }
        } else {
            echo '<div class="error-message">Please fill in all fields correctly.</div>';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="reg.css">
    <title>Login Page</title>
</head>

<body>
<div class="container" id="container">
    <!-- Sign-up form with reCAPTCHA and password policy validation -->
    <div class="form-container sign-up">
        <form action="reg.php" class="sign-up-form" method="POST" onsubmit="return validatePassword()">
            <h1>Create Account</h1>
            <input type="text" name="user_name" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" id="password" placeholder="Password" required />
            <span class="password-policy-error" id="signUpPasswordPolicy"></span>
            <div class="g-recaptcha" data-sitekey="6LdR4OApAAAAAL_ZBVwp7Gw_RbJD-4_L2PxeODJ-"></div>
            <input type="submit" name="sign-up" id="registerBtn" class="btn solid" value="Sign up" />
        </form>
    </div>

    <!-- Sign-in form with reCAPTCHA -->
    <div class="form-container sign-in">
        <form action="reg.php" class="sign-in-form" method="POST">
            <h1>Sign In</h1>
            <input type="text" name="user_name" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <div class="g-recaptcha" data-sitekey="6LdR4OApAAAAAL_ZBVwp7Gw_RbJD-4_L2PxeODJ-"></div>
            <input type="submit" name="sign-in" id="loginBtn" value="Login" class="btn solid" />
        </form>
    </div>

    <div class="toggle-container">
        <div class="toggle">
            <div class="toggle-panel toggle-left">
                <img src="img/Codehelixlogo.png" alt="Your Logo" class="logo"> <br>
                <h1>Welcome to CodeHelixCorp!</h1>
                <p>Dive into a realm of knowledge as you unlock access to our cutting-edge e-learning platform with just a click</p>
                <button class="hidden" id="signInButton">Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
                <img src="img/Codehelixlogo.png" alt="Your Logo" class="logo"> <br>
                <h1>CodeHelixCorp</h1>
                <p>Ready to elevate your skills? Join CodeHelixCorp's e-learning community today and unleash your potential with our innovative courses and resources</p>
                <button class="hidden" id="signUpButton">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const signInButton = document.getElementById('signInButton');
        const signUpButton = document.getElementById('signUpButton');
        const container = document.getElementById('container');

        signInButton.addEventListener('click', () => {
            container.classList.remove("active");
        });

        signUpButton.addEventListener('click', () => {
            container.classList.add("active");
        });
    });

    function validatePassword() {
        const passwordInput = document.getElementById('password');
        const password = passwordInput.value;
        const passwordPolicyError = document.getElementById('signUpPasswordPolicy');

        // Password policy: At least 8 characters with at least one uppercase letter and one digit
        const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

        if (!passwordRegex.test(password)) {
            passwordPolicyError.textContent = "Password must be at least 8 characters long and contain at least one uppercase letter and one digit.";
            return false; // Prevent form submission
        } else {
            passwordPolicyError.textContent = ""; // Clear any previous error messages
            return true; // Allow form submission
        }
    }
</script>

</body>
</html>