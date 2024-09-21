<?php
    require 'connection.php';

    session_start(); // Start the session

    // Check if the user is logged in
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header("location: sign-in.php"); // Redirect to sign-in if not logged in
        exit;
    }

    // Function to delete an item
    function deleteItem($id){
        $conn = connection();
        $sql = "DELETE FROM items WHERE id = '$id'";
        
        if ($conn->query($sql)) {
            header("location: view-items.php"); // Redirect to view-items page
        } else {
            die('Error deleting item: ' . $conn->error);
        }
    }

    // Check if the form is submitted
    if(isset($_POST['btn_deleteitem'])){
        $id = $_POST['id'];
        deleteItem($id);
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
    <title>Delete Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
        <div class="container-fluid">
            <div class="card w-50 mx-auto my-5">
                <div class="card-header">
                    <h1 class="display-6 text-center">Delete Item</h1>
                </div>
                <div class="card-body">
                    <p>Are you sure you want to delete the following item?</p>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">ID</th>
                                <td><?php echo $row['id']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Item Name</th>
                                <td><?php echo $row['item_name']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Item Price</th>
                                <td><?php echo $row['item_price']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Quantity</th>
                                <td><?php echo $row['quantity']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" name="btn_deleteitem" class="btn btn-danger">Delete</button>
                        <a href="view-items.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

</body>
</html>
