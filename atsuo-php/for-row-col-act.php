<!DOCTYPE html>
<html>
<head>
<title>Col Row Activity</title>
</head>
<body>

<h1>Col Row Activity</h1>
<p>Create a program that prints rows and columns based on user input.</p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="rows">Number of rows:</label>
  <input type="number" name="rows" id="rows"><br><br>
  <label for="cols">Number of columns:</label>
  <input type="number" name="cols" id="cols"><br><br>
  <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rows = $_POST["rows"];
  $cols = $_POST["cols"];

  // Check if the user input is valid
  if (is_numeric($rows) && is_numeric($cols) && $rows > 0 && $cols > 0) {
    for ($i = 0; $i < $rows; $i++) {
      for ($j = 0; $j < $cols; $j++) {
        echo "*** ";
      }
      echo "<br>";
    }
  } else {
    echo "<p>Please enter valid numbers for rows and columns.</p>";
  }
}
?>

</body>
</html>
