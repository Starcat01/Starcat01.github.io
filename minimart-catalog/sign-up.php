<?php
    require 'connection.php';

    if(isset($_POST['btn_register'])){
        $firstname = $_POST['first_name'];
        $lastname = $_POST['last_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // function calling
        register($firstname,$lastname,$username,$password);
    } 
    
    function register($firstname, $lastname, $username, $password){
        $conn = connection();
        
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (first_name, last_name, username, password) VALUES ('$firstname', '$lastname', '$username', '$hashed_password')";
        
        if ($conn->query($sql)) {
            header("location: products.php");
            //header('refresh:0');
        } else {
            die('error in registering user' . $conn->error);
        }
    }
    
    //function register($firstname,$lastname,$username,$password){
    //    $conn = connection();
    //
    //    $sql = "INSERT INTO users (first_name,last_name,username,password)VALUES('$firstname','$lastname','$username','$password')";
    //
    //    if($conn->query($sql)){
    //
    //       header("location: products.php");
    //       // header('refresh:0');
    //    }else{
    //        die('error in registering user'.$conn->error);
    //    }
    //}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
        <div class="container-fluid">
            <div class="card w-25 mx-auto my-5">
                <div class="card-header">
                    <h1 class="display-6 text-center">Register</h1>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                            </div>
                        </div>

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
                            <input type="submit" value="Register" name="btn_register" class="btn btn-success w-100">
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

</body>
</html>