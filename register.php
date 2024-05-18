<?php
        include ("regbackend.php");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>Login Page</title>
    <link rel="stylesheet" href="register.css">
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
                <input type="text" name="username" placeholder="Username" />
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
                <input type="text" name="email" placeholder="Email" />
                <input type="text" name="username" placeholder="Username" />
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