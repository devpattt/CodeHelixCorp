<?php
session_start();

include("connect.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];


    if (isset($_POST['sign-in'])) {
        // Sign-In
        $user_name = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $password = filter_var($passwordInput, FILTER_SANITIZE_STRING);
    
        if (!empty($user_name) && !empty($password) && !empty($email)) {
            // Assuming $con is defined and represents your database connection
            // Check if the user exists in the 'users' table using prepared statements
            $query = "SELECT * FROM users WHERE username = ? AND email = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "ss", $user_name, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
    
            // Check if the user exists in the 'admin' table using prepared statements
          /*  $query2 = "SELECT * FROM admins WHERE AD_user = ? AND AD_pass = ?";
            $stmt2 = mysqli_prepare($con, $query2);
            mysqli_stmt_bind_param($stmt2, "ss", $user_name, $password);
            mysqli_stmt_execute($stmt2);
            $result2 = mysqli_stmt_get_result($stmt2);*/
    
            if (mysqli_num_rows($result) > 0 ) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $hashedPassword = $row['password'];
                if (password_verify($password, $hashedPassword)) {
                    
                $_SESSION['username'] = $user_name;
        
                // You can use $user_name, $password, or other data here
        
                header("Location: index.php");
                die;
                }
                
            } 
            /*elseif (mysqli_num_rows($result2) == 1) {
                // Successful sign-in for an admin
                $_SESSION['user_name'] = $user_name;
                header("Location: admin.php");
                die;
            } else {
                echo '<div class="error-message">Invalid username or password. Please try again.</div>';
            } */
    
            mysqli_close($con);
        }
    }
    elseif (isset($_POST['sign-up'])) {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user_name = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
          //  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        // Sign-Up
        if (!empty($user_name) && !empty($email) && !empty($password) && !is_numeric($user_name)) {
            // Save sa database
            $user_id = random_num(20);
            $query = "INSERT INTO users (user_id, username, password, email) VALUES ('$user_id', '$user_name', '$password', '$email')";  
            mysqli_query($con, $query);
            header("Location: signup.php");
            die;
        
        } 
    }
}
}    


?>