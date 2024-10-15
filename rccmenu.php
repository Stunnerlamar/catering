<!-- @format -->
<?php 
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

    session_start();
    include 'Inc/db_connection.php';
    $_SESSION['active_link'] = 'menu';

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-comptible" content="IE=edge" />
    <title>Rcc menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./rcc.css" />
</head>

<body>
    <?php include "Inc/rcc_navbar.php" ?>   

        
    <section class="dishes container py-5" id="dishes">
        <h3 class="sub-heading">our menu</h3>
        <h1 class="heading">popular dishes</h1>

        <div class="box-container">
            <?php

            // Fetch menu items from the database
            $restaurant_id = 1; 
            $sqls = "SELECT * FROM foods WHERE category = 'food'";
            $result = mysqli_query($conn, $sqls);

            // Check if there are any menu items
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row and display menu item
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="box">';
                    echo '<a href="#" class="fas fa-heart"></a>';
                    echo '<a href="#" class="fas fa-eye"></a>';
                    echo '<img src="Images/' . $row['image_path'] . '" alt="' . $row['name'] . '" />';
                    echo '<h3>' . $row['name'] . '</h3>';
                    // Assuming 'stars' and 'price' are columns in your database
                    echo '<div class="stars">';
                    $stars = floor($row["stars"]); // Get integer part
                    for ($i = 0; $i < $stars; $i++) {
                        echo '<i class="fas fa-star"></i>';
                    }
                    // Check if we need to display a half star
                    if ($row["stars"] - $stars > 0) {
                        echo '<i class="fas fa-star-half-alt"></i>';
                        $stars++; // Increment stars count
                    }
                    // Output remaining empty stars
                    for ($i = $stars; $i < 5; $i++) {
                        echo '<i class="far fa-star"></i>';
                    }
                    echo '</div>';
                    echo '<span>ksh ' . $row["price"] . '</span>';
                    echo '<a href="query/add_to_cart.php?food_id=' . $row['food_id'] . '" class="btn">Add to Cart</a>';
                        echo '</div>';
                }
            } else {
                echo '<p>No menu items found.</p>';
            }
            ?>
        </div>
    </section>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
