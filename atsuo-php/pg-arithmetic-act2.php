<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arithmetic</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1wB0iFzVly8cU8tHCcMVP5xaVq7vNhc9G/+7//t+iJ+Jl+qQEGttr+KdgVcUmq7z3i4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .sum { color: lightblue; font-weight: bold; }
        .difference { color: dark; font-weight: bold; }
        .product { color: red; font-weight: bold; }
        .quotient { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Arithmetic Operations</h1>
        <form method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="num1">Number 1:</label>
                    <input type="number" class="form-control" id="num1" name="num1" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="num2">Number 2:</label>
                    <input type="number" class="form-control" id="num2" name="num2" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Calculate</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];

            $sum = $num1 + $num2;
            $difference = $num1 - $num2;
            $product = $num1 * $num2;
            $quotient = $num1 / $num2;

            echo "<div class='mt-4'>";
            echo "<p class='sum'>The sum of $num1 and $num2 : $sum</p>";
            echo "<p class='difference'>The difference of $num1 and $num2 : $difference</p>";
            echo "<p class='product'>The product of $num1 and $num2 : $product</p>";
            echo "<p class='quotient'>The quotient of $num1 and $num2 : $quotient</p>";
            echo "</div>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
