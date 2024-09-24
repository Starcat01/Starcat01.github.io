<?php
    require 'connection.php';

    session_start(); // Start the session

    // Check if the user is logged in
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header("location: sign-in.php"); // Redirect to sign-in if not logged in
        exit;
    }

    // Function to update an item
    function updateItem($id, $item_name, $item_price, $quantity){
        $conn = connection();

        $sql = "UPDATE items SET item_name = '$item_name', item_price = '$item_price', quantity = '$quantity' WHERE id = '$id'";
        
        if ($conn->query($sql)) {
            header("location: view-items.php"); // Redirect to view-items page
        } else {
            die('Error updating item: ' . $conn->error);
        }
    }

    // Check if the form is submitted
    if(isset($_POST['btn_updateitem'])){
        $id = $_POST['id'];
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $quantity = $_POST['quantity'];

        updateItem($id, $item_name, $item_price, $quantity);
    }

    // Get the item ID from the URL
    $id = $_GET['id'];

    // Fetch the item details from the database
    $conn = connection();
    $sql = "SELECT * FROM items WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        header("location: view-items.php"); // Redirect to view-items page if no item found
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
    include "main-nav.php";
    ?>
        <div class="container-fluid">
            <div class="card w-25 mx-auto my-5">
                <div class="card-header">
                    <h1 class="display-6 text-center">Edit Item</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="form-label">Item Name</label>
                                <input type="text" name="item_name" class="form-control" value="<?php echo $row['item_name']; ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="form-label">Item Price</label>
                                <input type="number" name="item_price" class="form-control" value="<?php echo $row['item_price']; ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="form-label">Quantity</label>
                                <input type="number" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                            <input type="submit" value="Update Item" name="btn_updateitem" class="btn btn-success w-100">
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

</body>
</html>
