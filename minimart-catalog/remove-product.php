<?php
    session_start();

    include "connection.php";

    function getProduct($product_id)
    {
        $conn = connection();
        $sql = "SELECT * FROM products WHERE id = $product_id";
        return $conn->query($sql)->fetch_assoc();
    }

    function deleteProduct($product_id){
        $conn = connection();
        $sql = "DELETE FROM products WHERE id = $product_id";

        if( $conn->query($sql) )
        {
            header("Location: products.php");
        }
        else
        {
            die("Failed to delete product: ".$conn->error);
        }
    }

    $product_id = $_GET["prod_id"];
    $product_details = getProduct($product_id);

    if( isset($_POST["btn_delete"]) )
    {
        deleteProduct($product_id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Delete Product</title>
</head>
<body>
    <?php include "main-nav.php" ?>
    <div class="container py-5">
        <div class="card w-25 mx-auto">
            <div class="card-header bg-danger">
                <h2 class="text-center text-white">Delete Product</h2>
            </div>
            <div class="card-body text-center">
                <p class="fst-italic">Are you sure you want to delete <span class="fw-bold"><?= $product_details["name"]?></span>?</p>
                <form action="" method="post">
                    <a href="products.php" class="btn btn-outline-secondary">Cancel</a>
                    <input type="submit" value="Delete" name="btn_delete" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</body>
</html>