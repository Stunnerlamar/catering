<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaterEase catering</title>
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
                    <h3 class="purple"><b>Food</b></h3>
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
                <h2 class="text-center"><b>Add Food</b></h2>
                <!-- add services bootrap form, serice name, location, amount, image, category(select) , image-->
                <div class="container w-50">
                    <form action='query/add_food.php' method="post">
                        <div class="form-group py-4">
                            <label for="name">Food Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter food name">
                        </div>
                        <div class="form-group py-4">
                            <label for="location">Stars</label>
                            <input type="text" class="form-control" name="stars" placeholder="Enter stars (5,4,3,2,1)">
                        </div>
                        <div class="form-group py-4">
                            <label for="amount">Amount</label>
                            <input type="text" class="form-control" name="amount" placeholder="Enter amount">
                        </div>

                        <div class="form-group py-4">
                            <label for="category">Category</label>
                            <select name="category" name="category" class="w-100 py-5">
                                <option value="">Select Category</option>
                                <option value="food">food</option>
                                <option value="cakes">cakes</option>
                                <option value="snack">snacks</option>
                                <option value="on hire">on Hire</option>
                                <option value="packages">packages</option>
                                <option value="for_sale">For Sale</option>
                                <option value="for_sale">srf menu</option>
                                <option value="on hire">for hire</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="restaurant">Restaurant</label>
                            <select name="restaurant" id="restaurant" class="w-100 py-5 text-dark">
                                <option value="#">Select Restaurant</option>
                                <?php
                                include 'Inc/db_connection.php';

                                // Query to fetch restaurant data
                                $query = "SELECT `restaurant_id`, `name`, `image_path` FROM `restaurants` WHERE 1";
                                $result = mysqli_query($conn, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row["restaurant_id"] . '">' . $row["name"] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group py-4">
                            <label for="ima">Image</label>
                            <input type="file" class="" name="image" placeholder="Enter image" onchange="previewImage(this)">
                            <div class="card d-flex justify-content-center align-items-center" id="imagePreview" style="width: 300px; height: 250px; border-radius: 8px;">
                                Image will show here
                            </div>
                        </div>

                        <div class="form-group py-4">
                            <input type="submit" value=" Add Service" class="btn_submit w-50 py-4 text-light" style="background-color: blueviolet; font-weight: 800; font-size: 22px; border-radius: 8px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#imagePreview').html('<img src="' + e.target.result + '" style="max-width:100%; max-height:100%;" />');
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
</script>

</body>
</html>
