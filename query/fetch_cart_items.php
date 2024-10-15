<?php
// Start the session
session_start();

// Include your database connection file
include_once '../Inc/db_connection.php';

// Fetch cart items from the database for the current user
$user_id = $_SESSION['user_id'];
$query = "SELECT c.*, f.name AS food_name, f.price AS food_price, f.image_path AS food_image FROM cart c JOIN foods f ON c.food_id = f.food_id WHERE c.user_id = $user_id";
$result = mysqli_query($conn, $query);

// Initialize total price and quantity variables
$total_price = 0;
$total_quantity = 0;

// Shipping fee
$shipping_fee = 150;

// Check if there are any cart items
if (mysqli_num_rows($result) > 0) {
    // Initialize an empty string to store the HTML content
    $cartItemsHTML = '';
    $cartFooterHTML = '';
    $shipping_fee = 0;

    // Loop through each cart item and append HTML content
    while ($row = mysqli_fetch_assoc($result)) {
        // Update total price and quantity
        $total_price += $row['food_price'] * $row['quantity'];
        $total_quantity += $row['quantity'];

        $cartItemsHTML .= '<div class="cart-item">';
        $cartItemsHTML .= '<div class="item-image">';
        $cartItemsHTML .= '<img src="Images/' . $row['food_image'] . '" alt="' . $row['food_name'] . '">';
        $cartItemsHTML .= '</div>';
        $cartItemsHTML .= '<div class="item-details">';
        $cartItemsHTML .= '<h3 class="item-name">' . $row['food_name'] . '</h3> <br />';
        $cartItemsHTML .= '<h4 class="item-price">Price: ' . $row['food_price'] . '</h4>';
        $cartItemsHTML .= '<h4 class="item-price">Total Price: ' . ($row['food_price'] *  $row['quantity']) . '</h4>';
        $cartItemsHTML .= '<div class="item-actions">';
        $cartItemsHTML .= '<button class="remove-btn mx-3" onclick="removeFromCart(' . $row['cart_id'] . ')">Remove</button>';
        $cartItemsHTML .= '<button class="reduce-btn" onclick="reduceQuantity(' . $row['cart_id'] . ')">-</button>';
        $cartItemsHTML .= '<span class="item-quantity">' . $row['quantity'] . '</span>';
        $cartItemsHTML .= '<button class="increase-btn" onclick="increaseQuantity(' . $row['cart_id'] . ')">+</button>';
        $cartItemsHTML .= "<hr />";
        $cartItemsHTML .= '</div>';
        $cartItemsHTML .= '</div>';
        $cartItemsHTML .= '</div>';
    }

    // Calculate total price with shipping fee
    if ($total_price < 3000) {
        $total_price += $shipping_fee;
    }

    $cartFooterHTML = `
        <h4>Total Quantity: <?php echo $total_quantity; ?></h4>
        <h4>Shipping Fees: <?php echo $shippng_fee; ?> <i class="fa fa-truck px-5"></i></h4>
        <h3 class='text-success'>Total Price: $<?php echo $total_price; ?></h3>
        <button class="checkout-btn px-5" onclick="showCheckoutModal()">Checkout</button>
        `;

    // Echo the HTML content
    echo $cartItemsHTML;
    echo $cartFooterHTML;
    
} else {
    // If there are no cart items, display a message
    echo '<p>No items in the cart.</p>';
}

// Close the database connection
mysqli_close($conn);
?>
