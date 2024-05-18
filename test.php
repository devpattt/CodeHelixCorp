<?php 

$sql = "INSERT INTO users (column1, column2, column3) VALUES ('value1', 'value2', 'value3')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>