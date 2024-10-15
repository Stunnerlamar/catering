<?php
// Include the database connection file
include '../Inc/db_connection.php';

// Check if food ID is provided via GET request
if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
    // Query to fetch food details based on food ID
    $query = "SELECT * FROM foods WHERE food_id = $food_id";
    $result = $conn->query($query);

    // Check if the query was successful and if there is exactly one row returned
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Generate HTML markup for modal body with food details
        $html = '
            <form id="editFoodForm" action="query/update_food.php" method="post">
                <input type="hidden" name="foodId" value="' . $row['food_id'] . '">
                <div class="form-group">
                    <label for="editFoodName">Food Name</label>
                    <input type="text" class="form-control" id="editFoodName" name="editFoodName" value="' . $row['name'] . '">
                </div>
                <div class="form-group">
                    <label for="editFoodStars">Stars</label>
                    <input type="number" class="form-control" id="editFoodStars" name="editFoodStars" min="0" max="5" step="0.1" value="' . $row['stars'] . '">
                </div>
                <div class="form-group">
                    <label for="editFoodPrice">Price</label>
                    <input type="text" class="form-control" id="editFoodPrice" name="editFoodPrice" value="' . $row['price'] . '">
                </div>
                <div>
                     <input type="submit" class="form-control bg-success text-light" value="Update">
                </div>
            </form>';

        echo $html; // Output HTML markup
    } else {
        echo 'Food not found'; // If food with provided ID is not found
    }
} else {
    echo 'Invalid request'; // If food ID is not provided in the request
}
?>
