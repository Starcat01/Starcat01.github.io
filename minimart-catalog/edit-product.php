<?php
    session_start();

    require "connection.php";

    function getAllSections(){
        $conn = connection();
        $sql = "SELECT * FROM sections";
        
        if($result = $conn->query($sql)){
            return $result;
        } else {
            die("Error retrieving all sections: " . $conn->error);
        }
    }

    function getProduct($product_id){
        $conn = connection();
        $sql = "SELECT * FROM products WHERE id = $product_id";
        return $conn->query($sql)->fetch_assoc(); //returns the data as an associative array
    }
    
    function updateProduct($product_id, $name, $description, $price, $section_id)
    {
        $conn = connection();
        $sql = "UPDATE products SET name = '$name', description='$description', price = $price, section_id = $section_id WHERE id = $product_id";

        if( $conn->query($sql) )
        {
            header("Location:products.php");
        }
        else
        {
            die("Failed to update product: ".$conn->error);
        }
    }

    $product_id = $_GET["prod_id"];
    $product_details = getProduct($product_id);

    if(isset($_POST["btn_save"]))
    {
        //INPUT
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $section_id = $_POST["section_id"];

        //PROCESS
        updateProduct($product_id, $name, $description, $price, $section_id);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <title>Edit Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php
    include "main-nav.php";
    ?>
    <main class="card w-25 mx-auto my-5">
        <div class="card-header bg-secondary text-white">
            <h2 class="card-title h4 mb-0">Edit Product</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <label for="title" class="form-label small">Title</label>
                <input type="text" name="name" id="title" class="form-control mb-2" required autofocus value="<?= $product_details["name"] ?>">

                <label for="description" class="form-label small">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-2" required><?= $product_details["description"]?></textarea>

                <label for="price" class="form-label small">Price</label>
                <div class="input-group mb-2">
                    <div class="input-group-text">$</div>
                    <input type="number" name="price" id="price" class="form-control" required value="<?= $product_details["price"]?>">
                </div>

                <label for="section-id" class="form-label small">Section</label>
                <select name="section_id" id="section-id" class="form-select mb-5" required>
                    <option value="" hidden>Select Section</option>
                    <?php
                    $sections_result = getAllSections();
                    while($sections_row = $sections_result->fetch_assoc()){
                        if($product_details["section_id"] == $sections_row["id"])
                        {
                            echo "<option value='".$sections_row['id']."' selected>".$sections_row['name']."</option>";
                        }
                        else
                        {
                            echo "<option value='".$sections_row['id']."'>".$sections_row['name']."</option>";
                        }
                    }
                    ?>
                </select>

                <a href="products.php" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-secondary px-5" name="btn_save">Save</button>                
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>