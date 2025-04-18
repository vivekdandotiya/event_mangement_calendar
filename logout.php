<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); // Enable error reporting

session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
header("Location: login.php"); // Redirect to login page
exit();
?>
