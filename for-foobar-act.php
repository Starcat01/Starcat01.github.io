<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foo Bar Activity</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Foo Bar Activity</h1>
        <form method="post">
            <div class="form-group">
                <label for="start">Starting Number:</label>
                <input type="number" class="form-control" id="start" name="start" required>
            </div>
            <div class="form-group">
                <label for="end">Ending Number:</label>
                <input type="number" class="form-control" id="end" name="end" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $start = $_POST["start"];
            $end = $_POST["end"];

            echo "<div class='mt-4'>";
            for ($i = $start; $i <= $end; $i++) {
                if ($i % 3 == 0 && $i % 5 == 0) {
                    echo "FOOBAR ";
                } elseif ($i % 3 == 0) {
                    echo "FOO ";
                } elseif ($i % 5 == 0) {
                    echo "BAR ";
                } else {
                    echo $i . " ";
                }
            }
            echo "</div>";
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
