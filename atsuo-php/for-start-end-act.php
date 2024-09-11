<!DOCTYPE html>
<html>
<head>
<title>Starts With Ends With</title>
</head>
<body>
<h1>Starts With Ends With</h1>
<form method="post">
Start: <input type="number" name="start" required><br>
End: <input type="number" name="end" required><br>
<input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $start = $_POST["start"];
  $end = $_POST["end"];

  if ($start > $end) {
    for ($i = $start; $i >= $end; $i--) {
      echo $i . "<br>";
    }
  } else {
    for ($i = $start; $i <= $end; $i++) {
      echo $i . "<br>";
    }
  }
}
?>
</body>
</html>


