<?php
// Assuming you have a database connection established
// Replace 'your_database_host', 'your_database_name', 'your_database_username', and 'your_database_password' with your actual database credentials
$mysqli = new mysqli('your_database_host', 'your_database_username', 'your_database_password', 'your_database_name');

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Fetch payment details based on the submitted email
$email = $_POST['email']; // Assuming email is submitted via POST
$query = "SELECT * FROM your_table_name WHERE email = '$email'"; // Replace 'your_table_name' with your actual table name
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $paymentDetails = array(
        'email' => $row['email'],
        'paymentMethod' => $row['payment_method'] // Assuming 'payment_method' is the column name in your table
    );
    echo json_encode($paymentDetails);
} else {
    echo json_encode(array('error' => 'Payment details not found'));
}

$mysqli->close();
?>
