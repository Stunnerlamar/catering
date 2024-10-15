<?php
// Include the database connection file
include '../Inc/db_connection.php';

// Check if order ID is provided via GET request
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    // Query to fetch order details based on order ID
    $query = "SELECT * FROM orders WHERE order_id = $order_id";
    $result = $conn->query($query);

    // Check if the query was successful and if there is exactly one row returned
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Generate HTML markup for modal body with order details
        $html = '<div class="form-group">
        <label for="editOrderID">Order ID</label>
        <input type="text" name="editOrderID" class="form-control" readonly value="' . $row['order_id'] . '" readonly>
        </div>

        <div class="form-group">
            <label for="editStatus">Status</label>
            <select name="editStatus" class="form-control">
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="in_transit">In Transit</option>
                <option value="delivered">Delivered</option>
                <!-- Add more options if needed -->
            </select>
        </div>
        <div class="form-group">
            <label for="editName">Name</label>
            <input type="text" name="editName" class="form-control" value="' . $row['name'] . '">
        </div>
        <div class="form-group">
            <label for="editPhoneNumber">Phone Number</label>
            <input type="tel" name="editPhoneNumber" class="form-control" value="' . $row['phone_number'] . '">
        </div>
        <div class="form-group">
            <label for="editFoodName">Food Name</label>
            <input type="text" name="editFoodName" class="form-control" value="' . $row['food_name'] . '">
        </div>
         <div class="form-group">
            <label for="editFoodName">Extra Food</label>
            <input type="text" name="extra_food" class="form-control" value="' . $row['extra_food'] . '">
        </div>
        <div class="form-group">
            <label for="editFoodName">Quantity</label>
            <input type="text" name="quantity" class="form-control" value="' . $row['quantity'] . '">
        </div>
        <div class="form-group">
            <label for="editVenue">Venue</label>
            <input type="text" name="editVenue" class="form-control" value="' . $row['venue'] . '">
        </div>
        <div class="form-group">
            <label for="editMessage">Message</label>
            <input type="text" name="editMessage" class="form-control" value="' . $row['message'] . '">
        </div>
        <div>
            <input type="submit" value="Update" class="bg-success text-light w-100 py-4" >
        </div>
        
        ';



        echo $html; // Output HTML markup
    } else {
        echo 'Order not found'; // If order with provided ID is not found
    }
} else {
    echo 'Invalid request'; // If order ID is not provided in the request
}
?>
