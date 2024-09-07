<?php

function circumference($r) {
    return 2 *3.14159 * $r; 
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Circumference of a Circle</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Circumference of a Circle</h1>
        <form method="post">
            <div class="form-group">
                <label for="radius">Radius:</label>
                <input type="number" class="form-control" id="radius" name="radius" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['radius']) && is_numeric($_POST['radius']) && $_POST['radius'] > 0) {
                $radius = $_POST['radius'];
                $c = circumference($radius);
                echo "<p class='mt-3'>Circumference: $c</p>";
            } else {
                echo "<p class='text-danger mt-3'>Please enter a valid positive number for the radius.</p>";
            }
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
