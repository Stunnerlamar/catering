  <!-- @format -->
  <?php 
      session_start();
      include 'Inc/db_connection.php';
      $_SESSION['active_link'] = 'review';
  ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-comptible" content="IE=edge" />
      <meta name="viewport" content="width-device-width, initial-scale=1.0" />
      <title>Royal Cool Cuisine</title>
      <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
      />
      <link rel="stylesheet" href="rcc.css" />
    </head>
    <body>
      <?php include "Inc/header.php" ?>
    <?php include "Inc/rcc_navbar.php" ?>


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
              $query = "SELECT * FROM `review` WHERE restaurant_id='2'";
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
        <form action="query/add_review.php?restaurant_id=2" method="POST">
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
            <input type="text" class="form-control" id="name" name="restaurant_id" value='2' placeholder='2' >
          </div> -->
          <button type="submit" class="btn btn-primary px-5">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>
    </body>
  </html>
