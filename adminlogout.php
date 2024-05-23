<?php
session_start();
session_destroy();
header("Location: adminlogin.php"); // Redirect to login page
exit;
?>
