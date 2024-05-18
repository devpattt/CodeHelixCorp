<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];


    if (isset($_POST['sign-in'])) {
        // Sign-In
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
    
        if (!empty($user_name) && !empty($password)) {
            // Assuming $con is defined and represents your database connection
            // Check if the user exists in the 'users' table using prepared statements
            $query = "SELECT * FROM users WHERE user_name = ? AND password = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "ss", $user_name, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
    
            // Check if the user exists in the 'admin' table using prepared statements
            $query2 = "SELECT * FROM admins WHERE AD_user = ? AND AD_pass = ?";
            $stmt2 = mysqli_prepare($con, $query2);
            mysqli_stmt_bind_param($stmt2, "ss", $user_name, $password);
            mysqli_stmt_execute($stmt2);
            $result2 = mysqli_stmt_get_result($stmt2);
    
            if (mysqli_num_rows($result) == 1) {
                // Successful sign-in for a regular user
                $_SESSION['user_name'] = $user_name;
        
                // You can use $user_name, $password, or other data here
        
                header("Location: index.php");
                die;
            } elseif (mysqli_num_rows($result2) == 1) {
                // Successful sign-in for an admin
                $_SESSION['user_name'] = $user_name;
                header("Location: admin.php");
                die;
            } else {
                echo '<div class="error-message">Invalid username or password. Please try again.</div>';
            }
    
            mysqli_close($con);
        }
    }
    elseif (isset($_POST['sign-up'])) {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        // Sign-Up
        if (!empty($user_name) && !empty($email) && !empty($password) && !is_numeric($user_name)) {
            // Save sa database
           
            $query = "INSERT INTO users (user_id, user_name, password, email) VALUES ('$user_id', '$user_name', '$hashedPassword', '$email')";  
            mysqli_query($con, $query);
            header("Location: signup.php");
            die;
        
        } 
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

    <title>Login Page</title>
    
    <style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body{
    background-color: #c9d6ff;
    background: linear-gradient(to right, #e2e2e2, #c9d6ff);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    height: 100vh;
    background-image: url('img/The_Heart_of_Quezon_City.jpg'); 
    background-size: cover;
    background-position: center; 
}

.error-message {
    color: #ff0000; 
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #fff;
    padding: 10px 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    z-index: 10;
}

.logo {
    width: 100px;
    height: auto;
    margin-right: 10px;
    }

.img {
    width: 200px; 
    height: auto;
    margin-right: 10px;
    margin-top: -20px; 
    }

.container{
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
}

.container p{
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.3px;
    margin: 20px 0;
}

.container span{
    font-size: 12px;
}

.container a{
    color: #333;
    font-size: 13px;
    text-decoration: none;
    margin: 15px 0 10px;
}
/* ito yun */
.container button{
    background-color: #512da8;
    color: #fff;
    font-size: 12px;
    padding: 10px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
}

.container button.hidden{
    background-color: transparent;
    border-color: #fff;
}

.container form{
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    height: 100%;
}

.container input{
    background-color: #eee;
    border: none;
    margin: 8px 0;
    padding: 10px 15px;
    font-size: 13px;
    border-radius: 8px;
    width: 100%;
    outline: none;
}

.form-container{
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in{
    left: 0;
    width: 50%;
    z-index: 2;
}

.container.active .sign-in{
    transform: translateX(100%);
}

.sign-up{
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.active .sign-up{
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: move 0.6s;
}

@keyframes move{
    0%, 49.99%{
        opacity: 0;
        z-index: 1;
    }
    50%, 100%{
        opacity: 1;
        z-index: 5;
    }
}

.social-icons{
    margin: 20px 0;
}

.social-icons a{
    border: 1px solid #ccc;
    border-radius: 20%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 3px;
    width: 40px;
    height: 40px;
}

.toggle-container{
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: all 0.6s ease-in-out;
    border-radius: 150px 0 0 100px;
    z-index: 1000;
}

.container.active .toggle-container{
    transform: translateX(-100%);
    border-radius: 0 150px 100px 0;
}

.toggle{
    background-color: #512da8;
    height: 100%;
    background: linear-gradient(to right, #5c6bc0, #512da8);
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.container.active .toggle{
    transform: translateX(50%);
}

.toggle-panel{
    position: absolute;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 30px;
    text-align: center;
    top: 0;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.toggle-left{
    transform: translateX(-200%);
}

.container.active .toggle-left{
    transform: translateX(0);
}

.toggle-right{
    right: 0;
    transform: translateX(0);
}

.container.active .toggle-right{
    transform: translateX(200%);
}
    </style>
</head>

<body>
    <div class="container" 
      div  id="container">
        <div class="form-container sign-up">
        <form action="#" class="sign-up-form" method="POST">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span>or use your email for registeration</span>
                <input type="text" name="user_name" placeholder="Username" />
                <input type="text" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <input type="submit" name="sign-up" class="btn" value="Sign up" />
            </form>
        </div>
        <div class="form-container sign-in">
        <form action="#" class="sign-in-form" method="POST">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="text" name="user_name" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <a href="#">Forget Your Password?</a>
                <input type="submit" name="sign-in" value="Login" class="btn solid" />
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                <img src="img/bluetruck.webp" alt="Your Logo" class="img"> <br>
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                <img src="img/Quezon_City.svg.png" alt="Your Logo" class="logo"> <br>
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

  <script>  const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
}); 
</script>
</body>

</html>