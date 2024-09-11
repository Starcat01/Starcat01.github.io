<!DOCTYPE html>
<html>
<head>
<title>Cube Activity</title>
</head>
<body>

<h1>Cube Activity</h1>

<form method="post">
  Enter a number: <input type="number" name="number" required><br><br>
  <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $number = $_POST["number"];
  $cube = 1;

  for ($i = 1; $i <= 3; $i++) {
    $cube *= $number;
  }

  echo "The cube of " . $number . " is " . $cube;
}
?>

</body>
</html>
