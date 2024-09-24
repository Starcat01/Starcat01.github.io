<?php
    require 'connection.php';

    session_start(); // Start the session

    // Check if the user is logged in
    if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
        header("location: sign-in.php"); // Redirect to sign-in if not logged in
        exit;
    }

    // Function to fetch all items
    function getAllItems(){
        $conn = connection();
        $sql = "SELECT * FROM items";
        $result = $conn->query($sql);

        return $result;
    }

    $items = getAllItems();
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
    include "main-nav.php";
    ?>
        <div class="container-fluid">
            <div class="card w-75 mx-auto my-5">
                <div class="card-header">
                    <h1 class="display-6 text-center">Items</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($items->num_rows > 0) {
                                while($row = $items->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th scope='row'>". $row["id"] ."</th>";
                                    echo "<td>". $row["item_name"] ."</td>";
                                    echo "<td>". $row["item_price"] ."</td>";
                                    echo "<td>". $row["quantity"] ."</td>";
                                    echo "<td>";
                                    echo "<a href='edit-item.php?id=". $row["id"] ."' class='btn btn-primary'>Edit</a>";
                                    echo "<a href='delete-item.php?id=". $row["id"] ."' class='btn btn-danger'>Delete</a>";
                                
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No items found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <a href='add-item.php' class="btn btn-success">Add New Item</a>
                </div>
            </div>
        </div>

</body>
</html>
