<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: admin_login.php");
    exit();
}

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

$update_success = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE payments SET payment_status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $update_success = true;
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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        
        h2 {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        form {
            display: inline-block;
        }

        select {
            padding: 5px;
            margin-right: 10px;
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease-out;
        }

        .modal.show {
            display: block;
            opacity: 1;
        }

        .modal-content {
            background-color: #f2f2f2;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            max-width: 800px;
            border-radius: 4px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .header {
            position: relative;
        }

        .logo {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 50px;
            height: auto;
            margin-right: 5px;
        }

        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/Codehelixlogo.png" alt="Company Logo">
            <span style="color: white;">CodeHelixCorp</span>
        </div>
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></h2>
        <form action="adminlogin.php" method="post">
            <input type="submit" class="logout-btn" value="Logout">
        </form>
    </div>
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

    <?php if ($update_success): ?>
    <div id="success-modal" class="modal show">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Record updated successfully</p>
        </div>
    </div>
    <script>
        setTimeout(function() {
            var successModal = document.getElementById('success-modal');
            successModal.style.display = 'none';
        }, 3000);

        var successModal = document.getElementById('success-modal');
        successModal.style.display = 'block';
        successModal.classList.add('show');

        setTimeout(function() {
            successModal.classList.remove('show');
            successModal.style.display = 'none';
        }, 3000);
    </script>
    <?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
