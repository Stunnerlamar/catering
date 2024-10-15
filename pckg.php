    <!-- @format -->
    <?php 
        session_start();
        error_reporting(E_ALL);
    ini_set('display_errors', 1);   
        include 'Inc/db_connection.php';
        $_SESSION['active_link'] = 'packages';

        // Fetch packages from the database for restaurant with ID 2
        $restaurant_id = 2; 
        $sqls = "SELECT * FROM foods WHERE category = 'packages'";
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
        <link rel="stylesheet" href="pckg.css" />
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
        background-color: #007bff;
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

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-transform: uppercase;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
    </style>
    <body>
        <?php include "Inc/rcc_navbar.php" ?>

        <section class="dishes py-5" id="dishes">
            <div class="container py-5 my-3">
                <h3 class="sub-heading">Our Packages</h3>
                <h1 class="heading">OUR WEEKLY SPECIAL  </h1>

                <div class="row">
                    <?php 
                        // Loop through each fetched package and display it
                        while ($row = mysqli_fetch_assoc($results)) {
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="box my-5">
                            <div class="d-flex justify-content-between pb-5">
                            <a href="#" class="fas fa-heart" style="font-size: 30px"></a>
                            <a href="#" class="fas fa-eye" style="font-size: 30px"></a>
                            </div>

                            <div class="user-icon w-100 my-5">
                                <img src="<?php echo $row['image_path']; ?>" alt="" width="100%">
                            </div>
                            <h3><?php echo $row['name']; ?></h3>
                            <span>ksh <?php echo $row['price']; ?></span>
                            <a href="query/add_to_cart.php?food_id=<?php echo $row['food_id'] ?>" class="btn px-5 mx-5">Add to Cart</a>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </section>

        <section class="advertisement py-5" id="advertisement">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="advert-content">
                        <h2 class="advert-heading">Special Offer!</h2>
                        <p class="advert-text">Enjoy 20% off on all orders above $50. Limited time offer.</p>
                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="https://media.istockphoto.com/id/925013558/vector/chips-ads-cheese-flavour-explosion-vector-background.jpg?s=612x612&w=0&k=20&c=OLnQQysxH1j250r-LeUpdJRM4NlO6BjQgfeuMrBF2uY=" alt="Advertisement Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
