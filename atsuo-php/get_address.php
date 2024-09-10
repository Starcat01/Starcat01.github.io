<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Address</title>
   
</head>
<body>
<form action="" method="post">
    <div>
        <label for="full-name">Full Name</label>
        <input type="text" id="full-name" name="full_name" class="form-control mb-3" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control mb-3" required>
    </div>
    <div>
        <label for="address">House Address</label>
        <input type="text" id="address" name="house_address" class="form-control mb-3" required>
    </div>
    <div>
        <label for="courier">Courier</label>
        <select name="courier" id="courier" required>
            <option value="dhl">DHL Express</option>
            <option value="jrs">JRS Express</option>
            <option value="ninjas">Ninjas Van</option>
        </select>
    </div>
    <div>
        <input type="submit" name="btn_submit" value="Submit">
    </div>
</form>

<?php
if (isset($_POST['btn_submit'])) {
    $full_name = htmlspecialchars($_POST['full_name']);
    $courier = htmlspecialchars($_POST['courier']);
    echo "To: $full_name", "<br>";
    echo "Your parcel will be delivered by $courier.";
}
?>
</body>
</html>
