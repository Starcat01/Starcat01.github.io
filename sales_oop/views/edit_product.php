<?php
session_start();
include_once "../classes/Product.php";
include_once "../classes/User.php";

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

// Initialize database connection
//$database = new Database();
//$db = $database->getConnection();

// Initialize product object
$product = new Product();

// Check if product ID is set in the URL
if (isset($_GET['id'])) {
    $product->id = $_GET['id'];

    // Fetch the product details
    $stmt = $product->getProduct(); // Assumes getProducts() can work with product ID
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Set product properties
    $product_name = $row['product_name'];
    $price = $row['price'];
    $quantity = $row['quantity'];
}

// Handle form submission to update product
if ($_POST) {
    $product->product_name = $_POST['product_name'];
    $product->price = $_POST['price'];
    $product->quantity = $_POST['quantity'];

    if ($product->editProduct()) {
        header("Location: dashboard.php?message=Product Updated");
    } else {
        echo "Unable to update product.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card w-50 mx-auto">
            <div class="card-header bg-primary text-white">
                <h2>Edit Product</h2>
            </div>
            <div class="card-body">
                <form action="edit_product.php?id=<?= $product->id ?>" method="POST">
                    <div class="form-group mb-3">
                        <label for="product_name">Product Name</label>
                        <input type="text" name="product_name" class="form-control" value="<?= $product_name ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="<?= $price ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" value="<?= $quantity ?>" required>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Changes</button>
                    <a href="dashboard.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>