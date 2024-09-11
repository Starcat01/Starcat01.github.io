<!DOCTYPE html>
<html>
<head>
  <title>Factorial Activity</title>
</head>
<body>
  <h1>Factorial Activity</h1>
  <form method="post">
    <label for="number">Enter a number:</label>
    <input type="number" name="number" id="number" required>
    <button type="submit">Calculate</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];
    $factorial = 1;

    for ($i = 1; $i <= $number; $i++) {
      $factorial *= $i;
    }

    echo "<p>The factorial of $number is: $factorial</p>";
  }
  ?>
</body>
</html>
