<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Increasing or Decreasing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Increasing or Decreasing</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="num1">Number 1:</label>
                <input type="number" class="form-control" id="num1" name="num1" required>
            </div>
            <div class="form-group">
                <label for="num2">Number 2:</label>
                <input type="number" class="form-control" id="num2" name="num2" required>
            </div>
            <div class="form-group">
                <label for="num3">Number 3:</label>
                <input type="number" class="form-control" id="num3" name="num3" required>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $num3 = $_POST["num3"];

            if ($num1 < $num2 && $num2 < $num3) {
                echo "<p class='mt-3 text-center'>Increasing</p>";
            } elseif ($num1 > $num2 && $num2 > $num3) {
                echo "<p class='mt-3 text-center'>Decreasing</p>";
            } else {
                echo "<p class='mt-3 text-center'>Neither</p>";
            }
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
