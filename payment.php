<?php
require_once 'dbconn.php';

$guest_id = isset($_GET['guest_id']) ? intval($_GET['guest_id']) : 0;

$sql = "SELECT * FROM guests WHERE guest_id = $guest_id";
$result = $conn->query($sql);
$guest = $result->fetch_assoc();

// Calculate the number of days and total cost
$checkInDate = new DateTime($guest['check_in_date']);
$checkOutDate = new DateTime($guest['check_out_date']);
$interval = $checkInDate->diff($checkOutDate);
$days = $interval->format('%a');
$cost = $days * 100;

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      background-image: url("room.jpg");
      background-size: cover;
      background-repeat: no-repeat;
    }

    h1 {
      text-align: center;
      margin-top: 20px;
      color: white;
    }

    form {
      max-width: 500px;
      margin: 0 auto;
      padding: 50px;
      background-color: rgba(0, 0, 0, 0.8); 
      border-radius: 5px;
      color: white;
      position: relative;
    }

    label {
      display: block;
      font-weight: bold;
      margin-top: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="number"],
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-right: 10px;
    }
    
    input[type="button"] {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .back-button {
      background-color: #777;
      float: right;
    }
    input[type="button"],
    .back-button  {
      background-color: red;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      float: right;
    }
  </style>
  <script>
    function showAlert() {
    var paymentMethod = document.getElementById("payment-method").value;
    if (paymentMethod === "") {
      window.alert("Please select a payment method.");
      return false; // Prevent form submission
    } else {
      window.alert("Receipt was sent to your email. Thank you for booking.");
    }
  }
  </script>
</head>
<body>
  <h1>Payment Details</h1>
  <form action="save_payment.php" method="post">
  <p>Name: <?php echo $guest['name']; ?></p>
  <p>Email: <?php echo $guest['email']; ?></p>
  <p>Check-in Date: <?php echo $guest['check_in_date']; ?></p>
  <p>Check-out Date: <?php echo $guest['check_out_date']; ?></p>
  <p>Room Type: <?php echo $guest['room_type']; ?></p>
  <p>Total Cost: ₱<?php echo $cost; ?></p>

  
    <label for="payment-method">Payment Method:</label>
    <select id="payment-method" name="payment-method" required>
      <option value="">Select Payment Method</option>
      <option value="gcash">Gcash</option>
      <option value="debit">Debit</option>
    </select>

    <input type="hidden" name="guest_id" value="<?php echo $guest['guest_id']; ?>">
    <input type="hidden" name="cost" value="<?php echo $cost; ?>">
    
    <input type="submit" value="Submit" onclick="showAlert()">  
    <input type="button" class="back-button" value="Back" onclick="history.back()">
  </form>
</body>
</html>
