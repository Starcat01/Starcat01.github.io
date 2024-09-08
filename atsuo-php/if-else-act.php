<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If Else Activity</title>
</head>
<body>
    <form action="" method="post">
        <label for="num1">First Number</label>
        <input type="number" name="num1" id="num1" autofocus required>
        <br>
        <label for="num2">Second Number</label>
        <input type="number" name="num2" id="num2">
        <br><br>
        <button type="submit" name="btn_submit">Submit</button>
    </form>
</body>
</html>

<?php
if(isset($_POST['btn_submit'])){
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    if($num1 > $num2){
        echo "Result: " . $num1-$num2;
    } else {
        echo "Result: " . $num1*$num2;
    }
}

?>