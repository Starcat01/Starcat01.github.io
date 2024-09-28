<?php
  // index.php

  require_once('School.php');

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $yearLevel = $_POST['yearLevel'];
    $units = $_POST['units'];
    $withLab = isset($_POST['withLab']) ? true : false;

    $school = new School($yearLevel, $units, $withLab);
    $cost = $school->getCost();

    echo "<h1>School Activity</h1>";
    echo "<p>Name: $name</p>";
    echo "<p>Year Level: $yearLevel</p>";
    echo "<p>Units: $units</p>";
    echo "<p>With Lab: " . ($withLab ? 'Yes' : 'No') . "</p>";
    echo "<p>Total Cost: $cost</p>";
  } else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>School Activity</title>
</head>
<body>
  <h1>School Activity</h1>
  <form method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br><br>

    <label for="yearLevel">Year Level:</label>
    <select name="yearLevel" id="yearLevel" required>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
    </select><br><br>

    <label for="units">Units:</label>
    <input type="number" name="units" id="units" min="1" max="23" required><br><br>

    <label for="withLab">With Lab:</label>
    <input type="checkbox" name="withLab" id="withLab"><br><br>

    <button type="submit">Calculate Cost</button>
  </form>
</body>
</html>
<?php
  }
?>
