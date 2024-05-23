<?php

require_once 'connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paymentStatus = $_POST['payment_status'];
    $guestId = $_POST['guest_id'];

    // Update the payment status in the database
    $sql = "UPDATE guests SET payment_status = '$paymentStatus' WHERE guest_id = '$guestId'";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Payment status updated successfully.");</script>';
    } else {
        echo '<script>alert("Error updating payment status: ' . $conn->error . '");</script>';
    }
}

$conn->close();
?>
<script>
    setTimeout(function() {
        window.location.href = "adminpanel.php";
    }, 1000);
</script>