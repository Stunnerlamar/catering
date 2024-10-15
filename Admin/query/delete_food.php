<?php
include '../Inc/db_connection.php';

// Check if food ID is provided and valid
if (isset($_POST['food_id'])) {
    $foodId = $_POST['food_id'];
    echo $foodId;

    // Query to delete food item from the database
    $query = "DELETE FROM `foods` WHERE `food_id` = $foodId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Food item deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete food item']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Food ID is missing']);
}

mysqli_close($connection);
?>
