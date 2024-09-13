<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Green Pages</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">The Green Pages</h1>
        
        <!-- Address Lookup Form -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="person">Select a Name:</label>
                <select class="form-control" id="person" name="person">
                    <!-- Options will be populated here -->
                    <option value="">--Select a person--</option>
                    <?php
                        // Pre-filled array with names and addresses
                        $greenPages = [
                            "John Doe" => "123 Maple St, Springfield",
                            "Jane Smith" => "456 Oak St, Capital City",
                            "Alice Johnson" => "789 Pine St, Shelbyville",
                            "Bob Brown" => "321 Cedar St, Ogdenville",
                            "Charlie Davis" => "654 Spruce St, North Haverbrook",
                            "Emily Wilson" => "987 Birch St, Brockway",
                            "Frank Miller" => "159 Cherry St, West Springfield",
                            "Grace White" => "753 Elm St, Monroeville",
                            "Henry King" => "258 Fir St, South Haverbrook",
                            "Isabel Lee" => "951 Ash St, Knifetown",
                            "Jack Moore" => "864 Maple Ave, Shelbyville",
                            "Karen Green" => "753 Willow St, Capital City",
                            "Liam Wright" => "951 Oak Ave, Springfield",
                            "Mia Scott" => "369 Pine Ave, West Brockway",
                            "Noah Brown" => "147 Cedar Ave, North Ogdenville"
                        ];

                        // Populate the select dropdown
                        foreach ($greenPages as $name => $address) {
                            echo "<option value='$name'>$name</option>";
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lookup Address</button>
        </form>

        <!-- Display the result -->
        <div class="mt-4">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['person']) && !empty($_POST['person'])) {
                    $selectedPerson = $_POST['person'];

                    // Display the address of the selected person
                    if (array_key_exists($selectedPerson, $greenPages)) {
                        echo "<p class='alert alert-success'>The address for <strong>{$selectedPerson}</strong> is: {$greenPages[$selectedPerson]}</p>";
                    } else {
                        echo "<p class='alert alert-danger'>Address not found for the selected person.</p>";
                    }
                }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
