<?php
session_start();
include '../Inc/db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $food_name = $_POST['food_name'];
    $extra_food = $_POST['extra_food'];
    $quantity = $_POST['quantity'];
    $delivery_datetime = $_POST['delivery_datetime'];
    $venue = $_POST['venue'];
    $message = $_POST['message'];

    // Insert data into the database
    $sql = "INSERT INTO orders (name, phone_number, food_name, extra_food, quantity, delivery_datetime, venue, message)
            VALUES ('$name', '$phone_number', '$food_name', '$extra_food', $quantity, '$delivery_datetime', '$venue', '$message')";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "Order placed successfully!";
        header("Location: ../order.php");
    } else {
        $_SESSION['message'] =  "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
