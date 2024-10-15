<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaterEase catering </title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<section>
    <div class="admin_pages">
        <?php include "Inc/sidebar.php" ?>


        <div class="content_area bg-light">
        <div style="text-align: right; padding-right: 10%;">
                <a href="../" class="text-right">View site</a>

            </div>
            <!-- header section -->
            <div class="header py-4">
                <div>
                    <span>Primary</span>
                    <h3 class="purple"><b>Foods</b></h3>
                </div>

                <div class="d-flex " style="gap: 30px;">
                    <!-- bootsrap search with search icon on the left  -->
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                    <!-- user icon image rounded -->
                    <div class="user_icon">
                        <img src="images/user.png" alt="user icon">
                    </div>
                </div>
            </div>

            

            <!-- Service data -->
            <div class="transaction_section">
                <h4><b>Availabe Foods</b></h4>
                <div class="flex">
                    <button class="py-3 px-4 my-3 print_btn" ><i class="fa fa-print" style="font-size: 20px;"></i> PRINT</button>
                </div>
                <table class='table table-stripped'>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Food Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include 'Inc/db_connection.php';

                        // Query to fetch data
                        $query = "SELECT `food_id`, `restaurant_id`, `name`, `price`, `image_path`, `stars`, date    FROM `foods` WHERE 1";

                        $result = mysqli_query($conn, $query);

                        // Check if there are any rows returned
                        if (mysqli_num_rows($result) > 0) {
                            // Output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $row["date"] . '</td>';
                                echo '<td>' . $row["name"] . '</td>';
                                echo '<td><img src="../Images/' . $row["image_path"] . '" alt="' . $row["name"] . '" style="width: 50px; height: 50px"></td>';
                                echo '<td>' . $row["price"] . '</td>';
                                echo '<td>' . $row["stars"] . '</td>';
                                echo '<td>Status</td>';
                                echo '<td class="d-flex justify-content-center gap-4" style="gap: 30px">';
                                echo '<button class="bg-success text-light px-4 btn btn_edit" data-food-id="' . $row["food_id"] . '">EDIT</button>';
                                echo '<button class="bg-danger text-light px-4 btn btn_delete" data-food-id="' . $row["food_id"] . '">DELETE</button>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo "0 results";
                        }

                        ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Total</th> <th></th> <th></th> <th></th> <th></th> <th></th><th></th>
                        </tr>
                    </tfoot>
                </table>

                
            </div>


            
        </div>
    </div>
</section>
<?php include 'modals/food_modal.php' ?>

<!-- Bootstrap JS -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Edit button click handler
    var editButtons = document.querySelectorAll('.btn_edit');
    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var food_id = this.getAttribute('data-food-id');
            console.log(food_id)
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById('editFoodForm').innerHTML = xhr.responseText;
                        $('#editFoodModal').modal('show');
                    } else {
                        console.error('Error fetching order details:', xhr.status);
                    }
                }
            };
            xhr.open('GET', 'query/fetch_food.php?food_id=' + food_id, true);
            xhr.send();
        });
    });

    // Delete button click handler
    var deleteButtons = document.querySelectorAll('.btn_delete');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var food_id = this.getAttribute('data-food-id');
            // Set the order ID to be deleted in the confirmation button's data attribute
            var confirmDeleteBtn = document.getElementById('confirmDelete');
            confirmDeleteBtn.setAttribute('data-food-id', food_id);
            
            // Set the href attribute of the delete confirmation button
            confirmDeleteBtn.setAttribute('href', 'query/delete_food.php?food_id=' + food_id);

            // Show the delete modal
            $('#deleteFoodModal').modal('show');
        });
    });

    // Confirm delete button click handler
    var confirmDeleteBtn = document.getElementById('confirmDelete');
    confirmDeleteBtn.addEventListener('click', function(event) {
        // Prevent the default action of the link
        event.preventDefault();

        var food_id = this.getAttribute('data-food-id');
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText)
                    location.reload();
                } else {
                    console.error('Error deleting food:', xhr.status);
                }
            }
        };
        xhr.open('POST', 'query/delete_food.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('food_id=' + food_id);
    });
});
</script>

</body>
</html>
