<?php 
    session_start();
    if (!$_SESSION['user_id']){
        header("Location: login.php?next=index");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EaseCaters</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="rcc.css">
</head>
<body>

<section class="intro">
    <div class="container">
        <h1>Welcome to EaseCaters!</h1>
        <p>Please choose a restaurant from the options below:</p>
    </div>
    <?php if (isset($_SESSION['user_id'])): ?>
        <!-- Display logout button if user is logged in -->
        <a href="admin/Logout.php">Logout</a>
       
    <?php endif; ?>
</section>

<section class="review" id="review">
    <div class="container">
        <div class="row">

            <?php
            // Include your database connection file
            include 'Inc/db_connection.php';

            // Fetch restaurants from the database
            $sql = "SELECT * FROM restaurants";
            $result = mysqli_query($conn, $sql);

            // Check if there are any restaurants
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row and display restaurant info
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-4">';
                    echo '<div class="testimonial">';
                    echo '<img src="Images/'. $row['image_path'] . '" alt="" width="100%" height="400px"/>'; // Placeholder image
                    echo '<div class="name">' . $row['name'] . '</div>';
                    echo '<a href="restaurant.php?id=' . $row['restaurant_id'] . '" class="btn px-4" stye="background-color: blue; color: white">ENTER</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No restaurants found.</p>';
            }
            ?>

        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
