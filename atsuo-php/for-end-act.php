<!DOCTYPE html>
<html>
<head>
<title>Ends With</title>
</head>
<body>
  <h1>Enter a number:</h1>
  <form method="POST">
    <input type="number" name="number" required>
    <button type="submit">Submit</button>
  </form>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];
    echo "<h2>Numbers from 1 to " . $number . ":</h2>";
    for ($i = 1; $i <= $number; $i++) {
      echo $i . " ";
    }
  }
  ?>
</body>
</html>
