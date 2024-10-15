<?php
// Include your database connection file
include_once '../Inc/db_connection.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the item ID from the POST data
    $itemId = $_POST['itemId'];

    // Prepare the SQL statement to increase the quantity of the item
    $stmt = $conn->prepare("UPDATE cart SET quantity = quantity + 1 WHERE cart_id = ?");
    $stmt->bind_param("i", $itemId);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Quantity increased successfully.";
    } else {
        echo "Error increasing quantity.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
