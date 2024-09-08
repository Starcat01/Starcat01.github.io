<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading Activity</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Grading Activity</h1>
        <form method="POST">
            <div class="form-group">
                <label for="grade">Enter Grade:</label>
                <input type="number" class="form-control" id="grade" name="grade" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $grade = $_POST['grade'];

            if ($grade >= 90 && $grade <= 100) {
                echo "<div class='alert alert-success mt-3'>Excellent</div>";
            } elseif ($grade >= 85 && $grade <= 89) {
                echo "<div class='alert alert-success mt-3'>Good</div>";
            } elseif ($grade >= 80 && $grade <= 84) {
                echo "<div class='alert alert-info mt-3'>Fair</div>";
            } elseif ($grade >= 75 && $grade <= 79) {
                echo "<div class='alert alert-warning mt-3'>Poor</div>";
            } elseif ($grade >= 60 && $grade <= 74) {
                echo "<div class='alert alert-danger mt-3'>Fail</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Invalid</div>";
            }
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
