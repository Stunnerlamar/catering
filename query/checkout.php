<?php
// Include your database connection file
include '../Inc/db_connection.php';


    try {
        // Create a new order
        $stmt = $conn->prepare("INSERT INTO orders (user_id, order_date) VALUES (?, NOW())");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // Get the ID of the newly created order
        $order_id = $conn->insert_id;

        // Move items from the cart to the order
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, food_id, quantity) SELECT ?, food_id, quantity FROM cart WHERE user_id = ?");
        $stmt->bind_param("ii", $order_id, $user_id);
        $stmt->execute();

        // Clear the cart
        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // Commit the transaction
        $conn->commit();

        echo "Checkout successful.";
        header("Location: ../index.php");
    } catch (Exception $e) {
        // Rollback the transaction in case of error
        $conn->rollback();
        echo "Error processing checkout: " . $e->getMessage();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
?>
