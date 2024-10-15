<?php
// Start the session
session_start();

// Check if user is not logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to login page
    header("Location: ../Login.php");
    exit;
}
unset($_SESSION['user_id']);
unset($_SESSION['admin_id']);
header("Location: ../Login.php");

?>
