<?php 
include("connection.php");

if(isset($_POST['sign-up'])){
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);

    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);
    if($result->num_rows > 0){
        echo "Email Address Already Exists !";
    }
    else{
        $query = "INSERT INTO users (user_id, user_name, password, email) VALUES ('$user_id', '$user_name', '$password', '$email')";  
        if($conn->query($insertQuery) === TRUE){
            header("location: reg.php");
            exit();
        }
        else{
            echo "Error: " . $conn->error;
        }
    }
}

if(isset($_POST['sign-in'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        header("Location: index.php");
        exit();
    }
    else{
        echo "Not Found, Incorrect Email or Password";
    }
}
?>
