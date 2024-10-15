<?php
session_start();
$id = $_GET['id'];
echo $id;

if ($id === "3") {
    header("Location: AB.php");
    exit(); // Exit after redirection
} else if ($id === "2") {
    $_SESSION['id'] = '2'; 
    header("Location: rcc.php");
    exit(); // Exit after redirection
} else if ($id === "4") {
    header("Location: srf.php");
    exit(); // Exit after redirection
} else {
    echo '<script>alert("Restaurant Not found")</script>';
    header("Location: wp.php");
    exit(); // Exit after redirection
}
?>
