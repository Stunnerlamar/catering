<?php include "./Inc/header.php" ?>

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

<!-- Sidebar -->
<div class="container-fluid">
    <div class="row">
        <?php include "./Inc/sidebar.php" ?>
       
        <!-- Main content area -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            <!-- Add food button and search box -->
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <button class="btn btn-primary">Print</button>
                </div>

                <div>
                    <input type="text" class="form-control" placeholder="Search" style="width:600px">

                </div>
                <button class="btn btn-success " style="height: 50px;"> <i class="fa fa-plus"></i> Add Food</button>
            </div>

            <!-- Food table -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- PHP code to fetch and display food data -->
                        <?php
                            include "./Inc/db_connection.php";


                            // Query to fetch food data
                            $sql = "SELECT food_id, name, price, image_path FROM foods where restaurant_id = 2";

                            // Execute query
                            $result = $conn->query($sql);

                            // Check if result has rows
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["food_id"] . "</td>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["price"] . "</td>";
                                    echo '<td><img src="../Images/' . $row["image_path"] . '" alt="Food Image" style="max-width: 100px; height: 100px"></td>';
                                    echo '<td>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="viewFood(' . $row['food_id'] . ')" data-bs-toggle="modal" data-bs-target="#viewFoodModal">View</button>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateFoodModal">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteFoodModal">Delete</button>
                                    </td>';// Add more cells for additional data
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No food found</td></tr>";
                            }

                        // Close connection
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
            <?php include 'modals/food_modal.php' ?>
        </main>
    </div>
</div>

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Add an onclick event to each "View" button to trigger the JavaScript function -->
<button type="button" class="btn btn-primary btn-sm" onclick="viewFood(<?php echo $row['food_id']; ?>)" data-bs-toggle="modal" data-bs-target="#viewFoodModal">View</button>

<script>
    // JavaScript function to populate the view modal with food details
    function viewFood(foodId) {
        // AJAX request to fetch food details from the server
        $.ajax({
            type: 'POST',
            url: 'get_food_details.php', // Replace 'get_food_details.php' with the actual PHP file to fetch food details
            data: { food_id: foodId },
            success: function(response) {
                // Parse the JSON response
                var foodDetails = JSON.parse(response);

                // Populate modal with food details
                $('#viewFoodName').text(foodDetails.name);
                $('#viewFoodPrice').text(foodDetails.price);
                $('#viewFoodImage').attr('src', foodDetails.image_path);
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    }
</script>
