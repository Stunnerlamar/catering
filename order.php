<?php 
    session_start();
    include 'Inc/db_connection.php';
    $_SESSION['active_link'] = 'order   ';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-comptible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="order.css">
</head>

<body>
    <?php include "Inc/rcc_navbar.php" ?>

    <form action="" id="search-form" class="container mt-3">
        <div class="input-group">
            <input type="search" class="form-control" placeholder="search here" name="" id="search-box">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                <button class="btn btn-danger" type="button"><i class="fas fa-times"></i></button>
            </div>
        </div>
    </form>

    <section class="order container mt-5 py-5">
        
        <div class="d-flex justify-content-center my-5">
            <form action="query/submit_order.php" method="POST" id="form-data">
                <h3 class="text-center">Order now</h3>
                <h1 class="text-center">Free and fast</h1>
                <div class="form-group">
                    <label for="name">Your name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                </div>
    
                <div class="form-group">
                    <label for="phone_number">Your number</label>
                    <input type="number" class="form-control" id="phone_number" placeholder="Enter your number" name="phone_number">
                </div>
    
                <div class="form-group">
                    <label for="food_name">Your order</label>
                    <input type="text" class="form-control" id="food_name" placeholder="Enter food name" name="food_name">
                </div>
    
                <div class="form-group">
                    <label for="extra_food">Additional food</label>
                    <input type="text" class="form-control" id="extra_food" placeholder="Extra food" name="extra_food">
                </div>
    
                <div class="form-group">
                    <label for="quantity">How much</label>
                    <input type="number" class="form-control" id="quantity" placeholder="How many orders" name="quantity">
                </div>
    
                <div class="form-group">
                    <label for="delivery_datetime">Date and time</label>
                    <input type="datetime-local" class="form-control" id="delivery_datetime" name="delivery_datetime">
                </div>
    
                <div class="form-group">
                    <label for="venue">Your venue</label>
                    <textarea class="form-control" id="venue" placeholder="Enter your venue" rows="3" name="venue"></textarea>
                </div>
    
                <div class="form-group">
                    <label for="message">Your message</label>
                    <textarea class="form-control" id="message" placeholder="Enter your message" rows="5" name="message"></textarea>
                </div>
    
                <button type="submit" class="btn btn-primary px-5">Order Now</button>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
