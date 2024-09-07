<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1Q27ZQ/3qs64MKBAYqcXcKQ0Qn7B5E040z48EPECs+ZFRw7TXvqhR8BiuFZioAS8m+gF1Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Calculate Average</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="num1">Number 1:</label>
                                <input type="number" class="form-control" id="num1" name="num1" required>
                            </div>
                            <div class="form-group">
                                <label for="num2">Number 2:</label>
                                <input type="number" class="form-control" id="num2" name="num2" required>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-calculator"></i> Calculate</button>
                        </form>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $num1 = $_POST["num1"];
                            $num2 = $_POST["num2"];

                            $average = ($num1 + $num2) / 2;

                            echo "<p class='mt-3'>The average of $num1 and $num2 is: $average</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
