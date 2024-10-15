<?php
session_start();
include '../Inc/db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $Stars = $_POST['stars'];
    echo $Stars;
    $restaurant_id = $_GET['restaurant_id'];
    

    // Prepare and execute SQL statement to insert new review
    $query = "INSERT INTO `review` (`name`, `comment`, `restaurant_id`, `Stars`) VALUES ('$name', '$comment', '$restaurant_id', $Stars)";
    $result = mysqli_query($conn, $query);

    // Check if insertion was successful
    if ($result) {
        echo "Review added successfully!";
        // You can redirect the user to a confirmation page or back to the original page
        header("Location: ../review.php?message='Reviw added Successfully'");
        // exit();
    } else {
        echo "Error adding review: " . mysqli_error($conn);
    }

    // Close database conn
    mysqli_close($conn);
} else {
    // If the request method is not POST, redirect the user back to the form page
    // header("Location: form_page.php");
    // exit();
}
?>
