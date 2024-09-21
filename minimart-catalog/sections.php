<?php
    require "connection.php";

    if(isset($_POST['btn_add'])){
        $name = $_POST['name'];
        createSection($name);
    }

    if(isset($_POST['btn_delete'])){
        $section_id = $_POST['btn_delete'];
        deleteSection($section_id);
    }

    function createSection($name) {
        $conn = connection();

        $sql = "INSERT INTO sections (`name`) VALUE ('$name')";

        if($conn->query($sql)){
            header("refresh: 0");
        } else {
            die("Error addding new product section: " . $conn->error);
        }
    }

    function getallSections() {
        $conn = connection();
        $sql = "SELECT * FROM sections";

        if($result = $conn->query($sql)){
            return $result;
        } else {
            die("Error retrieving all sections: " . $conn->error);
        }
    }

    function deleteSection($section_id) {
        $conn = connection();
        $sql = "DELETE FROM sections WHERE id = $section_id";

        if($conn->query($sql)) {
            header('refesh: 0');
        } else {
            die("Error deleting the product section: " . $conn->error);
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
    <title>Sections</title>
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <h2 class="fw-light mb-3">
                    Sections
                </h2>

                <!-- Form -->
                <div class="mb-3">
                    <form action="" method="post">
                        <div class="row gx-2">
                            <div class="col">
                                <input type="text" name="name" id="name" class="form-control" 
                                placeholder="Add a new section here.." max="50" required autofocus>
                            </div>
                            <div class="col-auto">
                                <button type="submit" name="btn_add" class="btn btn-info w-100 fw-bold">
                                    <i class="fa-solid fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <table class="table table-sm align-middle text-center">
                    <thead class="table-info">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $all_sections = getAllSections();
                        while($section = $all_sections->fetch_assoc()){
                            
                        ?>
                        <tr>
                            <td><?= $section['id'] ?></td>
                            <td><?= $section['name'] ?></td>
                            <td>
                                <form action="" method="post">
                                    <button type="submit" name="btn_delete" value="<?= $section['id'] ?>" 
                                    class="btn btn-outline-danger border-0" title="Delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>