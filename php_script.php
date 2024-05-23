<?php
require_once 'connection.php';
require 'C:\xampp\htdocs\CodeHelixCorp\PHPmailer\src\Exception.php';
require 'C:\xampp\htdocs\CodeHelixCorp\PHPmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\CodeHelixCorp\PHPmailer\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

// Assuming you have a database connection established
// Replace 'your_database_host', 'your_database_name', 'your_database_username', and 'your_database_password' with your actual database credentials
$mysqli = new mysqli('localhost', 'root', '', 'code_helix');

// Check connection
if ($mysqli->connect_error) {
    die(json_encode(array('error' => 'Connection failed: ' . $mysqli->connect_error)));
}

$email = isset($_POST['email']) ? $_POST['email'] : '';
$paymentMethod = isset($_POST['payment-method']) ? $_POST['payment-method'] : '';
$cost = isset($_POST['cost']) ? intval($_POST['cost']) : 0;

// Sanitize inputs and use prepared statements to prevent SQL injection
$query = "UPDATE payments SET payment_method = ?, cost = ? WHERE email = ?";
$statement = $mysqli->prepare($query);
$statement->bind_param("sis", $paymentMethod, $cost, $email);
$statement->execute();

if ($statement->affected_rows > 0) {
    // Send payment details email
    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'baranggaymapulanglupa@gmail.com';
        $mail->Password = 'nvgeadocuwfaohao';
        $mail->SMTPSecure = 'tls'; // Use TLS
        $mail->Port = 587; // TLS port

        // Email settings
        $mail->setFrom('baranggaymapulanglupa@gmail.com', 'CodeHelixCorp');
        $mail->addAddress($email);

        $mail->Subject = 'Payment Details';
        $mail->Body = "Dear $email,\n\nThank you for your booking. Here are your payment details, please save a copy of this and present it to our desk:\n\nPayment Method: $paymentMethod\nTotal Cost: $cost";

        $mail->send();
        header("Location: index.php");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Failed to update payment details: " . $mysqli->error;
}

$mysqli->close();
?>