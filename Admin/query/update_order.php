<?php
// Include the database connection file
include '../Inc/db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $order_id = $_POST['editOrderID'];
    $name = $_POST['editName'];
    $phone_number = $_POST['editPhoneNumber'];
    $food_name = $_POST['editFoodName'];
    $extra_food = $_POST['extra_food'];
    $quantity = $_POST['quantity'];
    $status = $_POST['editStatus'];
    $venue = $_POST['editVenue'];
    echo $status;
    $message = $_POST['editMessage'];
    
    // Update order query
    $query = "UPDATE orders SET
                name = '$name',
                phone_number = '$phone_number',
                food_name = '$food_name',
                extra_food = '$extra_food',
                quantity = '$quantity',
                status = '$status',
                venue = '$venue',
                message = '$message'
                WHERE order_id = $order_id";

    // Execute the query
    if(mysqli_query($conn, $query)) {
        // If the query is successful, redirect to a success page or display a success message
        header("Location: ../Orders.php");
        exit();
    } else {
        // If there's an error with the query, display an error message
        echo "Error updating order: " . mysqli_error($conn);
    }
}
?>
