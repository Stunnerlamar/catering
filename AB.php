<!-- @format -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-comptible" content="IE=edge" />
    <meta name="viewport" content="width-device-width, initial-scale=1.0" />
    <title>Alamin Bakers Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
    <link rel="stylesheet" href="AB.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  </head>
  <body>
    <?php include 'Inc/db_connection.php'?>;
    <?php include 'Inc/header.php'?>;
    <?php include 'Inc/almin.php'?>;
    <header class='mb-5 d-flex justify-content-between py-5' style='z-index: 500'>
      <nav class="navbars">
        <a href="#" class="logo">
          <i class="fas fa-utensils"></i>AlaminBakers</a
        >
        <a href="#home">home</a>
        <a href="#cakes">Cakes</a>
        <a href="#forhire">For Hire</a>
        <a href="#snacks">Snacks</a>
        <a href="#forsale">For Sale</a>
        <a href="#review">review</a>
        <a href="#order">order</a>
      </nav>
      

      <div class="icons gap-4">
        <a href="index.php">Exit</a>
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart" onclick="toggleCart()"></a>
        <a href="#" class="fa fa-user" onclick="toggleUserProfile()"></a>
        <a href="./admin " class="bg-success text-light py-2 px-3">admin</a>

      </div>
    </header>
    <form action="" id="search-form">
      <input type="search" placeholder="search here" name="" id="search-box" />
      <label for="search-box" class="fas fa-search"></label>
      <i class="fas fa-times" id="close"></i>
    </form> 
    <style>
    .carousel-item img {
      height: 600px; /* Adjust the height as needed */
      border-radius: 30px;
      margin-top: 80px;
    }

    .carousel-caption {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      color: white;
    }
  </style>


    <section class="home py-5 my-5" id="home">
      <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="" alt="First slide">
            <div class="carousel-caption">
              <h1>Almin Bakers</h1>
              <p>Delicious pastries and cakes for every occasion</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="" alt="Second slide">
            <div class="carousel-caption">
              <h1>Almin Bakers</h1>
              <p>Freshly baked bread and savory snacks</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="" alt="Third slide">
            <div class="carousel-caption">
              <h1>Almin Bakers</h1>
              <p>Specialty desserts made with love</p>
            </div>
          </div>
        </div>
        <!-- Previous and Next controls -->
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>
  <section class="cakes py-5 my-5" id="cakes">
      <h1 class="heading">CAKES</h1>

      <div class="box-container">
      <?php
      //   // Fetch menu items from the database
      $restaurant_id = 1; 
      $sqls = "SELECT * FROM foods WHERE category = 'cakes'";
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
      <section class="for hire py-5 my-5" id="for hire">
      <h1 class="heading">FOR HIRE</h1>

      <div class="box-container">
      <?php
      //   // Fetch menu items from the database
      $restaurant_id = 1; 
      $sqls = "SELECT * FROM foods WHERE category = 'for hire'";
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
   
    <section class="snacks" id="snacks">
       <h1 class="heading">Snacks</h1>

        <div class="box-container">

        <?php
         // Fetch menu items from the database
         $restaurant_id = 1; 
         $sqls = "SELECT * FROM foods WHERE category = 'snacks'";
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

     <section class="forsale" id="forsale">
       <h1 class="heading">For Sale</h1>

        <div class="box-container">

       
        <?php
            // Fetch menu items from the database
            $restaurant_id = 1; 
            $sqls = "SELECT * FROM foods WHERE category = 'for_sale'";
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

     <section class="review" id="review">
      <div class="inner">
      <h3 class="sub-heading">customer's review</h3>
      <h1 class="heading">what they say</h1>
      <div class="border"></div>

      <div class="row">
      <?php 
               include 'Inc/db_connection.php';
              $_SESSION['active_link'] = 'review';

              // Fetch reviews from the database
              $query = "SELECT * FROM `review` WHERE restaurant_id='3'";
              $result = mysqli_query($conn, $query);

              // Check if query was successful
              if ($result) {
                  // Fetch and display reviews
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo '<div class="col">';
                      echo '<div class="testimonial">';
                      echo '<img src="./Images/' . $row['image'] . '" alt="" />';
                      echo '<div class="name">' . $row['name'] . '</div>';
                      $stars = floor($row["Stars"]); // Get integer part
                      for ($i = 0; $i < $stars; $i++) {
                      echo '<i class="fas fa-star"></i>';
                      }
                                
                      echo '<p>' . $row["comment"] . '</p>';
                      echo '</div>';
                      echo '</div>';
                  }
              } else {
                  echo "Error fetching reviews: " . mysqli_error($conn);
              }

              // Close database connection
              mysqli_close($conn);
          ?>

          </div>
        </div>
      </section>


      <!-- Review Form -->
    <div class="row py-5 my-5">
      <div class="col">
        <h2><b>Add Your Review</b></h2>
        <form action="query/add_review.php?restaurant_id=3" method="POST">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group py-4">
              <label for="location">Stars</label>
              <input type="text" class="form-control" name="stars" placeholder="Enter stars (5,4,3,2,1)">
          </div>
          <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea class="form-control" id="comment" name="comment" rows="10" required></textarea>
          </div>
          <!-- <div class="mb-3">
            <label for="name" class="form-label"></label>
            <input type="text" class="form-control" id="name" name="restaurant_id" value='3' placeholder='3' >
          </div> -->
          <button type="submit" class="btn btn-primary px-5">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>

        </div>

        <div class="row py-5 my-5">
          
          
          </section>
          <div class="d-flex justify-content-center">
            <div class="w-50 py-5">
              <h2 class="text-center"><b>Add Your Review</b></h2>
              <form action="query/add_review.php" method="POST">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group py-4">
                            <label for="location">Stars</label>
                            <input type="text" class="form-control" name="stars" placeholder="Enter stars (5,4,3,2,1)">
                        </div>
                <div class="mb-3">
                  <label for="comment" class="form-label">Comment</label>
                  <textarea class="form-control" id="comment" name="comment" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-5">Submit</button>
              </form>
            </div>

          </div>
          </div>
          
    <section class="order" id="order">

      <h3 class="sub-heading">Order now</h3>
     

      <form action="">
        <div class="inputBox">
          <div class="input">
            <span>Your name</span>
            <input type="text" placeholder="Enter your name">
          </div>
           
        <div class="inputBox">
          <div class="input">
            <span>Your number</span>
            <input type="number" placeholder="Enter your number">
          </div>
           
        <div class="inputBox">
          <div class="input">
            <span>Your order</span>
            <input type="text" placeholder="Enter food name">
          </div>
           
        <div class="inputBox">
          <div class="input">
            <span>Additional food</span>
            <input type="test" placeholder="Extra food">
          </div>
           
        <div class="inputBox">
          <div class="input">
            <span>How much</span>
            <input type="number" placeholder="How many orders">
          </div>
           
        <div class="inputBox">
          <div class="input">
            <span>Date and time</span>
            <input type="datetime-local">
          </div>
           
        <div class="inputBox">
          <div class="input">
            <span>Your venue</span>
            <textarea name="" placeholder="enter your venue" id="" cols="30" rows="10"></textarea>
          </div>
           <form action="">
        <div class="inputBox">
          <div class="input">
            <span>Your message</span>
            <textarea name="" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
          </div>
        </div>

        <input type="submit" value="order now" class="btn">
      </form>
    </section>
    
    <section class="footer">
      <div class="box-container">

        <div class="box">
          <h3>Location</h3>
          <a href="">Mombasa</a>
        </div>

        <div class="box">
          <h3>Quick links</h3>
          <a href="">Home</a>
        </div>

        <div class="box">
          <h3>Contact info</h3>
          <a href="">0759298170</a>
          <a href="">mshariff2001@gmail.com</a>
          <a href="">Mombasa, Bamburi</a>
        </div>

        <div class="box">
          <h3>Follow us</h3>
          <a href="">Instagram @alamin_bakers_shop</a>
        </div>
      </div>
      

      <div class="credit">copyright @2024 by <span>Shariff Maryam</span></div>
    </section>

  </body>
  <!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
