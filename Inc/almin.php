<style>
    /* style.css */
.cart-widget {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    width: 300px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    transform: translateX(100%);
    transition: transform 0.3s ease;
}

.cart-widget.open {
    transform: translateX(0);
}

.cart-header {
    padding: 15px;
    border-bottom: 1px solid #ccc;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.cart-header h2 {
    margin: 0;
    font-size: 20px;
}

.close-btn {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
}

.cart-items {
    padding: 15px;
    max-height: calc(100% - 100px);
    overflow-y: auto;
}

.cart-item {
    display: flex;
    margin-bottom: 20px;
}

.item-image {
    flex: 0 0 80px;
}

.item-image img {
    width: 100%;
    border-radius: 5px;
}

.item-details {
    flex: 1;
    padding-left: 10px;
}

.item-name {
    font-weight: bold;
}

.item-price {
    color: #777;
}

.item-actions {
    margin-top: 10px;
}

.remove-btn{
    background-color: #f44336;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.reduce-btn,
.increase-btn {
    background-color: gray;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}



.remove-btn:hover,
.reduce-btn:hover,
.increase-btn:hover {
    background-color: #d32f2f;
}

.item-quantity {
    display: inline-block;
    margin: 0 5px;
    font-weight: bold;
}


.cart-footer {
    padding: 20px;
    border-top: 1px solid #ccc;
    text-align: center;
}

.close-btn {
    background-color: transparent;
    border: none;
    cursor: pointer;
    font-size: 20px;
    color: #999;
}

.checkout-btn {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.checkout-btn:hover {
    background-color: #0056b3;
}

.cart-footer{
    position: absolute;
    bottom: 5%;
    width: 100%
}

</style>


<link rel="stylesheet" href="profile.css">

<?php include 'modals.php' ?>
<!-- Cart Widget -->
<div class="cart-widget">
    <div class="cart-header">
        <h2>Shopping Cart</h2>
        <button class="close-btn" onclick="toggleCart()">&times;</button>
    </div>
    <div class="cart-items">
        <?php
        // Fetch cart items from the database for the current user
        $user_id = $_SESSION['user_id'];
        $query = "SELECT c.*, f.name AS food_name, f.price AS food_price, f.image_path AS food_image FROM cart c JOIN foods f ON c.food_id = f.food_id WHERE c.user_id = $user_id";
        $result = mysqli_query($conn, $query);

        // Initialize total price and quantity variables
        $total_price = 0;
        $total_quantity = 0;
        $shippng_fee = 0;


        // Check if there are any cart items
        if (mysqli_num_rows($result) > 0) {
            // Loop through each cart item and display it
            while ($row = mysqli_fetch_assoc($result)) {
                // Update total price and quantity
                $total_price += $row['food_price'] * $row['quantity'];
                
                $total_quantity += $row['quantity'];
                $_SESSION['total_price'] = $total_price;

                echo '<div class="cart-item">';
                echo '<div class="item-image">';
                echo '<img src="Images/' . $row['food_image'] . '" alt="' . $row['food_name'] . '">';
                echo '</div>';
                echo '<div class="item-details">';
                echo '<h3 class="item-name">' . $row['food_name'] . '</h3> <br />';
                echo '<h4 class="item-price">Price:' . $row['food_price'] . '</h4>';
                echo '<h4 class="total-price">Total price:' . $row['food_price'] * $row['quantity'] . '</h4>';
                echo '<div class="item-actions">';
                echo '<button class="remove-btn mx-3" onclick="removeFromCart(' . $row['cart_id'] . ')">Remove</button>';
                echo '<button class="reduce-btn" onclick="reduceQuantity(' . $row['cart_id'] . ')">-</button>';
                echo '<span class="item-quantity">' . $row['quantity'] . '</span>';
                echo '<button class="increase-btn" onclick="increaseQuantity(' . $row['cart_id'] . ')">+</button>';
                echo "<hr />";
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No items in the cart.</p>';
        }

        if ($total_price < 3000 && $total_price > 0 ){
            $shippng_fee = 150; 
            $total_price += $shippng_fee;
        }
        ?>
    </div>
    <div class="cart-footer text-left">
        <!-- Display total price and quantity -->
        <h4>Total Quantity: <?php echo $total_quantity; ?></h4>
        <h4>Shipping Fees: <?php echo $shippng_fee; ?> <i class="fa fa-truck px-5"></i></h4>
        <h3 class='text-success'>Total Price: $<?php echo $total_price; ?></h3>
        <button class="checkout-btn px-5" onclick="showCheckoutModal()">Checkout</button>
    </div>
</div>


<div class="profile">
    <div class="row h-100">
        <div class="col-4 px-5 py-5 bg-primary  h-100" style="border-right:1px solid gray; h-100">
            <h2 class="text-primary text-center">USER PROFILE</h2>
            <hr>
            <img src="./Images/about.png" alt="" width="100%">

            <hr>
            <div>
                <div class="tab py text-light bg-primary py-4 px-5" onclick="showTab('dashboard')">Dashboard</div>
                <div class="tab py text-light bg-primary py-4 px-5" onclick="showTab('orders')">ORDERS</div>
                <div class="tab py text-light bg-primary py-4 px-5" onclick="showTab('favourite')">FAVOURITE</div>
                <div class="tab py text-light bg-primary py-4 px-5" onclick="showTab('profile')">PROFILE</div>
                <div class="tab py text-light bg-primary py-4 px-5" onclick="showTab('settings')">SETTINGS</div>
            </div>
        </div>

        <div class="col-8"> 
            <div class="profile_content px-3 " id="dashboard">
            <h3 class="text-primary text-center py-5">DASHBOARD CONTENT</h3>
            <div class="row">
            <?php
                // Assuming you have retrieved the necessary data from the database

                // Define and initialize the $total_orders variable
                $total_orders = 10; // Replace 10 with the actual total number of orders

                // Define and initialize the $latest_order variable
                $latest_order = array(
                    'order_id' => 123, // Replace 123 with the actual order ID
                    'order_date' => '2024-04-03', // Replace '2024-04-03' with the actual order date
                    'order_status' => 'Delivered' // Replace 'Delivered' with the actual order status
                );
                ?>
                <div class="col-6">
                    <div class="card bg-primary text-center" style="height: 300px">
                        <div class="card-body">
                            <h4>Total Orders</h4>
                            <p><?php echo $total_orders; ?></p> <!-- Display total orders here -->
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card bg-success text-center" style="height: 300px">
                        <div class="card-body">
                            <h4>Latest Order</h4>
                            <?php if ($latest_order): ?>
                                <p>Order ID: <?php echo $latest_order['order_id']; ?></p>
                                <p>Date: <?php echo $latest_order['order_date']; ?></p>
                                <p>Status: <?php echo $latest_order['order_status']; ?></p>
                            <?php else: ?>
                                <p>No orders available</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="profile_content orders" id="orders" style="display:none;">
                <h3 class="text-primary text-center py-5">ORDERS TRACKING</h3>
                <div class="order_tab px-3 py-2">
                    <!-- Fetch and display orders here -->
                    <?php
                    // Fetch orders for the current user
                    include 'db_connection.php';

                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT * FROM orders WHERE user_id = $user_id";
                    $result = mysqli_query($conn, $query);

                    $order_statuses = ['Purchased', 'In Transit', 'Arrived Pickup Point', 'Delivered'];
                    foreach ($order_statuses as $status) {
                        echo '<div class="Purchased py-4">' . $status . '</div>';
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Loop through each order and display it in a table row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td>' . $row['order_id'] . '</td>';
                                    echo '<td>' . $row['order_date'] . '</td>';
                                    echo '<td>' . $row['status'] . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="profile_content" id="favourite" style="display:none;">
                <h3 class="text-primary text-center py-5">FAVOURITE CONTENT</h3>

                <div class="row">
                    <?php
                    // Fetch favorite items from the database for the current user
                    $user_id = $_SESSION['user_id'];
                    $query = "SELECT f.food_id, f.name AS food_name, f.price AS food_price, f.image_path AS food_image 
                            FROM user_favorite uf 
                            JOIN foods f ON uf.food_id = f.food_id 
                            WHERE uf.user_id = $user_id";
                    $result = mysqli_query($conn, $query);

                    // Check if there are any favorite items
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through each favorite item and display it
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col-md-4 mb-4">';
                            echo '<div class="card">';
                            echo '<img src="Images/' . $row['food_image'] . '" class="card-img-top" alt="' . $row['food_name'] . '">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $row['food_name'] . '</h5>';
                            echo '<p class="card-text">$' . $row['food_price'] . '</p>';
                            // You can add a button to remove from favorites if needed
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-center">No favorite items available.</p>';
                    }
                    ?>
                </div>
            </div>

            <div class="profile_content" id="profile" style="display:none;">
                <h3 class="text-primary text-center py-5">PROFILE</h3>
                <?php
                // Fetch user information from the database
                $user_id = $_SESSION['user_id'];
                $query = "SELECT * FROM users WHERE user_id = $user_id";
                $result = mysqli_query($conn, $query);
                $user_data = mysqli_fetch_assoc($result);
                ?>

                <div class="container">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Profile Information</h2>
                        <h2 class="card-text">
                            <strong>Name:</strong> <?php echo $user_data['username']; ?><br>
                            <strong>Email:</strong> <?php echo $user_data['email']; ?><br>
                            <strong>Password:</strong> <?php echo $user_data['password']; ?><br>
                            <!-- Add other fields as needed -->
                        </h2>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary btn-sm mb-2 px-5">Edit Profile</a>
                            <a href="#" class="btn btn-primary btn-sm mb-2 px-5">Change Password</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="profile_content" id="settings" style="display:none;">
                <h3 class="text-primary text-center py-5">SETTINGS</h3>
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Account Settings</h5>
                                    <p class="card-text">
                                        <a href="#" class="btn btn-primary btn-block mb-3">Change Password</a>
                                        <a href="#" class="btn btn-primary btn-block mb-3">Update Email Address</a>
                                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteAccountModal">
                                            Delete Account
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
</div>



<script>
    // Function to show the checkout modal
    function showCheckoutModal() {
        $('#checkoutModal').modal('show');
    }

    // Function to handle form submission
    function submitCheckoutForm() {
        // Handle form submission here
        // You can use AJAX to submit the form data to the server
    }
</script>
<script>
    function toggleCart() {
        const cart = document.querySelector('.cart-widget');
        cart.classList.toggle('open');
    }

    function toggleUserProfile(){
        const cart = document.querySelector('.profile');
        cart.classList.toggle('open');
    }
    function showTab(tabName) {
        // Hide all profile content divs
        var profileContents = document.querySelectorAll('.profile_content');
        profileContents.forEach(function(content) {
            content.style.display = 'none';
        });

        // Show the selected tab
        document.getElementById(tabName).style.display = 'block';
    }
</script>


<?php
// Check if $_SESSION['message'] exists
if(isset($_SESSION['message'])) {
    // Echo JavaScript code to show toast message
    echo '<script>
              $(document).ready(function(){
                  $(".toast").toast("show");
              });
          </script>';
}
?>

<!-- Toast Message -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Message</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php
            // Display the message from $_SESSION['message']
            echo isset($_SESSION['message']) ? $_SESSION['message'] : '';
            ?>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

function removeFromCart(itemId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'query/remove_from_cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Update the cart display or handle success response
                console.log('Item removed from cart:', xhr.responseText);
                updateCart()
            } else {
                // Handle error response
                console.error('Error removing item from cart:', xhr.statusText);
            }
        }
    };
    var formData = 'itemId=' + encodeURIComponent(itemId);
    xhr.send(formData);
}

// Function to increase the quantity of an item in the cart
function increaseQuantity(itemId) {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    // Configure the AJAX request
    xhr.open('POST', 'query/increase_quantity.php', true);
    // Set the Content-Type header
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // Define the callback function for when the request completes
    xhr.onreadystatechange = function() {
        // Check if the request is complete
        if (xhr.readyState === XMLHttpRequest.DONE) {
            // Check if the request was successful
            if (xhr.status === 200) {
                // Update the cart display or handle success response
                console.log('Quantity increased for item:', xhr.responseText);
                // Optionally, you can call updateCart() here to refresh the cart display
                updateCart();
            } else {
                // Handle HTTP errors
                console.error('Error increasing quantity for item:', xhr.statusText);
            }
        }
    };
    // Construct the request body
    var formData = 'itemId=' + encodeURIComponent(itemId);
    // Send the AJAX request with the constructed body
    xhr.send(formData);
}

// Function to reduce the quantity of an item in the cart
function reduceQuantity(itemId) {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    // Configure the AJAX request
    xhr.open('POST', 'query/reduce_quantity.php', true);
    // Set the Content-Type header
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // Define the callback function for when the request completes
    xhr.onreadystatechange = function() {
        // Check if the request is complete
        if (xhr.readyState === XMLHttpRequest.DONE) {
            // Check if the request was successful
            if (xhr.status === 200) {
                // Update the cart display or handle success response
                console.log('Quantity reduced for item:', xhr.responseText);
                // Optionally, you can call updateCart() here to refresh the cart display
                updateCart();
            } else {
                // Handle HTTP errors
                console.error('Error reducing quantity for item:', xhr.statusText);
            }
        }
    };
    // Construct the request body
    var formData = 'itemId=' + encodeURIComponent(itemId);
    // Send the AJAX request with the constructed body
    xhr.send(formData);
}
// Function to update the cart content
function updateCart() {
    var cartItemsContainer = document.querySelector('.cart-items');
    // Clear the existing cart items
    cartItemsContainer.innerHTML = '';
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    // Configure the AJAX request
    xhr.open('GET', 'query/fetch_cart_items.php', true);
    // Define the callback function for when the request completes successfully
    xhr.onload = function() {
        // Check if the request was successful
        if (xhr.status >= 200 && xhr.status < 400) {
            // Parse the response as HTML and append it to the container
            cartItemsContainer.innerHTML = xhr.response;
        } else {
            // Handle HTTP errors
            console.error('Error fetching cart items:', xhr.statusText);
        }
    };
    // Define the callback function for when an error occurs
    xhr.onerror = function() {
        // Handle network errors
        console.error('Network error occurred while fetching cart items');
    };
    // Send the AJAX request
    xhr.send();
}

function checkout() {
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    // Configure the AJAX request
    xhr.open('POST', 'query/checkout.php', true);
    // Define the callback function for when the request completes
    xhr.onreadystatechange = function() {
        // Check if the request is complete
        if (xhr.readyState === XMLHttpRequest.DONE) {
            // Check if the request was successful
            if (xhr.status === 200) {
                // Handle success response, e.g., redirect to a success page
                updateCart();
                $('#checkoutModal').modal('hide');

                $('#congratsModal').modal('show');
            } else {
                // Handle HTTP errors
                console.error('Error processing checkout:', xhr.statusText);
            }
        }
    };
    // Send the AJAX request
    xhr.send();
}

</script>
