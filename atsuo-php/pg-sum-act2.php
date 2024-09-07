<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum Activity</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1w2/knoG80k332kR+M9sGOzCWl0ChilIqUeSbWkqb6GSbpHCpVB50lZOA1Oel+lFPfig==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .sum-result {
            font-size: 24px; /* Set the font size to 24px */
            font-weight: bold; /* Optional: makes the font bold */
            color: #007bff; /* Optional: changes text color to Bootstrap primary color */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Sum Activity</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="num1">Enter First Number:</label>
                <input type="number" class="form-control" id="num1" name="num1" required>
            </div>
            <div class="form-group">
                <label for="num2">Enter Second Number:</label>
                <input type="number" class="form-control" id="num2" name="num2" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-calculator"></i> Calculate Sum</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $sum = $num1 + $num2;
            echo "<p class='mt-4 sum-result'>The sum of $num1 and $num2 is: <strong>$sum</strong></p>";
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
