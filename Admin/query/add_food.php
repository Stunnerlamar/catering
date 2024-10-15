<?php
// Include the database connection file
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../Inc/db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = $_POST['name'];
    $stars = $_POST['stars'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $restaurant = $_POST['restaurant'];

    // File upload handling
    $image = ''; // Placeholder for image file name
    
    if (isset($_FILES['image']) && $_FILES['image']['name']) {
        $target_dir = "../../Images/"; // Directory where images will be stored
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = basename( $_FILES["image"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    // Insert data into database
    $query = "INSERT INTO foods (name, stars, price, category, restaurant_id, image_path) VALUES ('$name', '$stars', '$amount', '$category', '$restaurant', '$image')";

    if ($conn && mysqli_query($conn, $query)) {
        echo "Food added successfully";
        header("Location: ../FoodsAdd.php");
    } else {
        echo "Error adding food: " . mysqli_error($conn);
    }
}
?>
