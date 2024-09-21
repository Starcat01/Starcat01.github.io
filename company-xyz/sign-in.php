<?php
    require 'connection.php';

    session_start(); // Start the session

    if(isset($_POST['btn_login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Call the login function
        login($username, $password);
    } 

    function login($username, $password){
        $conn = connection();
        
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $row['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username; 
                header("location: view-items.php"); // Redirect to view-items page
            } else {
                echo "<script>alert('Incorrect password');</script>";
            }
        } else {
            echo "<script>alert('User not found');</script>";
        }
        $conn->close();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
        <div class="container-fluid">
            <div class="card w-25 mx-auto my-5">
                <div class="card-header">
                    <h1 class="display-6 text-center">Sign In</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        

                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                            <input type="submit" value="Login" name="btn_login" class="btn btn-success w-100">
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

</body>
</html>

