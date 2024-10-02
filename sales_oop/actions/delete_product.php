<?php
session_start();
include_once "../classes/Database.php";
include_once "../classes/User.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Check if product ID is set in the URL
if (isset($_GET['id'])) {
    // Initialize database connection
    $database = new Database();
    $db = $database->getConnection();

    // Initialize product object
    $product = new Product($db);
    $product->id = $_GET['id'];

    // Delete the product
    if ($product->deleteProduct()) {
        header("Location: ../views/dashboard.php?message=Product Deleted");
    } else {
        echo "Unable to delete product.";
    }
} else {
    header("Location: ../views/dashboard.php?message=No Product ID Found");
}
?>
