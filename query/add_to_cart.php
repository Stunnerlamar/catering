<?php
session_start();
include '../Inc/db_connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Check if food_id and user_id are set and numeric
if (isset($_GET['food_id']) && isset($_SESSION['user_id']) && is_numeric($_GET['food_id']) && is_numeric($_SESSION['user_id'])) {
    $food_id = $_GET['food_id'];
    $user_id = $_SESSION['user_id'];

    // Prepare and execute the SQL statement with a prepared statement
    $insert_query = "INSERT INTO cart (user_id, food_id, quantity) VALUES (?, ?, 1)";
    $stmt = mysqli_prepare($conn, $insert_query);
    mysqli_stmt_bind_param($stmt, "ii", $user_id, $food_id);
    
    if (mysqli_stmt_execute($stmt)) {
        // Set success message
        $_SESSION['message'] = 'Item added to cart successfully';
        echo 'Item added to cart successfully';
    } else {
        // Set error message
        $_SESSION['message'] = 'Failed to add item to cart';
        echo 'Failed to add item to cart';
    }

    // Close prepared statement
    mysqli_stmt_close($stmt);

    // Redirect back to the previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    // Set error message and redirect to login page
    $_SESSION['message'] = 'Error: Invalid request';
    header('Location: ../login.php');
    exit();
}
?>
