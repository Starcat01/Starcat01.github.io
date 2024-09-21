<?php
session_start();
require "connection.php";
$user = getUser();

function getUser(){
    $conn = connection();

    $id         = $_SESSION['id'];
    $sql        = "SELECT * FROM users WHERE id = $id";

    if ($result = $conn->query($sql)){
        return $result->fetch_assoc();
    } else {
        die('Error retrieving your data: '. $conn->error);        
    }
}
?>

<?php
 if(isset($_POST['btn_upload_photo'])){
    $id         = $_SESSION['id']; //Typo: $_SESSION not $_SESSON
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp  = $_FILES['photo']['tmp_name'];

    updatePhoto($id, $photo_name, $photo_tmp);
 }

 function updatePhoto($id, $photo_name, $photo_tmp){
    $conn = connection();
    $sql  = "UPDATE users SET photo = '$photo_name' WHERE id = $id";

    if($conn->query($sql)){
        $destination = "assets/images/$photo_name";
        move_uploaded_file($photo_tmp, $destination);
        header("refresh: 0");
    } else{ // Typo: elese should be else
        die("Error uploading photo: " . $conn->error);
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> 
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Profile</title>
</head>
<body>

    <?php
    include "main-nav.php";
    ?>
    
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                
                <?php
                if ($user['photo']) {
                    ?>
                    <img src="assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" 
                    class="d-block mx-auto img-thumbnail profile-photo">  
                    <?php
                } else {
                    ?>
                    <i class="fa-regular fa-user d-block text-center profile-icon"></i>
                    <?php
                }
                ?>
                
                <div class="mt-2 mb-3 text-center">
                    <p class="h4 mb-0"><?= $user['username'] ?></p>
                    <p><?= $user['first_name'] ?> <?= $user['last_name'] ?></p>
                </div>
                
                <form method="post" enctype="multipart/form-data">
                    <div class="input-group mb-2">
                        <input type="file" name="photo" class="form-control">
                        <button type="submit" class="btn btn-outline-secondary" name="btn_upload_photo">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
  
</body>
</html>

