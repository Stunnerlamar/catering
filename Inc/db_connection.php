<?php
// db_connection.php

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "final_Project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
