<?php
 include "./Inc/header.php";
 include "./Inc/db_connection.php";

// SQL query to fetch orders
$sql = "SELECT * FROM orders";

// Execute the query
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Initialize an empty array to store orders
    $orders = array();

    // Fetch associative array of orders
    while ($row = $result->fetch_assoc()) {
        // Add each row (order) to the orders array
        $order[] = $row;
    }

    // Free result set
    $result->free();
} else {
    echo "No orders found.";
}

// Close the database connection
$conn->close();
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <!-- Navbar content -->
</nav>

<!-- Sidebar -->

<!-- Navbar -->
<nav class="navbar sticky-top  navbar-expand-lg navbar-dark bg-primary">
    <div class="d-flex mx-5 justify-content-between w-100 py-3">
        <a class="navbar-brand" href="#">Admin Dashboard</a>

        
        <!-- Profile dropdown -->
        <div class="navbar-nav ms-auto">
            <!-- Navbar links -->
            <div class="navbar-nav">
                <a class="nav-link" href="#"><i class="fas fa-globe"></i> View Site</a>
                <a class="nav-link" href="#"><i class="fas fa-user"></i> User</a>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i> View Profile
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <?php include "./Inc/sidebar.php" ?>

        <!-- Main content area -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Orders</h1>
            </div>

            
            <!-- Add food button and search box -->
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <button class="btn btn-primary">Print</button>
                </div>

                <div>
                    <input type="text" class="form-control" placeholder="Search" style="width:600px">

                </div>
                <button class="btn btn-success " style="height: 50px;"> <i class="fa fa-plus"></i> Add Order</button>
            </div>

        
            <!-- Add your content for orders here -->
            <div class="container-fluid">
                <!-- Your HTML and PHP code for displaying orders -->
                <!-- For example, you can use a table to display orders -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Order Date</th>
                                <th>Total Amount</th>
                                <!-- Add more table headers if needed -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Fetch orders from the database and loop through them to display
                            // Replace this with your actual PHP code to fetch and display orders
                            foreach ($orders as $order) {
                                echo "<tr>";
                                echo "<td>" . $order['order_id'] . "</td>";
                                echo "<td>" . $order['customer_name'] . "</td>";
                                echo "<td>" . $order['order_date'] . "</td>";
                                echo "<td>$" . $order['total_amount'] . "</td>";
                                // Add more table cells for additional order details if needed
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
