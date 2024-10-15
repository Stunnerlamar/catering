    <!-- @format -->
    <?php 
        session_start();
        error_reporting(E_ALL);
    ini_set('display_errors', 1);   
        include 'Inc/db_connection.php';
        $_SESSION['active_link'] = 'for_hire';

        // Fetch packages from the database for restaurant with ID 2
        $restaurant_id = 2; 
        $sqls = "SELECT * FROM foods WHERE category = 'on hire'";
        $results = mysqli_query($conn, $sqls);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-comptible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Rcc Packages</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="rcc.css" />
    </head>
    <style>
    .user-icon {
        width: 100px;
        height: 210px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        overflow: hidden;
    }

    .box {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s;
    }

    .box:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .box h3 {
        margin-bottom: 10px;
        font-size: 1.5rem;
        color: #333;
    }

    .box span {
        display: block;
        font-weight: bold;
        font-size: 1.6rem;
        margin-bottom: 20px;
        color: #007bff;
    }

    .btn {
        background-color: #0056b3;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #27ae60;
    }

    .sub-heading,
    .heading {
        text-align: center;
    }

    .advertisement {
        background-color: #f8f9fa;
        padding: 50px 0;
    }

    .advert-content {
        text-align: center;
        margin-bottom: 30px;
    }

    .advert-heading {
        font-size: 2rem;
        color: #333;
        margin-bottom: 15px;
    }

    .advert-text {
        font-size: 1.2rem;
        color: #666;
        margin-bottom: 30px;
    }

    
    </style>
    <body>
    <?php include "Inc/rcc_navbar.php" ?>   

        
<section class="dishes container py-5" id="dishes">
    <h3 class="sub-heading">our menu</h3>
    <h1 class="heading"></h1>

    <div class="box-container">
        <?php

        // Fetch menu items from the database
        $restaurant_id = 1; 
        $sqls = "SELECT * FROM foods WHERE category = 'on Hire'";
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
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
