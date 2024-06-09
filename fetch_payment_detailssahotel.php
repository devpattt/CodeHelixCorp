<?php
// Assuming you have a database connection established
// Replace 'your_database_host', 'your_database_name', 'your_database_username', and 'your_database_password' with your actual database credentials
$mysqli = new mysqli('localhost', 'root', '', 'code_helix');

// Check connection
if ($mysqli->connect_error) {
    die(json_encode(array('error' => 'Connection failed: ' . $mysqli->connect_error)));
}

// Check if 'email' key is set in $_POST
if(isset($_POST['email'])) {
    // Fetch payment details based on the submitted email
    
    $email = $_POST['email']; // Assuming email is submitted via POST
    $query = "SELECT * FROM payments WHERE email = '$email'"; // Replace 'your_table_name' with your actual table name
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
} else {
    echo json_encode(array('error' => 'Email parameter is missing'));
}

$mysqli->close();
?>
