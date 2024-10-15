
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Cool Cuisine</title>
    <link rel="stylesheet" href="rcc.css" />
</head>
<body>
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
    <?php include "Inc/header.php";
        $_SESSION['active_link'] = 'home';                
     ?>
    
    <header class="">
    <nav>
        <a <?php if ($_SESSION['active_link'] === 'home') echo 'class="active"'; ?> href="rcc.php">home</a>
        <a <?php if ($_SESSION['active_link'] === 'menu') echo 'class="active"'; ?> href="rccmenu.php">Menu</a>
        <a <?php if ($_SESSION['active_link'] === 'packages') echo 'class="active"'; ?> href="pckg.php">Packages</a>
        <a <?php if ($_SESSION['active_link'] === 'for_hire') echo 'class="active"'; ?> href="fh.php">For Hire</a>
        <a <?php if ($_SESSION['active_link'] === 'review') echo 'class="active"'; ?> href="review.php">review</a>
        <a <?php if ($_SESSION['active_link'] === 'order') echo 'class="active"'; ?> href="order.php">order</a>
        
        <?php if (isset($_SESSION['user_id'])): ?>
        <!-- Display logout button if user is logged in -->
        <a href="admin/Logout.php">Logout</a>
        <a href="index.php">Exit</a>
    <?php endif; ?>
    </nav>
    

    <div class="icons">
        <i class="fas fa-bars" id="menu-bar"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart" onclick="toggleCart()"></a>
        <a href="#" class="fa fa-user" onclick="toggleUserProfile()"></a>
        <a href="./admin " class="bg-success text-light py-2 px-3">admin</a>
    </div>
</header>
            <h1 class="text-center">Welcome to Royal Cool Cuisine</h1>
    <section class="home py-5 my-5 px-5">
      <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="https://www.shutterstock.com/image-photo/malabar-chicken-dum-biryani-chilli-600nw-1138666232.jpg" alt="First slide">
            <div class="carousel-caption">
              <h1>Royal Cool Cuisine</h1>
              <p>Delicious pastries and cakes for every occasion</p>
            </div>
          </div>
          <div class="carousel-item">
          <img class="d-block w-100" src="https://www.shutterstock.com/image-photo/close-shot-indian-traditional-food-260nw-1421482127.jpg" alt="First slide">
            <div class="carousel-caption">
              <h1>Royal Cool Cuisine</h1>
              <p>Freshly baked bread and savory snacks</p>
            </div>
          </div>
          <div class="carousel-item">
          <img class="d-block w-100" src="https://www.shutterstock.com/image-photo/malabar-chicken-dum-biryani-chilli-600nw-1138666232.jpg" alt="Second slide">
            <div class="carousel-caption">
              <h1>Royal Cool Cuisine</h1>
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

</body>
</html>
