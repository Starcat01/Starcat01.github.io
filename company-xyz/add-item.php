<?php
    require 'connection.php';

    session_start(); // Start the session

    // Check if the user is logged in
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header("location: sign-in.php"); // Redirect to sign-in if not logged in
        exit;
    }

    if(isset($_POST['btn_additem'])){
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $quantity = $_POST['quantity'];

        // Call the addItem function
        addItem($item_name, $item_price, $quantity);
    } 

    function addItem($item_name, $item_price, $quantity){
        $conn = connection();
        
        $sql = "INSERT INTO items (item_name, item_price, quantity) VALUES ('$item_name', '$item_price', '$quantity')";
        
        if ($conn->query($sql)) {
            header("location: view-items.php"); // Redirect to view-items page
        } else {
            die('Error adding item: ' . $conn->error);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
        <div class="container-fluid">
            <div class="card w-25 mx-auto my-5">
                <div class="card-header">
                    <h1 class="display-6 text-center">Add New Item</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="form-label">Item Name</label>
                                <input type="text" name="item_name" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="form-label">Item Price</label>
                                <input type="number" name="item_price" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="form-label">Quantity</label>
                                <input type="number" name="quantity" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                            <input type="submit" value="Add Item" name="btn_additem" class="btn btn-success w-100">
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

</body>
</html>
