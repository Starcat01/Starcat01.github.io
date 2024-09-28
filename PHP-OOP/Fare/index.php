<?php
// Include the Fare.php file
require_once 'Fare.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Fare Activity</title>
</head>
<body>
    <h1>Fare Activity</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" min="10" max="80" required>
        <br><br>
        <label for="distance">Distance (km):</label>
        <input type="number" id="distance" name="distance" min="1" required>
        <br><br>
        <button type="submit">Calculate Fare</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $age = $_POST["age"];
        $distance = $_POST["distance"];
        $fare = new Fare($age, $distance);
        $fare_amount = $fare->calculateFare();
        echo "<h2>Fare: $" . $fare_amount . "</h2>";
    }
    ?>
</body>
</html>
