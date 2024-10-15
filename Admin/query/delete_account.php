<?php
// Include the database connection file
include '../Inc/db_connection.php';

// Check if the order ID is provided via POST request
if(isset($_POST['order_id'])) {
    // Sanitize the input to prevent SQL injection
    $account_id = mysqli_real_escape_string($conn, $_POST['account_id']);

    // Query to delete the order from the database
    $query = "DELETE FROM account WHERE account_id = $account_id";

    // Execute the query
    if(mysqli_query($conn, $query)) {
        // If the query is successful, return a success message
        echo "Order deleted successfully";
    } else {
        // If there's an error with the query, return an error message
        echo "Error deleting order: " . mysqli_error($conn);
    }
} else {
    // If the order ID is not provided, return a message indicating the absence of the ID
    echo "Order ID not provided";
}
?>
