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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE payments SET payment_status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$sql = "SELECT * FROM payments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
    <h2>Admin Panel - Update Payment Status</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Payment Method</th>
            <th>Cost</th>
            <th>Payment Status</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['payment_method']}</td>
                        <td>{$row['cost']}</td>
                        <td>{$row['payment_status']}</td>
                        <td>
                            <form method='POST'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <select name='status'>
                                    <option value='Pending' " . ($row['payment_status'] == 'Pending' ? 'selected' : '') . ">Pending</option>
                                    <option value='Completed' " . ($row['payment_status'] == 'Completed' ? 'selected' : '') . ">Completed</option>
                                    <option value='Failed' " . ($row['payment_status'] == 'Failed' ? 'selected' : '') . ">Failed</option>
                                </select>
                                <button type='submit'>Update</button>
                            </form>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
