<?php
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "code_helix";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$payment_method = $_POST['payment-method'];
$cost = 250; // Fixed cost for learning materials
$payment_status = 'Pending'; // Default payment status

$sql = "INSERT INTO payments (email, payment_method, cost, payment_status) VALUES ('$email', '$payment_method', '$cost', '$payment_status')";

if ($conn->query($sql) === TRUE) {
    echo "Thank you for buying our E-learning Materials, We send you a email confirmation";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
