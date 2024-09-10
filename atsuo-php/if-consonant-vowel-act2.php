<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consonant or Vowel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Consonant or Vowel</h1>
        <form method="post">
            <div class="form-group">
                <label for="letter">Enter a letter:</label>
                <input type="text" class="form-control" id="letter" name="letter" required>
            </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $letter = $_POST["letter"];
            if (strlen($letter) == 1 && ctype_alpha($letter)) {
                if ($letter == 'a' || $letter == 'e' || $letter == 'i' || $letter == 'o' || $letter == 'u' || 
                    $letter == 'A' || $letter == 'E' || $letter == 'I' || $letter == 'O' || $letter == 'U') {
                    echo "<div class='alert alert-success mt-3'>The letter '$letter' is a vowel.</div>";
                } else {
                    echo "<div class='alert alert-success mt-3'>The letter '$letter' is a consonant.</div>";
                }
            } else {
                echo "<div class='alert alert-danger mt-3'>Invalid input. Please enter a single letter.</div>";
            }
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
