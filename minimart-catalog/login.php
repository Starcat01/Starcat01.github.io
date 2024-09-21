<?php
require "connection.php";

if (isset($_POST['btn_log_in'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Function calling
    login($username, $password);
}

function login($username, $password) {
    $conn = connection();
    $sql = "SELECT * FROM users WHERE username = '$username'";
    
    if ($result = $conn->query($sql)) {
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                session_start();

                $_SESSION['id']         = $user['id'];
                $_SESSION['username']   = $user['username'];
                $_SESSION['full_name']  = $user['first_name'] . " " . $user['last_name'];
                
                // Redirect to the products page
                header("location: products.php");
                exit;
            } else {
                echo "<div class='alert alert-danger'>Incorrect password.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Username not found.</div>";
        }
    } else {
        die("Error retrieving the user: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Minimart Catalog</title>
</head>
<body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 mx-auto my-auto p-0">
                <div class="card-header text-success">
                    <h1 class="card-title h3 mb-0">Minimart Catalog</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label small fw-bold">Username</label>
                            <input type="text" name="username" id="username" class="form-control fw-bold" maxlength="15" required autofocus>
                        </div>
                        <div class="mb-5">
                            <label for="password" class="form-label small fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100" name="btn_log_in">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <p class="small">Don't have an account? <a href="sign-up.php">Sign up.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
