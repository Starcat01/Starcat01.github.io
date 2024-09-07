<!DOCTYPE html>
<html>
<head>
<title>Area of Rectangle</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <h1>Area of Rectangle</h1>
  <form method="post">
    <div class="form-group">
      <label for="length">Length:</label>
      <input type="number" class="form-control" id="length" name="length" required>
    </div>
    <div class="form-group">
      <label for="width">Width:</label>
      <input type="number" class="form-control" id="width" name="width" required>
    </div>
    <button type="submit" class="btn btn-primary">Calculate</button>
  </form>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $length = $_POST["length"];
    $width = $_POST["width"];
    $area = calculateArea($length, $width);
    echo "<p>Area: ".$area."</p>";
  }
  function calculateArea($length, $width) {
    return $length * $width;
  }
  ?>
</div>
</body>
</html>


