<?php
// Include your database connection file
require_once '../Inc/db_connection.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the item ID from the POST data
    $itemId = $_POST['itemId'];

    // Prepare the SQL statement to remove the item from the cart
    $stmt = $conn->prepare("DELETE FROM cart WHERE cart_id = ?");
    $stmt->bind_param("i", $itemId);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Item removed successfully.";
    } else {
        echo "Error removing item.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
