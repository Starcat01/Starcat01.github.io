<?php
    require "connection.php";

    if(isset($_POST['btn_add'])) {
        $name           = $_POST['name'];
        $description    = $_POST['description'];
        $price          = $_POST['price'];
        $section_id     = $_POST['section_id'];

        createProduct($name, $description, $price, $section_id);
    }

    function createProduct($name, $description, $price, $section_id) {
        //connect to database
        $conn = connection();

        // write a request
        $sql= "INSERT INTO `products` (`name`, `description`, `price`, `section_id`) VALUES ('$name', '$description', '$price', '$section_id')";

        // error handling -check if there is something wrong
        if($conn->query($sql)){
            header('location: products.php');
        }else{
            die('error in inserting product'.$conn->error);
        }
    }

    function getallSections() {
        $conn = connection();
        $sql = "SELECT * FROM sections";

        if($result = $conn->query($sql)) {
            return $result;
        } else {
            die("Error retrieving all sections: " . $conn->error);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>New Product</title>
</head>
<body>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <h2 class="fw-light mb-3">
                    New Product
                </h2>

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label small fw-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" maxlength="50" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label small fw-bold">Description</label>
                        <textarea rows="5" class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label small fw-bold">Price</label>
                        <div class="input-group">
                            <div class="input-group-text">$</div>
                            <input type="number" name="price" id="price" class="form-control" step="any" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="section_id" class="form-label small fw-bold">Section</label>
                        <select name="section_id" id="section-id" class="form-select" required>
                            <option value="" hidden>Select Section</option>
                            <?php
                                $all_sections = getallSections();
                                while($section = $all_sections->fetch_assoc()) {
                                    echo "<option value='" . $section['id'] . "'>" . $section['name'] . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <a href="products.php" class="btn btn-outline-success">Cancel</a>
                        <button type="submit" class="btn btn-success fw-bold px-5" name="btn_add">
                            <i class="fa-solid fa-plus"></i> Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
</body>
</html>

