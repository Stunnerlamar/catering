<?php
    // Include the database connection file
    include '../Inc/db_connection.php';
    echo ($_POST['foodId']);
    // Check if all required fields are provided via POST request
    if (isset($_POST['foodId'])) {
        $foodId = $_POST['foodId'];
        $food_name = $_POST['editFoodName'];
        $food_stars = $_POST['editFoodStars'];
        $editFoodPrice = $_POST['editFoodPrice'];
    
        // Query to update order details
        $query = "UPDATE foods SET name='$food_name', stars='$food_stars', price='$editFoodPrice' WHERE food_id=$foodId";

        // Execute the query
        if (mysqli_query($conn, $query)) {
            echo 'Order details updated successfully';
            header("Location: ../Foods.php");
        } else {
            echo 'Error updating order details: ' . mysqli_error($conn);
        }
    } else {
        echo 'Incomplete data provided';
    }
?>
