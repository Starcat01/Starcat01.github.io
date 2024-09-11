<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Character</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Search Character</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="word">Enter a word:</label>
                <input type="text" class="form-control" id="word" name="word" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $word = $_POST["word"];
            $vowels = 0;
            for ($i = 0; $i < strlen($word); $i++) {
                $char = substr($word, $i, 1);
                if ($char == 'a' || $char == 'e' || $char == 'i' || $char == 'o' || $char == 'u') {
                    $vowels++;
                }
            }
            echo "<p class='mt-4'>The word '$word' contains $vowels vowels.</p>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
